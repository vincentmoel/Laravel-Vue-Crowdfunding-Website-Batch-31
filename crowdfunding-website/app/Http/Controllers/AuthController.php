<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(!$token = auth()->attempt($request->only('username','password')))
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
}
