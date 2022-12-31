<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->product = Product::factory()->create();
    }

    public function test_update_product()
    {
        Sanctum::actingAs($this->user);

        $response = $this->putJson(route('v1.products.update', $this->product), [
            'code' => $this->product->code,
            'name' => 'Milk Tea',
            'quantifier' => 'box',
            'quantity' => 10
        ]);

        $response->assertOk();
    }

    public function test_product_code_is_unique()
    {
        $anotherProduct = Product::factory()->create();

        Sanctum::actingAs($this->user);

        $response = $this->putJson(route('v1.products.update', $this->product), [
            'code' => $anotherProduct->code,
            'name' => 'Milk Tea',
            'quantifier' => 'box',
            'quantity' => 10
        ]);

        $response->assertUnprocessable();
    }


}
