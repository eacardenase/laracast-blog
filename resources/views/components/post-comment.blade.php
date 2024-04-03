@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
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
</x-panel>

