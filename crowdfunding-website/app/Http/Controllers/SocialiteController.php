<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        $url = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();

        return response()->json([
            'url' => $url
        ]);
    }

    public function handleProviderCallback($provider)
    {
        try{
            $social_user = Socialite::driver($provider)->stateless()->user();

            if(!$social_user)
            {
                return response()->json([
                    'code'      => '401',
                    'status'    => 'failed',
                    'message'   => 'Login Failed'
                ]);
            }

            $user = User::whereEmail($social_user->email)->first();
            if(!$user)
            {
                if($provider == 'google')
                {
                    $photo_profile = $social_user->avatar;

                }
                $user = User::create([
                    'email'=> $social_user->email,
                    'name' => $social_user->name,
                    'email_verified_at' => Carbon::now(),
                    'photo_profile' => $photo_profile
                ]);
            }

            $data['user'] = $user;
            $data['token'] = auth()->login($user);

            return response()->json([
                'code'      => '200',
                'status'    => 'success',
                'message'   => 'Login Success',
                'data'=> $data

            ]);
        }catch(\Throwable $th){
            return response()->json([
                'code'      => '401',
                'status'    => 'failed',
                'message'   => 'Login Failed11'
            ],401);
        }
    }
}
