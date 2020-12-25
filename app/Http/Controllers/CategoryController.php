<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('category.list', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $category = new Category();
        $category->create(['name' => $input['name']]);
        return redirect(route('categories.list'));
    }

    public function delete()
    {
        Category::where('id', $_GET['id'])->delete();
        return redirect(route('categories.list'));
    }
}
