@props(['name', 'row' => '3', 'placeholder' => 'Quick, think of something!'])

<div class="mb-6">

    <x-form.label name="{{ $name }}" />

    <textarea 
        class="w-full px-3 py-2 rounded-xl placeholder-gray-200 font-semibold text-sm border border-gray-200 focus:outline-none focus:ring"
        name="{{ $name }}" 
        id="{{ $name }}" 
        {{ $attributes }}
        required
        >{{ $slot ?? old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}" />

</div>