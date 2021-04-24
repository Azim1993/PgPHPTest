<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCommentUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_return_false_if_comment_is_null()
    {
        $user = User::factory()->make();
        $commentStore = resolve(UserController::class)
            ->storeCommentBy($user, '');
        $this->assertFalse($commentStore);
    }


    public function test_return_true_if_comment_is_string()
    {
        $user = User::factory()->make();
        $commentStore = resolve(UserController::class)
            ->storeCommentBy($user, $this->faker->sentence());
        $this->assertTrue($commentStore);
    }
}
