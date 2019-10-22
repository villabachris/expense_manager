<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function showCategory()
    {
        return view('category');
    }

    public function addCategoryApi(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->description = $request->description;
        $category->save();

        return response()->json(['message' => 'Adding Category Successfully!']);

    }

    public function allCategoryApi()
    {
        $categories = Category::all();

        return response()->json($categories);

    }
    public function updateCategory(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $category->category = $request->get('category');
        $category->description = $request->get('desc');
        $category->save();

        return response()->json(['message' => 'Updating Category Successfully!']);

    }

}
