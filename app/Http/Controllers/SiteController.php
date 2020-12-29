<?php


namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Models\{Category, Comment, Like, Post};
use GuzzleHttp\Psr7\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('site.index', compact(['categories', 'posts']));
    }

    public function search()
    {
        $categories = Category::all();
        $searchText = $_POST['search'];
        $posts = Post::where('content', 'LIKE', "%$searchText%")
            ->orWhere('title', 'LIKE', "%$searchText%")->paginate(10);
        return view('site.search', compact([
            'categories', 'searchText', 'posts',
        ]));
    }

    public function category($id)
    {
        $categories = Category::all();
        $currentCategory = Category::find($id);
        $posts = $currentCategory->posts()->paginate(10);
        return view('site.category', compact(['categories', 'currentCategory', 'posts']));
    }

    public function post($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $post->increment('views');
        /* Выбор постов из той же категории */
        $postCategory = $post->categories->pluck('id')->toArray();

        $a = Category::find($postCategory);
        $relatedPosts = [];
        foreach ($a as $cat) {
            $a = $cat->posts->pluck('id')->toArray();
        }
        $relatedPosts = Post::find($a)->take(3);
        /* -------------------------------*/
        $comments = $post->comments()->where('publish', 1)->paginate(20);
        return view('site.post', compact([
            'categories', 'post', 'relatedPosts', 'comments',
        ]));
    }

    public function commentStore($id, CreateRequest $request)
    {
        $input = $request->all();
        $input['post_id'] = $id;
        $input['publish'] = 0;
        (new Comment())->create($input);
        return redirect(route('site.post', $id));
    }

    public function postLike($id)
    {
        $ip = request()->ip();
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $like = Like::where('post_id', $id)
            ->where('ip', $ip)
            ->where('user_agent', $userAgent)
            ->first();
        $post = Post::find($id);
        if (!$like) {
            $post->increment('likes');
            (new Like())->create([
                'post_id' => $id,
                'ip' => $ip,
                'user_agent' => $userAgent,
            ]);
        } else {
            Like::find($like->id)->delete();
            $post->decrement('likes');
        }
        return redirect(route('site.post', $id));
    }
}
