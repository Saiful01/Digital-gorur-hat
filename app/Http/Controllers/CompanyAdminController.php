<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shop;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompanyAdminController extends Controller
{


    public function orders()
    {

        $is_exist = Shop::where('user_id', Auth::user()->id)->first();
        if (is_null($is_exist)) {
            return back()->with('failed', "You don't have a shop");
        }
        $results = Product::where('shop_id', $is_exist->shop_id)->paginate();
        /*
                leftjoin('order_items', 'order_items.order_invoice', '=', 'orders.order_invoice')
                    ->leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')
                    ->paginate(15);*/
        return view('admin.order.show')
            ->with('results', $results);
    }

    public function createShop()
    {
        $is_exist = Shop::where('user_id', Auth::user()->id)->first();
        if (!is_null($is_exist)) {

            return Redirect::to('/admin/profile');
        }
        return view('admin.company_admin.create_shop');
    }

    public function storeShop(\Illuminate\Http\Request $request)
    {
        try {

            Shop::create($request->except(['_token']));

            return Redirect::to('/admin/dashboard')->with('success', "Shop Created");
        } catch (\Exception $exception) {

            return back()->with('failed', "There is a problem");
        }
    }

}
