<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $team = Team::inRandomOrder()->first();

        if (!$team) {
            $team = Team::factory()->create();
        }

        $user = User::inRandomOrder()->first();

        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'team_id' => $team->id,
            'created_by' => $user->id,
            'name' => Str::title($this->faker->words(3, true)),
            'repo' => 'https://github.com/' . $this->faker->word() . '/' . $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
