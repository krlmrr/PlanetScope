<?php

namespace Database\Factories;

use App\Models\Scope;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScopeFactory extends Factory
{
    protected $model = Scope::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'project_id' => $this->faker->randomNumber(),
            'team_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
