<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class StoreProductTest extends TestCase
{
    private User $user;

    protected function setUp():void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    use RefreshDatabase;


    public function test_store_product()
    {
        Sanctum::actingAs($this->user);

        $response = $this->postJson(route('v1.products.index'), [
            'code' => 'tvw-001',
            'name' => 'Milk',
            'quantifier' => 'box',
            'quantity' => 5
        ]);

        $response->assertCreated();
    }

    public function test_quantity_should_be_numeric()
    {
        Sanctum::actingAs($this->user);

        $response = $this->postJson(route('v1.products.index'), [
            'code' => 'tvw-001',
            'name' => 'Milk',
            'quantifier' => 'box',
            'quantity' => "five"
        ]);

        $response->assertUnprocessable();
    }


}
