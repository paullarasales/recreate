@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center text-md font-medium leading-5 text-black focus:outline-none  active'
    : 'inline-flex items-center text-md font-medium leading-5 text-black focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} style="width: 120px;"> {{-- Set the width based on your design --}}
    {{ $slot }}
</a>
