<?php

namespace Database\Seeders;

use App\Models\ScopeStatus;
use Illuminate\Database\Seeder;

class ScopeStatusesSeeder extends Seeder
{
    public function run(): void
    {
        ScopeStatus::firstOrCreate([
            'status' => 'New',
        ], [
            'description' => 'The scope has been created.',
        ]);

        ScopeStatus::firstOrCreate([
            'status' => 'Awaiting Approval',
        ], [
            'description' => 'The scope is awaiting approval.',
        ]);

        ScopeStatus::firstOrCreate([
            'status' => 'Approved',
        ], [
            'description' => 'The scope is approved.',
        ]);

        ScopeStatus::firstOrCreate([
            'status' => 'Complete',
        ], [
            'description' => 'The work has been completed.',
        ]);
    }
}
