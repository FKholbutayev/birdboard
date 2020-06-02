<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ProjectTasksController extends Controller {

    public function store(Project $project) {

        /*if(auth()->user()->isNot($project->owner)) {
            abort(403);
        }*/

        $this->authorize("update", $project);

        $attributes = request()->validate(['body' => 'required']);
        $project->addTask($attributes["body"]);

        return redirect($project->path());

    }

    public function update(Project $project, Task $task) {

        /*if(auth()->user()->isNot($task->project->owner)) {
            abort(403);
        }*/

        $this->authorize("update", $project);
        $task->update(['body' => request('body')]);

        if(request('completed')) {
            $task->complete();
        } else {
            $task->incomplete();
        }

        return redirect($project->path());
    }
}
