<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    // Uncomment this if you want to refresh and seed test DB
    // use RefreshDatabase;

    /** @test */
    public function test_if_we_can_access_get_all_products_api()
    {
        $response = $this->get('/api/products');

        $response->assertJsonStructure([
            '*' => ['id', 'name', 'category_id', 'pricing', 'description', 'images']
        ]);
        
    }
}
