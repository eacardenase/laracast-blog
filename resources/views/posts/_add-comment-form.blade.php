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

            <x-form.field>
                <textarea
                    name="body"
                    class="w-full py-2 px-4 rounded-xl border border-gray-200"
                    rows="5"
                    placeholder="Quick, think on something to say!"
                    required
                ></textarea>

                <x-form.error name="body"/>
            </x-form.field>

            <div class="flex justify-end">
                <x-form.button>
                    Post
                </x-form.button>
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
