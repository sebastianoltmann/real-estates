<?php


namespace App\Services\Trash;


use App\Models\User;
use App\Services\Documents\Models\Document;
use App\Services\RealEstates\Models\RealEstate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrashModelBindings
{
    /**
     * @var string[]
     */
    const BINDINGS = [
        'documents' => Document::class,
        'users' => User::class,
        'real-estates' => RealEstate::class,
    ];

    /**
     * @param string $resource
     * @return Model|null
     */
    public static function resourceModel(string $resource): ?Model
    {
        $model = self::BINDINGS[$resource] ?? null;
        if(!$model) return $model;

        if(!in_array(SoftDeletes::class, class_uses($model)))
            return null;

        return new $model;
    }
}
