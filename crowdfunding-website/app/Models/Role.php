<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Uuid;

    protected $guarded = [];
    

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
