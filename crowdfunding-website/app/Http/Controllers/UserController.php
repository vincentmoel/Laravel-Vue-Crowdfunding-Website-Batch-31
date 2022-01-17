<?php

namespace App\Http\Controllers;

use App\Events\OtpCodeEvent;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpCodeMail;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $get_request = $request->all();
        $get_request['password'] = Hash::make($request->password);
        
        $user = User::create($get_request);

        event(new OtpCodeEvent($user,'register'));

        return response()->json([
            'data'      => [
                                'user' => new UserResource($user)
                            ],
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'Success Register'
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        if(!Hash::check($request->old_password,auth()->user()->password))
        {
            return response()->json([
                'code'      => '401',
                'status'    => 'failed',
                'message'   => "Wrong Password"
            ]);
        }

        $user = User::find(auth()->user()->id);

        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'data'      => [
                                'user' => new UserResource($user)
                            ],
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'Success Update Password'
        ]);
    }

}
