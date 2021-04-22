<?php

namespace App\Services\Documents\Factories;

use App\Services\Documents\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\Projects\Models\Project;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'name' => $this->faker->sentence(),
        ];
    }
}
