<?php

namespace Database\Seeders\Other;

use App\Services\Documents\Models\DocumentCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DocumentCategory::truncate();
        Schema::enableForeignKeyConstraints();

        DocumentCategory::reguard();

        foreach($this->documentCategories() as $documentCategory){
            DocumentCategory::create($documentCategory);
        }

    }

    private function documentCategories(): array
    {
        return [
            ['name' => 'Offers'],
            ['name' => 'Financial'],
            ['name' => 'Builders'],
            ['name' => 'Orders'],
        ];
    }

}
