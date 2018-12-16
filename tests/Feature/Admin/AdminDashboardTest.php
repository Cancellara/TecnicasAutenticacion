<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test     */
    function admins_can_visit_the_admin_dashboard()
    {

        $this->actingAs($this->createAdmin())
            ->get(route('admin_dashboard'))
            ->assertStatus(200)
            ->assertSee('Admin Dashboard');

    }

    /** @test     */
    function non_admin_users_cannot_visit_the_admin_dashboard() {
        //$this->markTestIncomplete();
        $this->actingAs($this->createUser())
            ->get(route('admin_dashboard'))
            ->assertStatus(403)
            ->assertSee('Prohibido');

    }

    /** @test     */
    function guests_cannot_visit_the_admin_dashboard() {
        //$this->markTestIncomplete();
        $this->get(route('admin_dashboard'))
            ->assertStatus(302);

    }

    /** @test     */
    function admins_can_visit_the_admin_event()
    {
        $this->actingAs($this->createAdmin())
            ->get(route('admin_event'))
            ->assertStatus(200)
            ->assertSee('Admin Event');

    }

    /** @test     */
    function non_admin_users_cannot_visit_the_admin_event() {
        //$this->markTestIncomplete();
        $this->actingAs($this->createUser())
            ->get(route('admin_event'))
            ->assertStatus(403)
            ->assertSee('Prohibido');

    }

    /** @test     */
    function guests_cannot_visit_the_admin_event() {
        //$this->markTestIncomplete();
        $this->get(route('admin_event'))
            ->assertStatus(302);

    }

}
