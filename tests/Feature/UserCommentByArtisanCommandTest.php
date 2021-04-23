<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserCommentByArtisanCommandTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_throws_not_found_exception_for_invalid_user_id()
    {
        $response = $this->artisan('user:comments', [
            'USER_ID' => 5,
            'COMMENT' => $this->faker->sentence(2)
        ]);

        $this->expectException(ModelNotFoundException::class, $response);
    }

    public function test_succesfully_store_comment_by_commands()
    {
        $user = User::factory()->create();
        $this->artisan('user:comments', [
            'USER_ID' => $user->id,
            'COMMENT' => $this->faker->sentence(2)
        ])
        ->assertExitCode(1);
    }

    public function test_fail_comment_by_commands()
    {
        $user = User::factory()->create();
        $this->artisan('user:comments', [
            'USER_ID' => $user->id,
            'COMMENT' => ''
        ])
        ->assertExitCode(0);
    }
}
