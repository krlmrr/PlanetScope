<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    public function run(): void
    {
        Project::firstOrCreate([
            'name' => 'Test Project',
        ], [
            'team_id' => 1,
            'created_by' => 1,
        ]);
    }
}
