<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(20);
        return view('comment.list', compact('comments'));
    }

    public function publish()
    {
        $comment = Comment::find($_GET['id']);
        $comment->publish = 1;
        $comment->save();
        return redirect(route('comments.list'));
    }

    public function delete()
    {
        Comment::where('id', $_GET['id'])->delete();
        return redirect(route('comments.list'));
    }
}
