<?php

namespace App\Http\Controllers;

use App\SocialAuth;
use Socialite;
use Auth;
class SocialAuthController extends Controller
{
    /**
     * Login with Providers ( Facebook , LinkedIn , Twitter , Google+ )
     * @param $provider
     * @return mixed
     */

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $loggedUser = Socialite::driver($provider)->user();

        $user = SocialAuth::whereEmail($loggedUser->getEmail())->first();

        if(!$user){
            $user = SocialAuth::create([
                'user_id' => $loggedUser->getId(),
                'email' => $loggedUser->getEmail(),
                'provider' => $provider,
            ]);
        }

        Auth::Login($user);
        return redirect()->to('/home');

    }

}
