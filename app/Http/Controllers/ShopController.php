<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function create()
    {
        return view('admin.shop.create')->with('users', User::get());
    }


    public function store(Request $request)
    {

        //return $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/shop');
            $image->move($destinationPath, $image_name);

            $request['shop_image'] = "/shop/" . $image_name;
        }

        // return $request->except(['_token', 'image']);
        try {
            Shop::create($request->except(['_token', 'image']));
            return back()->with('success', "Successfully Created");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function show(Shop $coupon)
    {
        $results = Shop::orderBy('created_at', 'DESC')->get();
        return view('admin.shop.show')->with('results', $results);
    }


    public function edit($id)
    {
        $result = Shop::where('shop_id', $id)->first();
        return view('admin.shop.edit')
            ->with('result', $result)->with('users', User::get());
    }

    public function update(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/shop');
            $image->move($destinationPath, $image_name);

            $request['shop_image'] = "/shop/" . $image_name;
        }


        try {
            Shop::where('shop_id', $request['shop_id'])->update($request->except(['image', '_token']));
            return back()->with('success', "Successfully Updated");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            Shop::where('shop_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
