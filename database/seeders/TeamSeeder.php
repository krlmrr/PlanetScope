<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'karl@planetscope.io')->first();

        $team = Team::factory()->create([
            'name' => 'Planetscope',
            'user_id' => $user->id,
            'personal_team' => false,
        ]);

        $user->switchTeam($team);
    }
}
