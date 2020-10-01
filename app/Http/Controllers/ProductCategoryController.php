<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {

        //return $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/category');
            $image->move($destinationPath, $image_name);

            $request['category_image'] = "/category/" . $image_name;
        }

        // return $request->except(['_token', 'image']);
        try {
            ProductCategory::create($request->except(['_token', 'image']));
            return back()->with('success', "Successfully Created");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function show(ProductCategory $coupon)
    {
        $results = ProductCategory::orderBy('created_at', 'DESC')->get();
        return view('admin.category.show')->with('results', $results);
    }


    public function edit($id)
    {
        $result = ProductCategory::where('category_id', $id)->first();
        return view('admin.category.edit')
            ->with('result', $result);
    }

    public function update(Request $request)
    {

        try {
            ProductCategory::where('category_id', $request['category_id'])->update($request->except(['category_id', '_token']));
            return back()->with('success', "Successfully Updated");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            ProductCategory::where('category_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
