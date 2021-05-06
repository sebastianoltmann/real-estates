<?php

namespace App\Services\Trash\Query\Handler;


use App\Models\User;
use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Documents\Models\Document;
use App\Services\Projects\Models\Project;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\Trash\Query\IndexTrashQuery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class IndexTrashHandler implements QueryHandler
{

    /**
     * @var string[]
     */
    private $bindings = [
        'documents' => Document::class,
        'users' => User::class,
        'real-estates' => RealEstate::class,
    ];

    /**
     * @param IndexTrashQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        $resource = $query->getResource();
        /**
         * @var SoftDeletes $model
         */
        $model = $this->resourceModel($resource);

        if(!$model)
            abort(Response::HTTP_NOT_FOUND);

        /**
         * @var Project $project
         */
        $project = Auth::user()->currentProject;

        $query = $model->newQuery();
        if(method_exists($model, 'project')){
            $query->whereHas('project', function(Builder $query) use ($project){
                $query->where($project->getForeignKey(), $project->getKey());
            });
        } elseif(method_exists($model, 'projects')){
            $query->orWhereHas('projects', function(Builder $query) use ($project){
                $query->where($project->getForeignKey(), $project->getKey());
            });
        }
        $models = $query->onlyTrashed()->paginate();

        return [
            'trashableModels' => $this->bindings,
            'models' => $models,
            'resource' => $resource
        ];
    }

    /**
     * @param string $resource
     * @return Model|null
     */
    private function resourceModel(string $resource): ?Model
    {
        $model = $this->bindings[$resource] ?? null;
        if(!$model) return $model;

        if(!in_array(SoftDeletes::class, class_uses($model)))
            return null;

        return new $model;
    }
}
