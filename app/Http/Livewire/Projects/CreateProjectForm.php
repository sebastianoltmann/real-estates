<?php

namespace App\Http\Livewire\Projects;

use Laravel\Jetstream\Http\Livewire\CreateTeamForm;

class CreateProjectForm extends CreateTeamForm
{
    public function render()
    {
        return view('admin.projects.create-project-form');
    }
}
