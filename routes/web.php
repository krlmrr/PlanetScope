<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ScopeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('projects', ProjectsController::class);
    Route::resource('projects.scopes', ScopeController::class);
});
