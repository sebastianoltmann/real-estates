<?php


namespace App\Common\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements EloquentRepositoryInterface
{

    /**
     * @var Model
     */
    protected Model $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $model = $this->model();
        $this->model = new $model;
    }


    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
}
