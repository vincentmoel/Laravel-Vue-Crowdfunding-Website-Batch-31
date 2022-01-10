<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];
    

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
