<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class SocialiteKainooSSOServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'kainoo-sso',
            function ($app) use ($socialite) {
                $config = config('services.kainoo-sso');
                return $socialite->buildProvider(SocialiteKainooSSOProvider::class, $config);
            }
        );
    }
}