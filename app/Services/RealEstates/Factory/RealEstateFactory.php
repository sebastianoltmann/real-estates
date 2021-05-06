<?php

namespace App\Services\RealEstates\Factory;

use App\Services\Projects\Models\Project;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\RealEstates\RealEstateType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RealEstateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RealEstate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetAddress(),
            'type' => $this->faker->randomElement(RealEstateType::toArray()),
            'alias' => Str::slug($this->faker->sentence(1)),
            'project_id' => Project::factory(),
        ];
    }
}
