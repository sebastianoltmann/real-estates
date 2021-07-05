<?php


namespace App\Services\Projects;


use App\Services\Projects\Models\Project;

interface ProjectServiceInterface
{

    public function getProject(): Project;

    /**
     * @return string
     */
    public function getDomain(): string;

    /**
     * @return string
     */
    public function getName(): string;
}
