<x-auth-card title="{{ $title }}">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('add-wish') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-label for="gift" :value="__('Cadeau')" />
            <x-input id="gift" class="block mt-1 w-full" type="text" name="gift" :value="old('gift')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="link" :value="__('Link')" />
            <x-input id="link" class="block mt-1 w-full" type="text" name="link" :value="old('link')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="" color="warmgray">{{ __('Terug') }}</x-button>
            <x-button class="ml-3">{{ $title }}</x-button>
        </div>
    </form>
</x-auth-card>
