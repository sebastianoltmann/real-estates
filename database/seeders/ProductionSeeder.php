<?php

namespace Database\Seeders;

use Database\Seeders\Production\UserAdminSeeder;
use Database\Seeders\Other\DocumentCategorySeeder;
use Database\Seeders\Production\ProjectSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ProductionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(App::environment('production')){
            $this->call([
                UserAdminSeeder::class,
                ProjectSeeder::class,
                DocumentCategorySeeder::class,
            ]);

        }
    }
}
