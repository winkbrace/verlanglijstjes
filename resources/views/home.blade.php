<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verlanglijstjes') }}
        </h2>
    </x-slot>

    <div class="chart" id="custom-colored"> Loading... </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new window.Treant(chart_config);
        });
    </script>

</x-app-layout>
