<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username','password');

        if(!$token = JWTAuth::attempt($credentials))
        {
            return response()->json([
                'code'      => '401',
                'message'   => 'Unauthorized'
            ],401) ;
        }
        

        $user = User::where('username',$request->username)->first();

        return response()->json([
            'data'      => new UserResource($user),
            'token'     => $token,
            'code'      => '00',
            'message'   => 'success'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'code'      => '00',
            'message'   => 'success'
        ]);
    }

    public function tes()
    {
        return auth()->user()->name;
    }
}
