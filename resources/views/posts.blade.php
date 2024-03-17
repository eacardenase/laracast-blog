@extends('layout')

@section('banner')
    <h1>Latest's Blogs</h1>
@endsection

@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
@endsection
