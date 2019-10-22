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

}
