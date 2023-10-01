<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scopes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('scope_status_id')->default('1');
            $table->string('title');
            $table->longText('overview')->nullable();
            $table->longText('business_case')->nullable();
            $table->integer('budget')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scopes');
    }
};
