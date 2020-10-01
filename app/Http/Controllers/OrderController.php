<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\OrderPayment;
use App\ShippingAddress;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show()
    {

        if (Auth::user()->user_type == 1) {
            $results = Order:: leftjoin('order_items', 'order_items.order_invoice', '=', 'orders.order_invoice')
                ->leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')
                ->paginate(15);

        } else {

            $shop = Shop::where('user_id', Auth::user()->id)->first();
            if (is_null($shop)) {
                return back()->with('failed', "You do not have shop");
            }
            $results = Order:: leftjoin('order_items', 'order_items.order_invoice', '=', 'orders.order_invoice')
                ->leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')
                ->where('orders.shop_id', $shop->shop_id)
                ->paginate(15);

        }


        /* $products = OrderItem::join('products', 'products.product_id', '=', 'order_items.product_id')
             ->where('order_items.order_invoice', 'orders.order_invoice')
             ->get();*/

        return view('admin.order.show')
            ->with('results', $results);
        /*  ->with('products',$products);*/
    }

    public function orderDetails($invoice_number)
    {
        /*     $results = Order:: leftjoin('order_items', 'order_items.order_invoice', '=', 'orders.order_invoice')
                 ->leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')
                 ->paginate(15);*/

        $order = Order:: leftjoin('order_items', 'order_items.order_invoice', '=', 'orders.order_invoice')
            ->leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->where('orders.order_invoice', $invoice_number)
            ->first();
        $products = OrderItem::join('products', 'products.product_id', '=', 'order_items.product_id')
            ->leftJoin('shops', 'shops.shop_id', '=', 'products.shop_id')
            ->where('order_items.order_invoice', $invoice_number)
            ->get();

        $shipping_address = ShippingAddress::where('payment_track_id', $order->payment_track_id)->first();
        $payment_data = OrderPayment::where('tran_id', $order->payment_track_id)->first();
        return view('admin.order.details')
            ->with('products', $products)
            ->with('payment_data', $payment_data)
            ->with('shipping_address', $shipping_address)
            ->with('order', $order);
        /*  ->with('products',$products);*/
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
