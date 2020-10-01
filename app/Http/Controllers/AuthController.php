<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{


    public function login()
    {
        //return 0;
        return view('admin.login.index');
    }

    public function loginCheck(Request $request)
    {

        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->intended('/admin/dashboard');
        }

        return Redirect::to('/admin/login')
            ->with('failed', 'Email or password is wrong.')
            ->withInput();

    }

    public function logout()
    {
        Auth::logout();
        return \redirect('/');
    }

}
