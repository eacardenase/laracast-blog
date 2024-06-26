<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index()
    {
        //        $this->authorize('admin');
        //        auth()->user()->can('admin');
        //        auth()->user()->cannot('admin');

        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(
                    request(['search', 'category', 'author'])
                )->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
