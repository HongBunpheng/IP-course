<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import Product Model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all products
     */
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json([
                "status" => 200,
                "message" => "No products found",
                "data" => []
            ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "Products retrieved successfully",
            "data" => $products
        ]);
    }

    /**
     * Store Product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            "status" => 200,
            "message" => "Product created successfully",
            "data" => $product
        ]);
    }

    /**
     * Show Product by ID
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => 404,
                "message" => "Product not found",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "Product retrieved successfully",
            "data" => $product
        ]);
    }

    /**
     * Update Product
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => 404,
                "message" => "Product not found",
                "data" => null
            ]);
        }

        $product->update($request->all());

        return response()->json([
            "status" => 200,
            "message" => "Product updated successfully",
            "data" => $product
        ]);
    }

    /**
     * Delete Product
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "status" => 404,
                "message" => "Product not found",
                "data" => null
            ]);
        }

        $product->delete();

        return response()->json([
            "status" => 200,
            "message" => "Product deleted successfully",
            "data" => null
        ]);
    }
}
