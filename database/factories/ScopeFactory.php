<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Scope;
use App\Models\ScopeStatus;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScopeFactory extends Factory
{
    protected $model = Scope::class;

    public function definition(): array
    {
        return [
            'team_id' => Team::factory()->create()->id,
            'project_id' => Project::factory()->create()->id,
            'scope_status_id' => ScopeStatus::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(3),
            'overview' => $this->faker->paragraph(),
            'business_case' => $this->faker->paragraph(),
            'start_date' => Carbon::now()->addWeeks(4),
            'end_date' => Carbon::now()->addMonths(6),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
