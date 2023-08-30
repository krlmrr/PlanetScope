<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class ProjectsController extends Controller
{
    public function index()
    {
        //        $this->authorize('viewAny', Project::class);

        return Inertia::render('Projects/Index', [

        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Projects/Create');
    }

    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        return Project::create($request->validated());
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return $project;
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update($request->validated());

        return $project;
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return response()->json();
    }
}
