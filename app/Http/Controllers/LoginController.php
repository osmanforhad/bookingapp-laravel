<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * ====================
     * Loads the login page
     * ====================
     */
    public function index()
    {
        $data['title'] = "Login";
        return view('login.login', $data);
    }

    /**
     * ====================
     * Loads the register account page
     * ====================
     */
    public function register()
    {
        $data['title'] = "Create Account";
        return view('register.register', $data);
    }

    /**
     * ====================
     * Loads the password reset page
     * ====================
     */
    public function forgot_password()
    {
        $data['title'] = "Reset Password";
        return view('passwordrecovery.forgot-password', $data);
    }

    /**
     * ====================
     * Process for create an account
     * ====================
     */
    public function process_register(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'username' => 'required|alpha_num|unique:users|max:255',
            'password' => 'required|max:255',
        ]);

        $info = array(
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        );
        $user = User::create($info);
        if (!empty($user)) {
            return redirect(route('login'))->with('message', 'User has been created. Please Login in');
        } else {
            return redirect()->back()->with('error', 'Error! Please try again.');
        }
    }

    public function authenticate_user(Request $request)
    {
        $request->validate([
            'username' => 'required|alpha_num|max:255',
            'password' => 'required|max:255'
        ]);
        $credentials = array(
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        );
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->with('error', 'Error! Invalid Credentials.');
        }
    }

}