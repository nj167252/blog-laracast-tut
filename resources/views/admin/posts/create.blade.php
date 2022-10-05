<x-layout>

    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Create <span class="text-blue-500">Something</span> New
        </h1>
    </header>
    
    <section class="px-6 py-8">
        <x-panel class="max-w-4xl mx-auto">
            <form action="/admin/posts/store" method="post" enctype="multipart/form-data">
                
                @csrf

                <x-form.input name="title" required />
                <x-form.input name="slug" required />
                <x-form.input name="thumbnail" type="file" required/>
                <x-form.input name="slug" required />
                <x-form.textarea name="except" rows="3" required />
                <x-form.textarea name="body" rows="5" required />

                <div class="mb-6">

                    <x-form.label name="category" />

                    <select 
                        name="category_id" 
                        id="category_id">
                        <option>Select</option>
                        @foreach ( \App\Models\Category::all() as $category )    
                            <option 
                                value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                    Publish
                </button>
            </form>
        </x-panel>
    </section>

</x-layout>