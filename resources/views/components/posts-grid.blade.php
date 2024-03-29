@props(['posts'])

<x-post-featured-card :post="$posts->first()"/>

@if ($posts->count() > 1)
    <div class="lg:grid lg:gap-2 lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            <x-post-card
                :post="$post"
                class="col-span-{{ $loop->iteration < 3 ? '3' : '2'}}"
            />
        @endforeach
    </div>
@endif
