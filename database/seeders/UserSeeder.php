<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'karl@planetscope.io'
        ], [
            'name' => 'Karl Murray',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
