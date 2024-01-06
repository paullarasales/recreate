@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center text-md font-medium leading-5 text-white focus:outline-none w-full h-10 rounded-md active'
    : 'inline-flex items-center text-md font-medium leading-5 text-black focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
