<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase; // Clears database before each test

    public function test_order_creation()
    {
        // Create a test customer
        $customer = Customer::factory()->create();

        // Send request to create an order
        $response = $this->postJson('/api/orders', [
            'customer_id' => $customer->id,
            'total_amount' => 50,
            'status' => 'pending'
        ]);

        // Check if order was created successfully
        $response->assertStatus(201);
        $this->assertDatabaseHas('orders', [
            'customer_id' => $customer->id,
            'total_amount' => 50,
            'status' => 'pending'
        ]);
    }
}
