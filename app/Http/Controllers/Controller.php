<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderItem;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\PromotionalSlider;
use App\ShippingAddress;
use App\Shop;
use App\Slider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        //return \App\Shop::get();
        $featured_item = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')->where('is_featured', true)
            ->where('publish_status', true)
            ->limit(8)
            ->get();
        $new_products = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')->orderBy('product_id', 'DESC')->where('publish_status', true)->get();
        $best_seller = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('product_type', 3)
            ->orderBy('product_id', 'DESC')->where('publish_status', true)
            ->limit(8)
            ->get();
        $category = ProductCategory::orderBy('created_at', 'DESC')->get();
        $promotions = PromotionalSlider::limit(2)->get();
        $sliders = Slider::orderBy('created_at', 'DESC')->get();
        $products = Product::orderBy('created_at', 'DESC')
            ->limit(8)
            ->get();
        $shops = Shop::get();

        return view('common.home.index')
            ->with('featured_item', $featured_item)
            ->with('category', $category)
            ->with('new_products', $new_products)
            ->with('promotions', $promotions)
            ->with('products', $products)
            ->with('best_seller', $best_seller)
            ->with('shops', $shops)
            ->with('sliders', $sliders);
    }

    public function details2($id)
    {


        $new_products = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')->orderBy('product_id', 'DESC')->where('publish_status', true)->get();
        $item = Product::leftjoin('product_categories', 'product_categories.category_id', '=', 'products.product_category_id')
            ->leftjoin('users', 'users.id', '=', 'products.owner_id')
            ->leftjoin('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('product_id', $id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        return view('common.details.details')
            ->with('item', $item)
            ->with('images', $images)
            ->with('new_products', $new_products);
    }

    public function details($id, $name)
    {

        $new_products = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')->orderBy('product_id', 'DESC')->where('publish_status', true)->get();
        $item = Product::leftjoin('product_categories', 'product_categories.category_id', '=', 'products.product_category_id')
            ->leftjoin('users', 'users.id', '=', 'products.owner_id')
            ->leftjoin('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('product_id', $id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        return view('common.details.details')
            ->with('item', $item)
            ->with('images', $images)
            ->with('new_products', $new_products);
    }

    public function about()
    {
        return view('common.about.index');
    }


    public function shopProducts($id, $name)
    {
        $shops = Shop::get();
        $new_products = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')->orderBy('product_id', 'DESC')
            ->where('products.shop_id', $id)
            ->where('publish_status', true)->get();

        $my_shop = Shop::where('shop_id', $id)->first();

        return view('common.company.index')
            ->with('shops', $shops)
            ->with('my_shop', $my_shop)
            ->with('shop_id', $id)
            ->with('products', $new_products);
    }


    public function search(Request $request)
    {
        $shops = Shop::get();

        $new_products = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('products.product_name', 'LIKE', '%' . $request['query'] . '%')
            ->orderBy('product_id', 'DESC')->where('publish_status', true)->get();

        return view('common.search.index')
            ->with('shops', $shops)
            ->with('products', $new_products);
    }

    public function productSearch(Request $request)
    {
        $shop = $request['shop'];
        $product = $request['product'];
        if ($shop == 0) {
            $products = Product::where('products.product_name', 'LIKE', '%' . $product . '%')
                ->where('products.publish_status', true)
                ->get();
        } else {
            $query = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id');
            $query->where('shops.shop_id', $shop);
            $shop = Shop::where('shop_id', $shop)->first();
            $products = $query->where('products.product_name', 'LIKE', '%' . $product . '%')
                ->where('products.publish_status', true)
                ->get();
        }

        $shops = Shop::get();
        return view('common.search.index')
            ->with('shops', $shops)
            ->with('shop', $shop)
            ->with('query', $product)
            ->with('products', $products);
    }


    public function cart()
    {

        return view('common.cart.index');
    }

    public function checkout()
    {

        return view('common.checkout.index');
    }

    public function order($invoice)
    {

        //return $request->all();
        return view('common.order.index')->with('invoice', $invoice);
    }

    public function placeOrder(Request $request)
    {

        $payment_track_id = time() . rand(1, 9);

        if($request['shipping_address_phone']==null){
            $request['shipping_address_phone']=$request['customer_phone'];
        }
        if($request['shipping_address_name']==null){
            $request['shipping_address_name']=$request['customer_name'];
        }

        try {
            $billing_array = [
                'shipping_address_name' => $request['shipping_address_name'],
                'shipping_address_address' => $request['shipping_address_address'],
                'shipping_address_phone' => $request['shipping_address_phone'],
                'payment_track_id' => $payment_track_id,
                'union_id' => $request['union_id'],
                'upazila_id' => $request['upazila_id'],
                'district_id' => $request['district_id'],
                'division_id' => $request['division_id']
            ];
            ShippingAddress::create($billing_array);

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return response()->json([
                'status' => 'failed',
                'message' => 'There was a problem' . $exception->getMessage(),
            ], 200);
        }


        /*  customer_name: $scope.customer_name,
                  customer_phone: $scope.customer_phone,
                  customer_email: $scope.customer_email,
                  customer_address: $scope.customer_address,
                  git add .
        */


        $flag = false;
        if ($request['customer_name'] == null || $request['customer_name'] == "") {
            $flag = true;
        }
        if ($request['customer_phone'] == null || $request['customer_phone'] == "") {
            $flag = true;
        }

        if ($request['shipping_address_name'] == null || $request['shipping_address_name'] == "") {
            $flag = true;
        }

        if ($request['is_full_payment'] == 1) {
            $booking_money = 0;
        } else {

            /* foreach ($request['items'] as $item) {

                 $booking_money = Product::where('product_id', $item['id'])->fisrt()->selling_price;
                 $booking_money = $booking_money * 0.1;
             }*/


        }
        if ($flag) {
            return response()->json([
                'status' => 'failed',
                'message' => 'There was a problem'
            ]);
        } else {
            $customer_array = array(
                'customer_name' => $request['customer_name'],
                'customer_phone' => $request['customer_phone'],
                'customer_email' => $request['customer_email'],
                'customer_address' => $request['shipping_address_name'],
                'union_id' => $request['union_id'],
                'upazila_id' => $request['upazila_id'],
                'district_id' => $request['district_id'],
                'division_id' => $request['division_id']
            );

            $is_exist = Customer::where('customer_phone', $request['customer_phone'])->first();
            if (is_null($is_exist)) {
                $user_id = Customer::insertGetId($customer_array);
            } else {
                $user_id = $is_exist->customer_id;
            }

            $shipping_cost = $request['shipping_cost'];
            $total_price = $request['total_price'];


            try {


                foreach ($request['items'] as $item) {

                    //Need to fix TODO:
                    $product = Product::where('product_id', $item['id'])->first();
                    $invoice = $product->product_id . time() . rand(1, 9);
                    if ($request['is_full_payment']) {
                        $paid_amount = $product->selling_price + $request['processing_cost'] + $shipping_cost;
                    } else {
                        $paid_amount = $product->selling_price * getBookingMOney() + $request['processing_cost'] + $shipping_cost;
                    }

                    $sell_array = array(
                        'order_invoice' => $invoice,
                        'sub_total' => $request['grand_total'],
                        'paid_amount' => $paid_amount,
                        'shipping_cost' => $shipping_cost,
                        'processing_cost' => $request['processing_cost'],
                        'is_full_payment' => $request['is_full_payment'],
                        'customer_id' => $user_id,
                        'booking_money' => $booking_money,
                        'expected_delivery_date' => $request['delivery_date'],
                        'cow_delivery_type' => $request['delivery_type'],
                        'is_inside_dhaka' => $request['is_inside_dhaka'],
                        'delivery_type' => $request['delivery_type'],
                        'shop_id' => $product->shop_id,
                        'payment_track_id' => $payment_track_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    );

                    Order::create($sell_array);

                    $product_array = array(
                        'product_id' => $item['id'],
                        'selling_price' => $item['price'],
                        'quantity' => $item['qnt'],
                        'total_price' => $item['qnt'] * $item['price'],
                        'order_invoice' => $invoice,
                    );

                    OrderItem::create($product_array);
                }


                Session::put('invoice', $invoice);
                Session::put('payment_track_id', $payment_track_id);
                Session::put('total_payable', $request['grand_total']);
                Session::put('customer_phone', $request['customer_phone']);



                //$this->sendSms($request['customer_name'], $request['customer_phone'],$invoice);
                return response()->json([
                    'status' => 'success',
                    'invoice' => $invoice,
                    'message' => 'Successfully Saved',
                ], 200);
            } catch (\Exception $exception) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'There was a problem' . $exception->getMessage(),
                ], 200);
            }

        }

    }

    public function callbackResponse(Request $request)
    {

        //return view('common.order.index')->with('invoice', $invoice);
    }

    public function paymentSuccess(Request $request)
    {
        //return $request->all();
        return view('common.payment.success');
    }

    public function shopRegistration(Request $request)
    {
        return view('common.registration.create');
    }

    public function hello(Request $request)
    {

        $is_exist = User::where('phone', $request['phone'])->first();
        if (!is_null($is_exist)) {

            return back()->with('failed', 'This phone already used');
        }

        $request['password'] = Hash::make($request['password']);
        $otp = getOtp();
        $request['otp'] = $otp;
        unset($request['_token']);

        try {


            User::create($request->all());
            Session::put('phone', $request['phone']);
            return Redirect::to('/otp-verify');


        } catch (\Exception $exception) {
            return back()->with('failed', $request->all());
            return back()->with('failed', 'There is an error');
        }
        sendSms($request['phone'], "Your eHaat verification code is: " . $otp);


        return $request->all();
    }

    public function otpVerify(Request $request)
    {
        if ($request->method() == "POST") {
            //return $request->all();

            $is_exist = User::where('phone', Session::get('phone'))->where('otp', $request['otp'])->first();
            if (is_null($is_exist)) {

                return back()->with('failed', 'There is an error');
            } else {
                return Redirect::to('/admin/login')->with('success', "Your account is verified. Login to continue");
            }

        }
        return view('common.registration.otp');

    }


}
