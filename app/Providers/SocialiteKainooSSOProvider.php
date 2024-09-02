<?php

namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User as SocialiteUser;
use App\Models\User;
use Illuminate\Support\Arr;
use Laravel\Socialite\Facades\Socialite;

class SocialiteKainooSSOProvider extends AbstractProvider implements ProviderInterface
{
    protected $scopes = [
        'openid',
        // 'profile',
        // 'email'
    ];
    
    private function getSiteUrl()
    {
        return 'https://dev.sso.kainoo.ch/realms/dev/protocol/openid-connect';
    }

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase($this->getSiteUrl() . '/auth', $state);
    }
 
    protected function getTokenUrl()
    {
        return $this->getSiteUrl() . '/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->post($this->getSiteUrl() . '/userinfo', [
            'headers' => [
                'cache-control' => 'no-cache',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        ]);
     
        return json_decode($response->getBody()->getContents(), true);
    }
 
    protected function mapUserToObject(array $user)
    {
        return (new SocialiteUser())->setRaw($user)->map([
            'id' => $user['sub'],
            'name' => $user['name'],
            'email' => $user['email'],
            'nickname' => $user['given_name'],
            'name' => $user['family_name'],
        ]);
    }
}
