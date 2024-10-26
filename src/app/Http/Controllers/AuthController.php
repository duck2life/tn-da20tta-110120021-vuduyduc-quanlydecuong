<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check()))
        {
            return redirect("admin/dashbroad");
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if (Auth::user()->user_type == 1)
            {
                return redirect('admin/dashbroad');
            }
            else if (Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashbroad');
            }
            else if (Auth::user()->user_type == 3)
            {
                return redirect('guest/dashbroad');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter the correct Email and Password.');
        }
    }

        public function forgotpassword()
    {
        return view('auth.forgot');
    }

        public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            
            return redirect()->back()->with('success', 'Please check your Email to reset your Password.');
        }
        else
        {
            return redirect()->back()->with('error', 'Email not found in the system.');

        }
    }

 

    public function logout()
    {
        Auth::logout();
        return redirect(url(""));
    }
     
}