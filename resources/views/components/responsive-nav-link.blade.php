@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-red-400 text-xl font-medium text-warmgray-900 bg-yellow-400 focus:outline-none focus:bg-yellow-500 focus:border-red-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-xl font-medium text-warmgray-700 hover:bg-yellow-400 hover:text-warmgray-900 hover:border-red-400 focus:outline-none focus:text-warmgray-900 focus:bg-yellow-400 focus:border-red-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
