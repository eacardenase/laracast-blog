<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'body' => ['required'],
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->input('body'),
        ]);

        return back();
    }
}
