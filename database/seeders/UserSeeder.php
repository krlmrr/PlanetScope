<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Karl Murray',
            'email' => 'karl@planetscope.io',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
