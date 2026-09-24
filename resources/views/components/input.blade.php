@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-xs border-amber-300 focus:border-red-300 focus:ring-3 focus:ring-red-200/50']) !!}>
