<?php

namespace Database\Seeders\Other;

use App\Services\Documents\Models\DocumentCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
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
        if(!App::environment('production')){
            Schema::disableForeignKeyConstraints();
            DocumentCategory::truncate();
            Schema::enableForeignKeyConstraints();
        }

        DocumentCategory::reguard();

        foreach($this->documentCategories() as $documentCategory){

            if(!App::environment('production')){
                $documentCategoryModel = DocumentCategory::where('name->en', $documentCategory['name']['en'])->first();
            }
            if(!empty($documentCategoryModel)){
                DocumentCategory::create($documentCategory);
            }
        }

    }

    private function documentCategories(): array
    {
        return [
            ['name' => [
                'en' => 'Offers',
                'de' => 'Angebote'
            ]],
            ['name' => [
                'en' => 'Financial',
                'de' => 'Finanziell'
            ]],
            ['name' => [
                'en' => 'Builders',
                'de' => 'Bauherrinnen'
            ]],
            ['name' => [
                'en' => 'Orders',
                'de' => 'Aufträge'
            ]],
        ];
    }

}
