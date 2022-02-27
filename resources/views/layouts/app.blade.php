<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Verlanglijstje{{ isset($name) ? ' van ' . $name : 's' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @if(request()->routeIs('home'))
        <link rel="stylesheet" href="{{ asset('css/treant.css') }}">
        <script src="/js/treant.js"></script>
        <script src="/js/family-tree.js"></script>
        @endif

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col h-screen bg-gray-100">
            @include('layouts.navigation')

{{--            @isset($header)--}}
{{--            <!-- Page Heading -->--}}
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}
{{--            @endisset--}}

            <!-- Page Content -->
            <main class="">
                <section class="antialiased bg-gray-100 text-gray-600 p-4">
                    <div class="flex flex-col justify-around h-full">
                        {{ $slot }}
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
