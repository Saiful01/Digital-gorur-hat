<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        return view('admin.customer.create');


    }


    public function store(Request $request)
    {
        //return $request->all();
        try {

            Customer::create($request->except(['_token']));
            return back()->with('success', "Successfully Customer added");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('admin.customer.show')
            ->with('results', Customer::OrderBy('created_at', 'DESC')->get());
    }

    public function edit($id)
    {
        return view('admin.customer.edit')
            ->with('result', Customer::where('customer_id', $id)->first());
    }

    public function update(Request $request, Customer $customer)
    {

        if ($request['customer_password'] == null) {
            unset($request['customer_password']);
        }

        //return $request->all();
        try {

            Customer::where('customer_id', $request['customer_id'])->update($request->except(['_token']));
            return back()->with('success', "Successfully Customer updated");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {

            Customer::where('customer_id', $id)->delete();
            return back()->with('success', "Successfully Customer Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }


    }
}
