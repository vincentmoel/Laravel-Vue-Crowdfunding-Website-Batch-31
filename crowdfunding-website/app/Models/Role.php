<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
