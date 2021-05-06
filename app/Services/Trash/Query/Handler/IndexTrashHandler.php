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
use App\Services\Trash\TrashModelBindings;

class IndexTrashHandler implements QueryHandler
{

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
        $model = TrashModelBindings::resourceModel($resource);

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
            'trashableModels' => TrashModelBindings::BINDINGS,
            'models' => $models,
            'resource' => $resource
        ];
    }
}
