<?php

namespace Database\Seeders;

use App\Models\ScopeStatus;
use Illuminate\Database\Seeder;

class ScopeStatusesSeeder extends Seeder
{
    public function run(): void
    {
        ScopeStatus::create([
            'status' => 'New',
            'description' => 'The scope has been created.'
        ]);

        ScopeStatus::create([
            'status' => 'Awaiting Approval',
            'description' => 'The scope is awaiting approval.'
        ]);

        ScopeStatus::create([
            'status' => 'Approved',
            'description' => 'The scope is approved.'
        ]);

        ScopeStatus::create([
            'status' => 'Complete',
            'description' => 'The work has been completed.'
        ]);
    }
}
