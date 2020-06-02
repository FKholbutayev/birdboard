<?php

namespace App;

trait RecordsActivity {

    public $oldAttributes = [];

    public function activity() {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    // boot_name_of_trait

    public static function bootRecordsActivity() {
        static::updating(function($model) {
            $model->oldAttributes = $model->getOriginal();
        });

       /* $recordableEvents = ['created','updated', 'deleted'];

        foreach($recordableEvents as $event) {
            static::$event(function($model) use ($event) {
                if(class_basename($model)!== 'Project') {
                    $event = strtolower(class_basename($model))."_$event";
                }
                $model->recordActivity($event);
            });
        }*/
    }

    public function recordActivity($type) {
        $this->activity()->create([
                'user_id' => $this->activityOwner()->id,
                'description' => $type,
                'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project->id,
                'changes' => $this->activityChanges()
        ]);
    }

    public function activityOwner() {
       $project = $this->project ?? $this;
       return $project->owner;
    }

    public function activityChanges() {
        if($this->wasChanged()) {
        return [
                'before' => array_diff($this->oldAttributes, $this->getAttributes()),
                'after' => $this->getChanges()
            ];
        }
    }


}
