<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import Controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


// Authenticated User Route (Example with Sanctum Middleware)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Category Routes
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategory');
    Route::get('/{categoryId}', 'getCategory');
    Route::patch('/{categoryId}', 'updateCategory');
    Route::put('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
    Route::get('/count-active', 'countActiveCategories');
    Route::post('/find-or-create', 'findOrCreateCategory');
    Route::delete('/truncate', 'truncateCategories');
});

// Product Routes
Route::controller(ProductController::class)->prefix('products')->group(function(){
    Route::get('/', 'getProducts');
    Route::post("/", 'createProduct');
    Route::get("/{productId}", 'getProduct');
    Route::patch("/{productId}", 'updateProduct');
    Route::put("/{productId}", 'updateProduct');
    Route::delete("/{productId}", 'deleteProduct');
});

