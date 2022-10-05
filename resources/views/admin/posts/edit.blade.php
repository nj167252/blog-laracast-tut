<x-layout>

    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Edit Post: <span class="text-blue-500">{{ $post->title }}</span>
        </h1>
    </header>
    
    <section class="px-6 py-8">
        <x-panel class="max-w-4xl mx-auto">
            <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                
                @csrf

                @method('PATCH')

                <x-form.input name="title" :value="old('title', $post->title)" required />
                <x-form.input name="slug" :value="old('slug', $post->slug)" required />
                
                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" :type="'file'" :value="old('thumbnail', $post->thumbnail)" />
                    </div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="80">
                </div>

                <x-form.textarea 
                    name="excerpt" 
                    :rows="3"
                    :placeholder="'Quick, think of something!'"
                    >{{ old('excerpt', $post->excerpt) }}
                </x-form.textarea>
                <x-form.textarea 
                    name="body" 
                    :rows="3"
                    :placeholder="'Quick, think of something!'"
                    >{{ old('body', $post->body) }}
                </x-form.textarea>

                <div class="mb-6">

                    <x-form.label name="category" />

                    <select 
                        name="category_id" 
                        id="category_id">
                        <option>Select</option>
                        @foreach ( \App\Models\Category::all() as $category )    
                            <option 
                                value="{{ $category->id }}" 
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />

                </div>

                <button 
                    type="submit"
                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                    Update
                </button>
            </form>
        </x-panel>
    </section>

</x-layout>