<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    public function run(): void
    {
        Team::firstOrCreate([
            'name' => 'PlanetScope',
        ], [
            'user_id' => 1,
            'personal_team' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
