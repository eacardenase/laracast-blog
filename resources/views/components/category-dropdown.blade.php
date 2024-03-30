<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm text-left font-semibold w-full lg:w-32 flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory?->name) : "Categories" }}

            <x-icon name="arrow-down" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            {{--  href="/categories/{{ $category->slug }}"  --}}
            href="?category={{ $category->slug }}"
            {{--  :active="isset($currentCategory) && $currentCategory->is($category)"  --}}
            {{--  :active="request()->is('*' . $category->slug)"  --}}
            :active="request()->is('categories/' . $category->slug)"
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
