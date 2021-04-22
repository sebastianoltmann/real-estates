<?php


namespace App\Common\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Common\Repositories\Eloquent
 */
interface EloquentRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;
}

