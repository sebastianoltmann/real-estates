<?php

namespace App\Services\Trash\Command;


use App\Services\CQRS\Command;
use Illuminate\Database\Eloquent\Model;

class ForceDeleteTrashedModelCommand implements Command
{

    /**
     * ForceDeleteTrashedModelCommand constructor.
     *
     * @param Model $model
     */
    public function __construct(
        private Model $model
    )
    {
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }
}
