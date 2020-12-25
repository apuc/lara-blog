<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Models\{Category, Post, CategoryPost, PostTags, Tag};

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('posts.list', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        $input = $request->all();

        $input['views'] = 0;
        $input['likes'] = 0;
        $input['publish'] = 0;

        $post = new Post;

        /* Загрузка изображения */

        if ($request->hasFile('preview')) {
            $filenameWithExt = $request->file('preview')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('preview')->getClientOriginalExtension();
            $fileNameToStore = $filename."_".time().".".$ext;
            $path = $request->file('preview')->storeAs('public/images/previews', $fileNameToStore);
            $input['preview'] = $fileNameToStore;
        }
        
        $post = $post->create($input);
        $categories = Category::find($input['categories']);
        $post->categories()->attach($categories);

        /* Сохранение тегов */
        if (!empty($input['tags'])) {
            $tagModel = new Tag();
            $tags = explode(' ', $input['tags']);
            foreach ($tags as $tag) {
                $tagEx = Tag::where('name', $tag)->first();
                if (!$tagEx) {
                    $tagId = $tagModel->create(['name' => $tag])->id;
                } else {
                    $tagId = $tagEx->id;
                }
                (new PostTags())->create(['tag_id' => $tagId, 'post_id' => $postId]);
            }
        }
        return redirect(route('posts.list'));
    }

    public function publish()
    {
        $post = Post::find($_GET['id']);
        $post->publish = (int)!$post->publish;
        $post->save();
        return redirect(route('posts.list'));
    }

    public function update()
    {
        $post = Post::find($_GET['id']);
        $categories = Category::all();
        foreach ($post->categories as $category) {
            $selectedCategories[] = $category->category_id;
        }
        return view('posts.update',
            compact('post', 'categories', 'selectedCategories')
        );
    }

    public function show()
    {
        $post = Post::find($_GET['id']);
        return view('posts.show', compact('post'));
    }

    public function delete()
    {
        Post::find($_GET['id'])->delete();
        PostCategory::where('post_id', $_GET['id'])->delete();
        PostTags::where('post_id', $_GET['id'])->delete();
        return redirect(route('posts.list'));
    }
}
