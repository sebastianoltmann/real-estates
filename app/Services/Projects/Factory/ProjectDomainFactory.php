<?php

namespace App\Services\Projects\Factory;

use App\Services\Projects\Models\Project;
use App\Services\Projects\Models\ProjectDomain;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectDomainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectDomain::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'domain' => $this->faker->unique()->domainName(),
            'is_ssl' => false,
            'current_project_id' => Project::factory(),
        ];
    }
}
