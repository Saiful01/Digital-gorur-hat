<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {

        // return $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/user_image');
            $image->move($destinationPath, $image_name);

            $request['profile_pic'] = "/user_image/" . $image_name;
        }


        $request['password'] = Hash::make($request['password']);
        $request['phone'] = $request['phone'];
        unset($request['_token']);
        unset($request['image']);


        //return $request->all();
        try {
            DB::table('users')->insert($request->except(['image']));
            return back()->with('success', "Successfully Created");

        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function show(User $coupon)
    {
        $results = User::orderBy('created_at', 'DESC')->get();
        return view('admin.user.show')->with('results', $results);
    }


    public function edit($id)
    {
        $result = User::where('id', $id)->first();
        return view('admin.user.edit')
            ->with('result', $result);
    }

    public function update(Request $request)
    {

        try {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/user_image');
                $image->move($destinationPath, $image_name);
                $request['profile_pic'] = "/user_image/" . $image_name;
            }

            if ($request['password'] != null) {
                $request['password'] = Hash::make($request['password']);
            }else{
                unset($request['password']);
            }


            User::where('id', $request['id'])->update($request->except(['id', 'image', '_token']));
            return back()->with('success', "Successfully Updated");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
