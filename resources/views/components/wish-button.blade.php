<button
    id="{{ $type }}{{ $id }}"
    onclick="clickWishButton('{{ $type }}', {{ $id }})"
    @disabled($claimedByAnother())
    class="wish-button bg-{{ $color }}-400 hover:bg-{{ $color }}-700 shadow-md text-white font-bold pt-1 px-2 mr-2 rounded-full inline-flex items-center max-h-6">
    @if ($type === 'claim')
        <x-checkbox :wishId="$id" :claimedBy="$claimedBy"/>
    @else
        <img src="/img/{{ $type }}-icon.svg" alt="{{ $type }}" class="pb-1 mr-0 md:mr-1">
    @endif
    <span class="hidden md:inline-block">{{ $label }}</span>
</button>
