<?php


namespace App\Common\Traits\Eloquent;


use Ramsey\Uuid\Uuid;

trait HasUuidAttribute
{

    /**
     * Boot function from Laravel.
     */
    protected static function bootHasUuidAttribute()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Uuid::uuid4()->toString();
            }
        });
    }
}