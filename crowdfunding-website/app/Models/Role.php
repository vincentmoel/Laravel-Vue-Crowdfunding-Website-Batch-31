<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Uuid;

    protected $guarded = [];
    // protected $keyType = 'string';
    // public $incrementing = false;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($model){
    //         if(empty($model->{$model->getKeyName()}))
    //         {
    //             $model->{$model->getKeyName()} = Str::uuid();
    //         }
    //     });
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
