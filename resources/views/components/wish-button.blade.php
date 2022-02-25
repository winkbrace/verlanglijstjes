@php
$color = $type === 'edit' ? 'yellow' : 'red';
@endphp
<button class="wish-button bg-{{ $color }}-400 hover:bg-{{ $color }}-700 shadow-md text-white font-bold pt-1 px-2 mr-2 rounded-full inline-flex items-center">
    <img src="/img/{{ $type }}-icon.svg" alt="{{ $type }}" class="pb-1 mr-0 md:mr-1">
    <span class="hidden md:inline-block">{{ ucfirst($type) }}</span>
</button>
