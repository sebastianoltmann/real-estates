<?php

namespace App\Http\Livewire\Projects;

use Laravel\Jetstream\Http\Livewire\TeamMemberManager;

class ProjectMemberManager extends TeamMemberManager
{
    public function render()
    {
        return view('admin.projects.project-member-manager');
    }
}
