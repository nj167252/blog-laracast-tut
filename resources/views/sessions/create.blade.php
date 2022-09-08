<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">

            <h1 class="text-2xl">
                Login<span class="text-blue-500">!</span>
            </h1>

            <form action="/sessions" method="post" class="mt-10 border border-black border-opacity-5 p-6 rounded-lg">
                @csrf

                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email">
                        Email
                    </label>
                    <input 
                        class="bg-gray-100 rounded-xl px-3 py-2 placeholder-black font-semibold text-sm w-full border border-gray-200"
                        type="email" 
                        name="email" 
                        id="" 
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password">
                        Password
                    </label>
                    <input 
                        class="bg-gray-100 rounded-xl px-3 py-2 placeholder-black font-semibold text-sm w-full border border-gray-200"
                        type="password" 
                        name="password" 
                        id="" 
                        required>
                    @error('password')
                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-6 pt-3">
                    <button
                        class="bg-blue-400 text-white rounded-xl py-2 px-4 border border-blue-500 w-full hover:bg-blue-500 w-full" 
                        type="submit">
                        Login
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    {{-- <a href="/forgotpassword" class="text-xs font-bold text-gray-600 uppercase mx-3">Forgot Password</a> --}}
                    <a href="/register" class="text-xs font-bold text-gray-600 uppercase mx-3">Register</a>
                </div>
                
            </form>
        </main>
    </section>
</x-layout>