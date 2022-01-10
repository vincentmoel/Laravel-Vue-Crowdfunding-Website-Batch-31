<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    protected $with = ['role'];
    

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if(empty($model->{$model->getKeyName()}))
            {
                $model->{$model->getKeyName()} = Str::uuid();
            }
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
}
