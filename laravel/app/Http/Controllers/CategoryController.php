<?php 

namespace App\Http\Controllers; 

use App\Models\Category; // Import Category model
use Illuminate\Http\Request; 

class CategoryController extends Controller 
{ 
    // --- Get /api/categories
    public function getCategories() { 
        $categories = Category::all(); // ✅ Get all categories
        if ($categories->isEmpty()) {
            return response()->json(["message" => "No categories found"]);
        }
        return response()->json(["data" => $categories]);
         
    } 

    // -- Post /api/categories  
    public function createCategory(Request $request) { // Add Request parameter
        $category = new Category(); // ✅ Create new category
        $category->name = $request->name; 
        $category->save(); // Save to DB

        return response()->json(["message" => "Category created successfully", "data" => $category]); 
    } 

    // --- Get/api/categories/{categoryId}  
    public function getCategory($categoryId) {  
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }

        return response()->json($category);
    } 

    //-- Patch/api/categories/{categoryId}  
    public function updateCategory(Request $request, $categoryId) {  
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }

        $category->name = $request->name; // Update name
        $category->save();

        return response()->json(["message" => "Category updated successfully", "data" => $category]);  
    } 

    // --- Delete /api/categories/{categoryId} 
    public function deleteCategory($categoryId) {  
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }

        $category->delete();

        return response()->json(["message" => "Category deleted successfully"]);  
    }  
}
