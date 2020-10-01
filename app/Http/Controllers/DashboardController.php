<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{


    public function dashboard()
    {

        return view('admin.dashboard.index');
    }

    public function profile()
    {


        return view('admin.profile.edit')->with('result',  Auth::user());
    }
    /////profile update


    public function update(Request $request)
    {
        unset($request['_token']); //Remove Token
        $id = $request['id'];
        unset($request['id']); //Remove id


        if ($request['password'] == null) {
            unset($request['password']);
        } else {
            $request['password'] = Hash::make($request['password']);
        }

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            ]);
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $image_name);
            $request['profile_pic'] = $image_name;
        }

         //return $request->except(['image']);
        try {
            User::where('id', $id)->update($request->except(['image']));
            return back()->with('success', "Profile Updated");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
