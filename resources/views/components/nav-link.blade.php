@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-400 text-xl font-semibold leading-5 text-stone-900 hover:bg-yellow-400 focus:outline-hidden focus:border-red-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-semibold leading-5 text-stone-700 hover:bg-yellow-400 hover:text-stone-900 hover:border-red-400 focus:outline-hidden focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
