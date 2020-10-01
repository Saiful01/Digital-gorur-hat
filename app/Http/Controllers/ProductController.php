<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Shop;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ProductController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {

        $shop_id = null;
        if (Auth::user()->user_type != 1) {
            $shop = Shop::where('user_id', Auth::user()->id)->first();
            if (is_null($shop)) {
                return Redirect::to('/shop/create')->with('failed', "Add shop first");
            }

            $shop_id = $shop->shop_id;
        }


        return view('admin.product.create')
            ->with('shops', Shop::get())
            ->with('shop_id', $shop_id)
            ->with('categories', ProductCategory::get());
    }

    public function store(Request $request)
    {
        //return $request->all();

        $validator = Validator::make($request->all(), [
            'shop_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {

            return back()->with('failed', "Shop Id Required")->withErrors($validator);;
        }


        unset($request['_token']); //Remove Token

        $owner_array = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'password' => Hash::make("123456")
        ];

        try {
            $is_exist = User::where('phone', $request['phone'])->first();
            if (!is_null($is_exist)) {
                $id = $is_exist->id;
            } else {
                $id = User::insertGetId($owner_array);
            }

            $request['owner_id'] = $id;

        } catch (\Exception $exception) {

            return $exception->getMessage();
        }


        unset($request['name']);
        unset($request['phone']);
        unset($request['address']);


        //return $request->all();
        $i = 1;
        $product_image = [];
        $image_array = [];
        if ($request->hasFile('image')) {
            foreach ($request['image'] as $image) {

                $featured_image = $i . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/product');
                $image->move($destinationPath, $featured_image);
                if ($i == 1) {
                    $request['featured_image'] = "/images/product/" . $featured_image;
                }

                if ($i > 1) {
                    $product_image['image'] = "/images/product/" . $featured_image;
                    $image_array[] = $product_image;
                }
                $i++;
            }
        }
        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product/');
            $image->move($destinationPath, $image_name);

            $request['certification'] = "/images/product/" . $image_name;
        }
        if ($request->hasFile('video_file')) {
            $video = $request->file('video_file');
            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/video/product/');
            $video->move($destinationPath, $video_name);

            $request['video'] = "/video/product/" . $video_name;
        }

        //return $request->all();


        // return $request->except(['image']);

        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();

        //$request['product_color'] = json_encode($request['product_color']);

        try {
            $product_id = Product::insertGetId($request->except(['image', 'certificate','video_file']));

            foreach ($image_array as $image) {
                ProductImage::create([
                    'product_id' => $product_id,
                    'image' => $image['image']
                ]);
            }
            return back()->with('success', "Successfully Product Save");
        } catch (\Exception $exception) {
            //return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function show(Product $product)
    {

        if (Auth::user()->user_type == 1) {

            $results = Product::join('product_categories', 'product_categories.category_id', '=', 'products.product_category_id')
                ->leftJoin('shops', 'shops.shop_id', '=', 'products.shop_id')
                ->orderBY('products.created_at', "DESC")->get();

        } else {

            $shop = Shop::where('user_id', Auth::user()->id)->first();
            if (is_null($shop)) {
                return Redirect::to('/shop/create')->with('failed', "Add shop first");
            }
            $results = Product::leftJoin('product_categories', 'product_categories.category_id', '=', 'products.product_category_id')
                ->leftJoin('shops', 'shops.shop_id', '=', 'products.shop_id')
                ->where('products.shop_id', $shop->shop_id)
                ->orderBY('products.created_at', "DESC")->get();

        }


        return view('admin.product.view')->with('results', $results);
    }

    public function productDetails($id)
    {
        $result = Product::join('product_categories', 'product_categories.category_id', '=', 'products.product_category_id')
            ->join('users', 'users.id', '=', 'products.owner_id')
            ->join('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('product_id', $id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.product.details')
            ->with('result', $result)
            ->with('images', $images)
            ->with('categories', ProductCategory::get())
            ->with('shops', Shop::get());
    }

    public function featured($id)
    {
        try {
            Product::where('product_id', $id)->update([
                'is_featured' => true
            ]);
            return back()->with('success', "Successfully Featured");
        } catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }


    public function edit($id)
    {
        $shop_id = null;
        if (Auth::user()->user_type != 1) {
            $shop = Shop::where('user_id', Auth::user()->id)->first();
            if (is_null($shop)) {
                return Redirect::to('/shop/create')->with('failed', "Add shop first");
            }

            $shop_id = $shop->shop_id;
        }


        $result = Product::join('product_categories', 'product_categories.category_id', '=', 'products.product_category_id')
            ->leftJoin('users', 'users.id', '=', 'products.owner_id')
            ->leftJoin('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('product_id', $id)->first();

        return view('admin.product.edit')
            ->with('result', $result)
            ->with('categories', ProductCategory::get())
            ->with('shops', Shop::get())
            ->with('shop_id', $shop_id);
    }


    public function update(Request $request)
    {

       /* $validator = Validator::make($request->all(), [
            'video' => 'max:100000',
        ]);*/
        unset($request['_token']); //Remove Token

        $owner_array = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'password' => Hash::make("123456")
        ];



        //return $request->all();
        try {
            $is_exist = User::where('phone', $request['phone'])->first();
            if (!is_null($is_exist)) {
                $id = $is_exist->id;

                User::where('phone', $request['phone'])->update($owner_array);
            } else {
                $id = User::insertGetId($owner_array);
            }

            $request['owner_id'] = $id;

        } catch (\Exception $exception) {

            return $exception->getMessage();
        }

        unset($request['name']);
        unset($request['phone']);
        unset($request['address']);


        //return $request->all();
        $i = 1;
        $product_image = [];
        $image_array = [];
        if ($request->hasFile('image')) {
            foreach ($request['image'] as $image) {

                $featured_image = $i . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/product');
                $image->move($destinationPath, $featured_image);
                if ($i == 1) {
                    $request['featured_image'] = "/images/product/" . $featured_image;
                }

                if ($i > 1) {
                    $product_image['image'] = "/images/product/" . $featured_image;
                    $image_array[] = $product_image;
                }
                $i++;
            }
        }

        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product/');
            $image->move($destinationPath, $image_name);

            $request['certification'] = "/images/product/" . $image_name;
        }

       //return $request->file('video_file')->getSize();
        if ($request->hasFile('video_file')) {
            $video = $request->file('video_file');
            $video_name = time() . '.' . $video->getClientOriginalExtension();

            $destinationPath = public_path('/video/product/');
            $video->move($destinationPath, $video_name);

            $request['video'] = "/video/product/" . $video_name;
        }
        //return $request->except(['image','certificate']);

        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();

        //$request['product_color'] = json_encode($request['product_color']);
        try {
            Product::where('product_id', $request['product_id'])->update($request->except(['image', 'certificate','video_file']));

            /* foreach ($image_array as $image) {
                 ProductImage::create([
                     'product_id' => $id,
                     'image' => $image['image']
                 ]);
             }*/
            return back()->with('success', "Successfully Product Update");
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }

    }


    public function destroy($id)
    {
        try {
            Product::where('product_id', $id)->delete();
            return back()->with('success', "Successfully Product Deleted");
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }
    }
}
