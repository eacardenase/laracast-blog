<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {

        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = [
            ...$this->validatePost(),
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
        ];

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }

    protected function validatePost(?Post $post = new Post()): array
    {
        return request()->validate([
            'title' => ['required'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
