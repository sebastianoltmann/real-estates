<?php


namespace App\Services\Projects;


use App\Services\Projects\Models\Project;
use Illuminate\Support\Facades\Config;

class ProjectService implements ProjectServiceInterface
{

    /**
     * ProjectService constructor.
     *
     * @param Project $project
     */
    public function __construct(
        private Project $project
    ) {}

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->getProject()->domain;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getProject()->name;
    }

    /**
     * @return Project|null
     */
    public function getCurrentProject(): ?Project
    {
        return Project::whereAlias(Config::get('project.alias'))->first();
    }
}
