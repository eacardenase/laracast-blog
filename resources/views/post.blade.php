@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <div>
            {!! $post->body // not escaped !!}
        </div>
    </article>
    <a href="/">Go Back</a>
@endsection
