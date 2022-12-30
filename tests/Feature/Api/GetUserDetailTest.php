<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GetUserDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_user_details()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->getJson(route('v1.user.profile'));

        $response->assertOk();
    }

}
