<?php


namespace App\Common\Traits\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuidAttribute
{

    /**
     * Boot function from Laravel.
     */
    protected static function bootHasUuidAttribute()
    {
        static::creating(function ($model) {
            $uuidKey = $model->getUuidKeyName();
            if (empty($model->{$uuidKey})) {
                $model->{$uuidKey} = Str::uuid();
            }
        });
    }

    /**
     * @return string
     */
    public function getUuidKeyName(): string
    {
        return !empty($this->uuidKey)
            ? $this->uuidKey
            : 'uuid';
    }

    /**
     * @return string
     */
    public function getUuidKey(): string
    {
        return $this->getAttribute($this->getUuidKeyName());
    }

    /**
     * @param string $uuid
     * @return Model|null
     */
    public static function findByUuid(string $uuid): ?Model
    {
        return static::where((new static())->getUuidKeyName(), $uuid)->first();
    }
}
