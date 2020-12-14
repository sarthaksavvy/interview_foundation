<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TokenTest extends TestCase
{
    use RefreshDatabase;

    /**
    * store new token
    *
    * @test
    */
    public function api_can_store_new_tokenas_encrypted_into_database_of_auth_user()
    {
        $token = 'testToken';
        $user  = factory(User::class)->create();
        $this->actingAs($user);
        $this->postJson(route('user.token'), ['token'=>$token])->assertStatus(201);
        $this->assertEquals($user->fresh()->token, $token);
    }

    /**
    * fetch token from database
    *
    * @test
    */
    public function api_can_delete_the_token()
    {
        $user  = factory(User::class)->state('token')->create();
        $this->actingAs($user);
        $this->deleteJson(route('user.token'));
        $this->assertDatabaseMissing('users', ['token']);
    }
}
