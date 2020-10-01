<?php

namespace App\Http\Controllers;

use App\PromotionalSlider;
use Illuminate\Http\Request;

class PromotionalSliderController extends Controller
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


    public function create()
    {
        return view('admin.promotional_slider.create');
    }


    public function store(Request $request)
    {

        // return $request->all();

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            ]);
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/promotional_slider');
            $image->move($destinationPath, $image_name);

            $request['slider_image'] = $image_name;
        }
        //return $request->except(['_token', 'image']);




        try {
            PromotionalSlider::create( $request->except(['_token', 'image']));
            return back()->with('success', "Successfully Created");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function show(PromotionalSlider $promotionalSlider)
    {
        $results = PromotionalSlider::orderBy('created_at', 'DESC')->get();
        return view('admin.promotional_slider.show')->with('results', $results);
    }


    public function edit($id)
    {
        $result = PromotionalSlider::where('promotional_slider_id', $id)->first();
        return view('admin.promotional_slider.edit')
            ->with('result', $result);
    }

    public function update(Request $request)
    {

        try {

            if ($request->hasFile('image')) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
                ]);
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/promotional_slider');
                $image->move($destinationPath, $image_name);

                $request['slider_image'] = $image_name;
            }

            PromotionalSlider::where('promotional_slider_id', $request['promotional_slider_id'])->update($request->except(['promotional_slider_id','image' ,'_token']));
            return back()->with('success', "Successfully Updated");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            PromotionalSlider::where('promotional_slider_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
