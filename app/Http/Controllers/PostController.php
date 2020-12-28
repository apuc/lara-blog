<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\{CreateRequest, UpdateRequest};
use App\Models\{Category, Post, Tag};

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
            $tags = explode(' ', $input['tags']);
            foreach ($tags as $tag) {
                $tagEx = Tag::where('name', $tag)->first();
                if (!$tagEx) {
                    $tagModel = new Tag();
                    $tagId = $tagModel->create(['name' => $tag])->id;
                } else {
                    $tagId = $tagEx->id;
                }
                $tagsOut[] = $tagId;
            }
            $post->tags()->attach(Tag::find($tagsOut));
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
        return view('posts.update', compact('post', 'categories'));
    }

    public function edit($id, UpdateRequest $request)
    {
        $input = $request->all();
        $post = Post::find($id);
        if ($request->hasFile('new_preview')) {
            $filenameWithExt = $request->file('new_preview')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('new_preview')->getClientOriginalExtension();
            $fileNameToStore = $filename."_".time().".".$ext;
            $path = $request->file('new_preview')->storeAs('public/images/previews', $fileNameToStore);
            $input['preview'] = $fileNameToStore;
        }
        $post->update($input);
        $post->categories()->detach($post->categories);
        if (!empty($input['categories'])) {
            $post->categories()->attach(Category::find($input['categories']));
        }
        /* Сохранение тегов */
        if (!empty($input['tags'])) {
            $post->tags()->detach($post->tags);
            $tags = explode(' ', $input['tags']);
            foreach ($tags as $tag) {
                $tagEx = Tag::where('name', $tag)->first();
                if (!$tagEx) {
                    $tagModel = new Tag();
                    $tagId = $tagModel->create(['name' => $tag])->id;
                } else {
                    $tagId = $tagEx->id;
                }
                $tagsOut[] = $tagId;
            }
            $post->tags()->attach(Tag::find($tagsOut));
        }
        return redirect(route('posts.list'));

    }

    public function show()
    {
        $post = Post::find($_GET['id']);
        return view('posts.show', compact('post'));
    }

    public function delete()
    {
        Post::find($_GET['id'])->delete();
        return redirect(route('posts.list'));
    }
}
