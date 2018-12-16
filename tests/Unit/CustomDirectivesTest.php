<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Blade;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomDirectivesTest extends TestCase
{
    /** @test  */
    public function it_test_that_admin_directive_works()
    {
        //Retornará null porque no estamos conectados como admin

        $this->assertNull(Blade::check('admin'));

    }
}
