<?php

namespace Database\Seeders;

use Database\Seeders\Development\DevProjectDomainSeeder;
use Database\Seeders\Development\UserAdminSeeder;
use Database\Seeders\Other\DocumentCategorySeeder;
use Database\Seeders\Development\ProjectSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DevelopmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(App::environment(['local','development'])){
            $this->call([
                UserAdminSeeder::class,
                ProjectSeeder::class,
                DevProjectDomainSeeder::class,
                DocumentCategorySeeder::class,
            ]);
        }
    }
}
