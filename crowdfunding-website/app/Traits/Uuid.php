<?php

namespace App\Traits;

use Illuminate\Support\Str;


trait Uuid
{
    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    protected static function bootUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()}))
            {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }

}

?>
