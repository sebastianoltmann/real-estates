<?php

namespace App\Services\Projects\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;

class ProjectMembership extends JetstreamMembership
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'project_user';
}
