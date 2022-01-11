<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OtpCode;
use App\Events\OtpCodeEvent;
use Illuminate\Support\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreOtpCodeRequest;
use App\Http\Requests\UpdateOtpCodeRequest;
use App\Http\Requests\VerificationOtpCodeRequest;

class OtpCodeController extends Controller
{
    public function update(UpdateOtpCodeRequest $request)
    {
        $user = User::where('email',$request->email)->first();
        $user->generateOtpCode();

        event(new OtpCodeEvent($user,$user->otp_code));


        return response()->json([
            'data'      => [
                                'user' => new UserResource($user),
                            ],
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'Success Regenerate OTP Code'
        ]);
    }

    public function verification(VerificationOtpCodeRequest $request)
    {
        $otp_code = OtpCode::where('otp',$request->otp)
                        ->where('user_id',auth()->user()->id)
                        ->first();
        if(!$otp_code)
        {
            return response()->json([
                'code'      => '404',
                'status'    => 'failed',
                'message'   => 'OTP Code Not Found'
            ]);
        }

        $time = Carbon::now();

        if($time > $otp_code->valid_until)
        {
            return response()->json([
                'code'      => '400',
                'status'    => 'failed',
                'message'   => 'OTP Code has Expired'
            ]);
        }

        $user = User::find(auth()->user()->id);

        $user->update(['email_verified_at' => Carbon::now()]);

        $this->destroy($otp_code);

        return response()->json([
            'data'      => [
                                'user' => new UserResource($user),
                            ],
            'code'      => '200',
            'status'    => 'success',
            'message'   => 'Success Verification Code'
        ]);

        
    }

    public function destroy(OtpCode $otp_code)
    {
        $otp_code->delete();
    }
    
}
