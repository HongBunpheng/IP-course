<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display all products with categories.
     */
    public function getProducts()
    {
        $products = Product::with('category')->get();

        if ($products->isEmpty()) {
            return response()->json(["message" => "No products found"]);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $products
        ]);
    }

    /**
     * Create a new product with optional image uploads.
     */
    public function createProduct(Request $request)
    {
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = $path;
            }
        }

        $product = Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'pricing'     => $request->pricing,
            'description' => $request->description,
            'images'      => $imagePaths
        ]);

        if (!$product) {
            return response()->json(['message' => 'Error creating product'], 400);
        }

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    /**
     * Get a specific product by ID with category.
     */
    public function getProduct($productId)
    {
        $product = Product::with('category')->find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $product
        ]);
    }

    /**
     * Update a product by ID.
     */
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->only([
            'name',
            'category_id',
            'pricing',
            'description',
            'images' // only if sending as array
        ]));

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product->fresh()
        ]);
    }

    /**
     * Delete a product by ID and remove its images.
     */
    public function deleteProduct($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($product->images) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
