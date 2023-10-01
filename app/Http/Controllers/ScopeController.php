<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScopeRequest;
use App\Models\Project;
use App\Models\Scope;
use Inertia\Inertia;
use Inertia\Response;

class ScopeController extends Controller
{
    public function create(Project $project): Response
    {
        return Inertia::render('Scope/Create', [
            'project' => $project,
        ]);
    }

    public function store(ScopeRequest $request)
    {
        $this->authorize('create', Scope::class);

        return Scope::create($request->validated());
    }

    public function show(Scope $scope)
    {
        $this->authorize('view', $scope);

        return $scope;
    }

    public function update(ScopeRequest $request, Scope $scope)
    {
        $this->authorize('update', $scope);

        $scope->update($request->validated());

        return $scope;
    }

    public function destroy(Scope $scope)
    {
        $this->authorize('delete', $scope);

        $scope->delete();

        return response()->json();
    }
}
