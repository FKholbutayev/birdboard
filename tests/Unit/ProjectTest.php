<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProjectTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
   public function it_has_a_path() {

        $project = factory('App\Project')->create();
        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    public function project_belongs_to_an_owner() {

        $project = factory('App\Project')->create();
        $this->assertInstaceOf('App\User', $project->owner);

    }

    public function it_can_add_a_task() {

        $project = factory('App\Project')->create();
        $task = $project->addTask('Test task');

        $this->assertCount(1, $project->tasks);
        $this->assertTrue($project->tasks->contains($task));


    }


}
