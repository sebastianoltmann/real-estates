<?php

namespace App\Http\Livewire\Projects;

use Laravel\Jetstream\Http\Livewire\DeleteTeamForm;
use Livewire\Component;

class DeleteProjectForm extends DeleteTeamForm
{
    public function render()
    {
        return view('admin.projects.delete-project-form');
    }
}
