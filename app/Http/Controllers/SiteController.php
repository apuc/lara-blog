<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('site.index', compact(['categories', 'posts']));
    }

    public function category($id)
    {
        $categories = Category::all();
        $currentCategory = Category::find($id);
        $currentCategory->posts;
        return view('site.category', compact(['categories', 'currentCategory']));
        /*
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('site.index', compact(['categories', 'posts']));
        */
    }

}
