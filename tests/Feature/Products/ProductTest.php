<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');      

    }

    public function test_products_can_be_indexed()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    public function test_product_can_be_shown()
    {
        $Product = Product::factory()->create();
        $response = $this->get('/api/products/' . $Product->getKey());
        $response->assertStatus(200);
    }

    public function test_product_can_be_stored()
    {
        $attributes = [
            'sku' => 44444444,
            'name' => 'Test product',
            'price' => 444444.444,
        ];

        $response = $this->post('/api/products', $attributes);
        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $attributes);
    }

    public function test_product_can_be_updated()
    {
        $Product = Product::factory()->create();
        $attributes = [
            'sku' => 33333333,
            'name' => 'Test test product',
            'price' => 333333.333,
        ];

        $response = $this->patch('/api/products/' . $Product->getKey(), $attributes);
        $response->assertStatus(202);
        $this->assertDatabaseHas('products', array_merge(['id' => $Product->getKey()], $attributes));
        

    }

    public function test_product_can_be_destroyed()
    {
        $Product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $Product->getKey());
        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $Product->getKey()]);
        
    }

}
