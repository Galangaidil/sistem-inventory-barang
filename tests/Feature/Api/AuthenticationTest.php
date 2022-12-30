<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }


    public function test_users_can_authenticated_using_api()
    {

        $response = $this->postJson(route("v1.auth.login"), [
            "email" => $this->user->email,
            "password" => "password",
        ]);

        $response->assertJson([
            "message" => "Login berhasil"
        ]);
    }


    public function test_users_can_not_authenticated_using_api_with_invalid_password()
    {
        $response = $this->postJson(route("v1.auth.login"), [
            "email" => $this->user->email,
            "password" => "Invalid password"
        ]);

        $response->assertStatus(422);
    }

    public function test_users_can_logout()
    {
        Sanctum::actingAs($this->user);

        $response = $this->postJson(route('v1.auth.logout'));

        $response->assertJson([
            "message" => "Logout berhasil"
        ]);
    }


}
