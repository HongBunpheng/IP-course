<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_an_order()
    {
        // ✅ Create a test customer first
        $customer = Customer::create([
            'name' => 'Test Customer',
            'email' => 'test@example.com',
            'phone' => '012345678',
        ]);

        $order = Order::create([
            'customer_id'   => $customer->id, // ✅ Use real ID
            'total_amount'  => 250.00,
            'status'        => 'pending',
            'order_date'    => Carbon::now(),
        ]);

        $this->assertDatabaseHas('order', [
            'customer_id'  => $customer->id,
            'total_amount' => 250.00,
            'status'       => 'pending',
        ]);
    }
}
