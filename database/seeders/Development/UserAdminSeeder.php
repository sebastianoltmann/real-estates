<?php

namespace Database\Seeders\Development;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->users() as $userEmail){
            if(!User::whereEmail($userEmail)->first()) {
                User::factory()->create([
                    'email' => $userEmail,
                ]);
            }

        }
    }

    private function users(): array
    {
        return [
            'admin@yask.com',
            'sebastian@yask.com',
            'sebi@yask.com',
        ];
    }
}
