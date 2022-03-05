<x-auth-card title="{{ $title }}">
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('add-wish') }}">
        @csrf

        <div>
            <x-label for="gift" :value="__('Cadeau')" />
            <x-input id="gift" class="block mt-1 w-full" type="text" name="gift" :value="old('gift')" required autofocus />
        </div>

        <div class="mt-4">
            <x-label for="link" :value="__('Link')" />
            <x-input id="link" class="block mt-1 w-full" type="text" name="link" :value="old('link')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-anchor href="{{ url()->previous('/') }}" color="warmgray">{{ __('Terug') }}</x-anchor>
            <x-button class="ml-3">{{ $title }}</x-button>
        </div>
    </form>
</x-auth-card>
