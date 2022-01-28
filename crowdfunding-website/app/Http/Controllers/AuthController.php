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
                'status'    => 'failed',
                'message'   => 'Unauthorized'
            ],401) ;
        }
        

        $user = User::where('username',$request->username)->first();

        return response()->json([
            'data'      => [
                                'users' => new UserResource($user),
                                'token' => $token
                            ],
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'Success Login'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'Success Logout'
        ]);
    }

}
