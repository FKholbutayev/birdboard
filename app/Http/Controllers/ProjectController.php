<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;


class ProjectController extends Controller {

    public function index() {

        $projects = auth()->user()->accessibleProjects();
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store(UpdateProjectRequest $request) {

        $project = $request->record();

        if(request()->has('tasks')) {
            foreach(request('tasks') as $task) {
                $project->addTask($task['body']);
            }
        }

        if(request()->wantsJson()) {
            return ['path' => $project->path()];
        }

        return redirect($project->path());
    }

    public function show(Project $project) {

        $this->authorize("update", $project);
        return view('projects.show', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project) {
        $request->persist();
        return redirect($project->path());
    }

    public function destroy(Project $project) {
        $this->authorize("manage", $project);
        $project->delete();

        return redirect('projects');
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }



}
