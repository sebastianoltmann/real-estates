<?php

namespace Database\Seeders\Production;

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
        foreach($this->users() as $user){

            if(!User::whereEmail($user['email'])->first()) {
                User::factory()->create($user);
            }

        }
    }

    private function users(): array
    {
        return [
            [
                'attention' => 'mr',
                'first_name' => 'Sebastian',
                'last_name' => 'Bolek',
                'email' => 'sebastian@yask.com',
                'password' => '$2y$10$EycsdbIXVVFYSjw8r0A0TOJrXgplPsX1E2nb.VlTsFJ2CvW30aFDy'
            ],

            [
                'attention' => 'mr',
                'first_name' => 'Sebastian',
                'last_name' => 'Oltmann',
                'email' => 'sebi@yask.com',
                'password' => '$2y$10$O5asqQt4JiZr2uhLAubeJOI6wSqpm7mi/LUzmk5gwsrfFGlwO.xNu'
            ]
        ];
    }
}
