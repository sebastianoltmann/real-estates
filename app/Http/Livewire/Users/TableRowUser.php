<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class TableRowUser extends Component
{
    /**
     * @var User
     */
    public User $user;

    public function render()
    {
        return view('livewire.users.table-row-user');
    }

    /**
     * Write code on Method
     */
    public function delete()
    {
        $this->user->delete();
    }
}
