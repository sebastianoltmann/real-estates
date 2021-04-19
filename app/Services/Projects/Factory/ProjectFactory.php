<?php

namespace App\Services\Projects\Factory;

use App\Models\User;
use App\Services\Projects\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase(),
            'alias' => $this->faker->unique()->domainWord(),
            'is_main' => false,
            'user_id' => User::factory(),
        ];
    }
}
