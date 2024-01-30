<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'karlm89@me.com',
        ], [
            'name' => 'Karl Murray',
            'password' => bcrypt('password'),
            'current_team_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
