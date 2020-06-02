<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\Activity;
use App\RecordsActivity;

class Task extends Model {
    use RecordsActivity;

    protected $guarded = [];
    protected $casts = ['completed' => 'boolean'];
    protected $touches = ['project'];


    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function path() {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }

    public function complete() {
        $this->update(['completed' => true]);
        $this->recordActivity("task_completed");
    }

    public function incomplete() {
        $this->update(['completed' => false]);
        $this->recordActivity("task_imcompleted");
    }
}
