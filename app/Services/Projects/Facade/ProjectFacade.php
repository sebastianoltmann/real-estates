<?php


namespace App\Services\Projects\Facade;


use App\Services\Projects\ProjectService;
use Illuminate\Support\Facades\Facade;
use App\Services\Projects\Models\Project;

/**
 * Class ProjectFacade
 *
 * @package App\Services\Projects\Facade
 * @method static Project getProject()
 * @method static string getDomain()
 * @method static string getName()
 * @method static Project|null getCurrentProject()
 * @see ProjectService
 */
class ProjectFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project';
    }
}
