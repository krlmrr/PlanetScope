<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('team_user');
    }

    public function down(): void
    {
        Schema::dropIfExists('team_user');
    }
};
