<?php

namespace App\Models;

use App\Traits\Uuid;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, Uuid;


    protected $guarded = [];
    

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->role_id = $model->getUserId();
        });

        static::created(function ($model){
            $model->generateOtpCode();
        });

    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function otp_code()
    {
        return $this->hasOne(OtpCode::class);
    }




    public function getAdminId()
    {
        $role = Role::where('name','admin')->first();

        return $role->id;
    }

    public function getUserId()
    {
        $role = Role::where('name','user')->first();

        return $role->id;
    }

    public function generateOtpCode()
    {
        do{
            $random_number = mt_rand(100000,999999);
            $check_if_exist = OtpCode::where('otp', $random_number)->first();
        }while($check_if_exist);

        $time = Carbon::now();

        $otp_code = OtpCode::updateOrCreate(
            ['user_id'          => $this->id],
            [
                'otp'           => $random_number,
                'valid_until'   => $time->addMinute(5)
            ]);
    }
    
}
