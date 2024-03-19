<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <div>
            <p>
                {!! $post->body // not escaped !!}
            </p>
        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>
