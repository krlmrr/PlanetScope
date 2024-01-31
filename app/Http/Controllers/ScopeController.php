<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScopeRequest;
use App\Models\Project;
use App\Models\Scope;
use Inertia\Inertia;
use Inertia\Response;

class ScopeController extends Controller
{
    public function index(Project $project)
    {
        $this->authorize('viewAny', [Scope::class, $project]);

        return Inertia::render('Scope/Index', [
            'project' => $project,
            'scopes' => Scope::where('project_id', $project->id)->with('status')->get(),
        ]);
    }

    public function create(Project $project): Response
    {
        $this->authorize('create', [Scope::class, $project]);

        return Inertia::render('Scope/Create', [
            'project' => $project,
        ]);
    }

    public function store(Project $project, ScopeRequest $request)
    {
        $this->authorize('create', [Scope::class, $project]);

        Scope::create($request->validated());

        return redirect(route('projects.show', ['project' => $project]));
    }

    public function show(Project $project, Scope $scope)
    {
        $this->authorize('view', [Scope::class, $project]);

        return $scope;
    }

    public function update(ScopeRequest $request, Project $project, Scope $scope)
    {
        $this->authorize('update', [$scope, $project]);

        $scope->update($request->validated());

        return $scope;
    }

    public function destroy(Project $project, Scope $scope)
    {
        $this->authorize('delete', [$scope, $project]);

        $scope->delete();

        return response()->json();
    }
}
