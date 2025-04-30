<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;

class WishlistTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_add_a_product_to_wishlist()
    {
        $customer = Customer::create([
            'name' => 'Wishlist User',
            'email' => 'wishlist@example.com',
            'phone' => '066666666',
        ]);

        $category = Category::create([
            'name' => 'Wishlist Category',
        ]);

        $product = Product::create([
            'name'        => 'Wishlist Product',
            'pricing'     => 20.00,
            'category_id' => $category->id,  // ✅ use real category ID
            'description' => 'A product to add to wishlist',
            'images'      => json_encode(['wishlist.jpg']),
        ]);

        $wishlist = Wishlist::create([
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
        ]);

        $this->assertDatabaseHas('wishlist', [
            'customer_id' => $customer->id,
            'product_id'  => $product->id,
        ]);
    }
}
