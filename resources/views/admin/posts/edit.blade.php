@props(['post'])

<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value=" $post->title"/>
            <x-form.input name="slug" :value=" $post->slug"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>
                </div>

                <img
                    src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '/images/illustration-2.png' }}"
                    alt=""
                    class="rounded-xl ml-6"
                    width="100"
                >
            </div>

            <x-form.textarea name="excerpt">{{ $post->excerpt }}</x-form.textarea>
            <x-form.textarea name="body">{{ $post->body }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" class="px-4 py-2 w-full rounded-xl">
                    @foreach(App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>
                Update
            </x-form.button>
        </form>
    </x-setting>
</x-layout>
