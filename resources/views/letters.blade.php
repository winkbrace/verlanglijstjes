<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verlanglijstjes') }}
        </h2>
    </x-slot>

    <x-letters-list :users="$users"/>

</x-app-layout>
