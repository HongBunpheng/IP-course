<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use Carbon\Carbon;

class OrderProductTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_an_order_product()
    {
        $customer = Customer::create([
            'name' => 'OrderProduct User',
            'email' => 'orderproduct@example.com',
            'phone' => '077777777',
        ]);

        $category = Category::create([
            'name' => 'Test Category',
        ]);

        $product = Product::create([
            'name'        => 'Order Product Item',
            'pricing'     => 15.00,
            'category_id' => $category->id,
            'description' => 'A product for order product test',
            'images'      => json_encode(['image.jpg']),
        ]);

        $order = Order::create([
            'customer_id'  => $customer->id,
            'total_amount' => 30.00,
            'status'       => 'completed',
            'order_date'   => Carbon::now(),
        ]);

        $orderProduct = OrderProduct::create([
            'order_id'   => $order->id,
            'product_id' => $product->id,
            'quantity'   => 2,
            'price'      => 15.00,
        ]);

        $this->assertDatabaseHas('order_product', [
            'order_id'   => $order->id,
            'product_id' => $product->id,
            'quantity'   => 2,
            'price'      => 15.00,
        ]);
    }
}
