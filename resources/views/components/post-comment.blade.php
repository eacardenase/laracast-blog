@props(['comment'])

<article class="flex bg-gray-100 p-6 space-x-4 rounded-xl border border-gray-200">
    <div class="flex-shrink-0">
        <img class="rounded-full" src="https://i.pravatar.cc/60?img={{ rand(1, 70) }}" alt="avatar" height="60"
             width="60">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">
                <time>
                    {{ $comment->created_at->diffForHumans() }}
                </time>
            </p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
