<?php

namespace App\Http\Livewire\Projects;

use Laravel\Jetstream\Http\Livewire\UpdateTeamNameForm;

class UpdateProjectNameForm extends UpdateTeamNameForm
{
    public function render()
    {
        return view('admin.projects.update-project-name-form');
    }
}
