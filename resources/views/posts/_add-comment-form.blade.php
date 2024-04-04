@auth()
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comment" method="POST">
            @csrf

            <header class="flex items-center">
                <img
                    class="rounded-full mr-4" src="https://i.pravatar.cc/60?img={{ auth()->id() }}"
                    alt="avatar"
                    height="40"
                    width="40"
                >
                <h2>Want to participate?</h2>
            </header>

            <div class="mt-8">
                <textarea
                    name="body"
                    class="w-full py-2 px-4 rounded-xl border border-gray-200"
                    rows="5"
                    placeholder="Quick, think on something to say!"
                    required
                ></textarea>

                @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-4">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="hover:underline hover:text-blue-500 font-bold">Register</a> or
        <a href="/login" class="hover:underline hover:text-blue-500 font-bold"> log in</a>
        to leave a comment
    </p>
@endauth
