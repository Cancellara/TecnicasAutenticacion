<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test  */
    public function it_test_that_an_user_can_not_be_an_admin()
    {
        $user = factory(User::class)->create();

        $this->assertFalse($user->isAdmin());

        //$user->admin=true;

        //$this->assertTrue($user->isAdmin());
    }
}
