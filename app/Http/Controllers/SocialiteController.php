<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facade;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;

class SocialiteController extends Controller
{
    protected $providers = [ "github", "kainoo-sso" ];

    public function redirect($provider)
    {
        if(in_array($provider, $this->providers))
        {
            return Socialite::driver($provider)->redirect();
        }
        return response("", 404);
    }

    public function callback($provider)
    {
        if(in_array($provider, $this->providers))
        {
            $user = null;
            try {
                $user = Socialite::driver($provider)->user();
            } catch(Exception $e) {
                return redirect('/register')->withErrors([
                    "message" => "Failed to login with " . $provider
                ]);
            }
            $email = $user->getEmail();
            $name = $user->getName();
            $username = $user->getNickname();

            $user = User::where("email", $email)->first();

            if(!$user)
            {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'username' => $username,
                    'password' => bcrypt(Str::Random(15)),
                    'email_verified_at' => Carbon::now()
                ]);
            }

            Auth::login($user);
            if (Auth::check()) return redirect('/');
        }
        return response("", 404);
    }
}
