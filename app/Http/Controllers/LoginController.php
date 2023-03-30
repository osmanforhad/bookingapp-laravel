<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('register.register');
    }

    public function forgot_password()
    {
        return view('passwordrecovery.forgot-password');
    }

    public function process_register(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'name' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
        ]);
    }

}