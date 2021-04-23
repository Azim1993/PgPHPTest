<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_warning_mesage_if_userid_is_not_pass()
    {
        $response = $this->get('/users');

        $response->assertSessionHas('warning');
    }

    public function test_get_user_detail_as_param_pass()
    {
        $user = User::factory()->create();

        $response = $this->get("/users/{$user->id}");

        $response->assertViewHas('user', $user);
    }

    public function test_get_user_detail_as_query_pass()
    {
        $user = User::factory()->create();

        $response = $this->get("/users?id={$user->id}");

        $response->assertViewHas('user', $user);
    }

    public function test_invalid_userid()
    {
        $response = $this->get("/users/123");

        $response->assertNotFound();
    }

}
