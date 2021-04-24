<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCommentTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_valid_password_to_create_comment()
    {
        $user = User::factory()->create();
        $response = $this->post('/user/comments', [
            'id' => $user->id,
            'password' => config('enums.auth_pass'),
            'comments' => $this->faker->sentence()
        ]);

        $response->assertStatus(200);
    }

    public function test_check_invalid_password_to_create_comment()
    {
        $user = User::factory()->create();
        $response = $this->post('/user/comments', [
            'id' => $user->id,
            'password' => 'invalid_password',
            'comments' => $this->faker->sentence()
        ]);

        $response->assertForbidden();
    }

    public function test_invalid_userid_validation()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/user/comments', [
            'id' => $user->id + 1,
            'password' => config('enums.auth_pass'),
            'comments' => $this->faker->sentence()
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['id']);
    }
}
