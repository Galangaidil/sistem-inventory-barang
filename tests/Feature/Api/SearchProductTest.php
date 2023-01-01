<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SearchProductTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        Product::factory()->create(['code' => 'tvw-0001']);
        Product::factory()->create(['code' => 'tvw-0002']);
    }

    public function test_search_products_by_code_product()
    {
        Sanctum::actingAs($this->user);

        $response = $this->get(route('v1.products.search', '000'));

        $response->assertOk();
    }
}
