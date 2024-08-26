<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register()
    {
        request()->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:20',
        ]);

        $user = User::create([
            'username' => request('username'),
            'name' => request('name'),
            'email' => request('email'),
            'description' => request('description'),
            'password' => request('password'),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect('/email/verify');
    }

    public function verifyEmail() 
    {
        return view('auth.verify_email');
    }

    public function emailVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    }

    public function sendEmailVerification()
    {
        request()->user()->sendEmailVerificationNotification();
        return back()->withErrors([ 'messages' => 'Verification link sent!' ]);
    }
}
