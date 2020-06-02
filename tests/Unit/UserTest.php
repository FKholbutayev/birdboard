<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase {
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    use RefreshDatabase;

    public function a_user_has_projects() {

        $user = factory('App\User')->create();
        $this->assertInstanceOf(Collection::class, $user->projects);
     }

}
