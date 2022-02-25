<nav x-data="{ open: false }" class="bg-amber-400 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        <svg class="h-8 pb-1 mr-1 stroke-current fill-current" viewBox="0 0 412.053 412.053">
                          <path d="M396.399 67.735c-2.731-14.978-9.574-28.905-19.791-40.284l-.059-.067c-5.233-5.909-13.905-14.033-25.497-19.181l-.264-.117C339.6 2.72 327.594 0 315.105 0c-18.47 0-35.94 5.962-50.522 17.243l-.098.076c-12.536 9.789-20.809 23.777-21.833 25.559a7.914 7.914 0 0 0-.134.236c-6.577 12.058-10.053 25.726-10.053 39.527 0 2.866.15 5.767.448 8.621a8 8 0 0 0 4.248 6.26 29.662 29.662 0 0 0 4.691 1.96c6.438 19.706 20.499 35.466 38.375 44.329-7.663 3.914-14.545 9.089-20.498 15.418a8 8 0 0 0 11.655 10.961 59.159 59.159 0 0 1 9.369-8.088c4.843 13.721 17.325 23.773 31.522 23.773h1.194c14.221 0 26.691-10.773 31.248-25.35 16.893 10.59 27.701 29.458 27.701 49.641v83.099l-72.764 47.215a7.998 7.998 0 0 0-2.356 11.065 7.993 7.993 0 0 0 11.065 2.356l76.409-49.58a8.001 8.001 0 0 0 3.646-6.711v-87.444c0-28.331-15.816-53.725-40.812-66.396 23.671-11.814 40.41-35.658 42.05-63.429a29.956 29.956 0 0 0 5.791-7.157 7.98 7.98 0 0 0 .952-5.449zM313.47 169.876h-1.194c-9.574 0-17.663-9.28-17.663-20.265 0-.137-.003-.273-.01-.409a76.004 76.004 0 0 0 19.344 2.494c5.686 0 11.235-.634 16.572-1.835-.626 10.816-8.324 20.015-17.049 20.015zm.476-34.18c-24.123 0-45.512-14.37-54.882-35.91 11.108-3.142 19.605-12.566 21.397-24.173 4.773.613 9.61.922 14.463.922 16.272 0 31.948-3.411 45.987-9.943 3.618 12.425 15.11 21.531 28.688 21.531.99 0 1.974-.05 2.949-.148-5.641 27.18-29.847 47.721-58.602 47.721zm55.653-63.572c-7.649 0-13.872-6.221-13.872-13.869v-4.452a8 8 0 0 0-12.254-6.775c-14.077 8.837-30.865 13.508-48.55 13.508a96.545 96.545 0 0 1-20.419-2.167 8 8 0 0 0-9.695 7.818v4.853c0 7.647-6.222 13.869-13.87 13.869-.524 0-1.042-.029-1.554-.086a7.251 7.251 0 0 0-.357-.045 13.432 13.432 0 0 1-.533-.084 67.064 67.064 0 0 1-.032-2.052c0-11.1 2.785-22.088 8.055-31.783l.06-.106c.068-.123 7.294-12.65 17.741-20.813l.053-.041C286.126 20.806 300.211 16 315.105 16c10.075 0 19.753 2.191 28.764 6.512.156.075.387.18.689.313 8.897 3.952 15.728 10.348 19.918 15.059l.141.161a66.47 66.47 0 0 1 15.374 29.354c-2.617 2.964-6.401 4.725-10.392 4.725zM245.81 276.808c18.128-10.667 30.322-30.386 30.322-52.897 0-10.13-2.47-19.696-6.837-28.125a8.105 8.105 0 0 0-.536-1.011c-10.386-19.154-30.676-32.191-53.954-32.191-23.283 0-43.577 13.041-53.96 32.204a8.098 8.098 0 0 0-.522.985 60.947 60.947 0 0 0-6.844 28.138c0 22.507 12.188 42.222 30.311 52.89-22.433 11.597-36.643 34.617-36.643 60.093v29.178a8 8 0 0 0 3.704 6.749l59.659 37.98a7.995 7.995 0 0 0 8.569.014l59.8-37.781a7.999 7.999 0 0 0 3.727-6.801l-.141-29.377c-.122-25.536-14.317-48.48-36.655-60.048zm-31.005-98.224c13.925 0 26.401 6.31 34.723 16.222-10.78 3.089-22.602 4.7-34.721 4.7-12.123 0-23.946-1.611-34.725-4.7 8.322-9.912 20.799-16.222 34.723-16.222zm-45.327 45.327c0-5.197.879-10.194 2.497-14.847 13.201 4.228 27.85 6.442 42.832 6.442 14.978 0 29.625-2.214 42.828-6.442a45.127 45.127 0 0 1 2.497 14.847c0 24.993-20.333 45.327-45.327 45.327-24.993 0-45.327-20.334-45.327-45.327zm59.527 59.668c-1 7.568-7.638 12.684-13.644 12.684h-.974c-6.361 0-13.425-5.38-14.34-12.82a61.273 61.273 0 0 0 14.757 1.795c4.886 0 9.642-.575 14.201-1.659zM214.822 394.58l-51.676-32.898v-24.787c0-17.591 8.888-33.653 23.275-43.119 4.999 11.407 16.783 18.487 27.966 18.487h.974c12.073 0 22.745-7.857 27.355-18.773 14.595 9.41 23.663 25.598 23.748 43.443l.12 24.944-51.762 32.703zm-57.463-214.738a8.001 8.001 0 0 0-2.572-11.018 74.519 74.519 0 0 0-7.554-4.109c9.886-5.054 18.631-12.293 25.573-21.348a27.773 27.773 0 0 0 9.12 1.532c15.373 0 27.88-12.507 27.88-27.88V97.138c0-25.272-9.654-49.207-27.183-67.394C165.144 11.61 141.678 1.076 116.548.082h-.007a98.032 98.032 0 0 0-6.216-.055c-25.018.604-48.617 10.73-66.45 28.512-18.283 18.23-28.352 42.593-28.352 68.6v19.881c0 15.373 12.507 27.88 27.881 27.88 3.192 0 6.26-.539 9.118-1.531 7.647 9.974 17.483 17.745 28.622 22.819-24.685 12.982-39.953 38.112-39.953 65.94v65.484a7.999 7.999 0 0 0 3.646 6.711l72.575 47.091a7.994 7.994 0 0 0 11.065-2.356 8 8 0 0 0-2.356-11.065l-68.93-44.726v-61.139c0-18.51 8.619-35.505 23.058-46.472 4.952 14.37 17.668 25.167 31.728 25.167h1.194c15.27 0 27.458-13.822 31.75-29.264.477.278.95.563 1.419.854a8 8 0 0 0 11.019-2.571zM63.19 68.063a57.34 57.34 0 0 0-7.906 29.076v19.881c0 3.79-1.784 7.171-4.557 9.348a7.92 7.92 0 0 0-.681.497 11.807 11.807 0 0 1-6.643 2.035c-6.551 0-11.88-5.329-11.88-11.88V97.138c0-44.413 34.784-80.043 79.185-81.117a82.12 82.12 0 0 1 5.213.048c43.673 1.731 77.884 37.34 77.884 81.069v19.881c0 6.551-5.33 11.88-11.881 11.88-2.459 0-4.747-.751-6.645-2.036a8.07 8.07 0 0 0-.678-.495 11.868 11.868 0 0 1-4.558-9.349V97.138c0-28.238-21.036-52.64-48.932-56.761a8.005 8.005 0 0 0-9.145 7.288 81.018 81.018 0 0 1-3.022 16.457H70.083a7.998 7.998 0 0 0-6.893 3.941zm49.981 126.76h-1.194c-9.044 0-17.921-10.979-17.921-22.166 0-.69-.089-1.369-.259-2.02a76.503 76.503 0 0 0 18.868 2.35c6.12 0 12.118-.722 17.895-2.109-.544 11.633-9.348 23.945-17.389 23.945zm-.506-37.836c-18.646 0-35.855-8.489-47.161-22.99a27.746 27.746 0 0 0 5.779-16.978V97.138a41.415 41.415 0 0 1 3.652-17.016h39.783a7.999 7.999 0 0 0 7.504-5.227 96.49 96.49 0 0 0 4.513-16.675c16.017 5.83 27.309 21.343 27.309 38.918v19.881a27.74 27.74 0 0 0 5.78 16.978c-11.305 14.502-28.513 22.99-47.159 22.99z"/>
                        </svg>
                        {{ __('Familie') }}
                    </x-nav-link>

                    @auth
                    <x-nav-link :href="route('wish-list', ['name' => 'user()->name'])" :active="request()->routeIs('wish-list') && user()->name == request()->route('name')">
                        <svg class="h-6 pb-1 mr-1 stroke-current fill-current" viewBox="0 0 16 16">
                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                        {{ __('Mijn lijst') }}
                    </x-nav-link>

                    <x-nav-link :href="route('add-wish')" :active="request()->routeIs('add-wish')">
                        <svg class="h-8 pb-1 mr-1 stroke-current" viewBox="0 0 24 24" fill="none">
                            <path d="M12 8v3m0 0v3m0-3h3m-3 0H9" stroke-width="2" stroke-linecap="round"/>
                            <path d="M14 19c3.771 0 5.657 0 6.828-1.172C22 16.657 22 14.771 22 11c0-3.771 0-5.657-1.172-6.828C19.657 3 17.771 3 14 3h-4C6.229 3 4.343 3 3.172 4.172 2 5.343 2 7.229 2 11c0 3.771 0 5.657 1.172 6.828.653.654 1.528.943 2.828 1.07" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 19c-1.236 0-2.598.5-3.841 1.145-1.998 1.037-2.997 1.556-3.489 1.225-.492-.33-.399-1.355-.212-3.404L6.5 17.5" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        {{ __('Nieuw') }}
                    </x-nav-link>

                    @if (user()->name === 'Gerda')
                        <x-nav-link :href="route('letters')" :active="request()->routeIs('letters')">
                            {{ __('Sinterklaasletters') }}
                        </x-nav-link>
                    @endif

                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-2xl font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Uitloggen') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
                @guest
                    <a class="underline text-base text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Inloggen') }}
                    </a>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                @auth
                    <div class="text-2xl text-gray-800 pr-4">{{ user()->name }}</div>
                @endauth

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-full text-gray-400 hover:text-gray-500 bg-gray-100 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <svg class="inline-block h-6 pb-1 mr-1 stroke-current fill-current" viewBox="0 0 412.053 412.053">
                    <path d="M396.399 67.735c-2.731-14.978-9.574-28.905-19.791-40.284l-.059-.067c-5.233-5.909-13.905-14.033-25.497-19.181l-.264-.117C339.6 2.72 327.594 0 315.105 0c-18.47 0-35.94 5.962-50.522 17.243l-.098.076c-12.536 9.789-20.809 23.777-21.833 25.559a7.914 7.914 0 0 0-.134.236c-6.577 12.058-10.053 25.726-10.053 39.527 0 2.866.15 5.767.448 8.621a8 8 0 0 0 4.248 6.26 29.662 29.662 0 0 0 4.691 1.96c6.438 19.706 20.499 35.466 38.375 44.329-7.663 3.914-14.545 9.089-20.498 15.418a8 8 0 0 0 11.655 10.961 59.159 59.159 0 0 1 9.369-8.088c4.843 13.721 17.325 23.773 31.522 23.773h1.194c14.221 0 26.691-10.773 31.248-25.35 16.893 10.59 27.701 29.458 27.701 49.641v83.099l-72.764 47.215a7.998 7.998 0 0 0-2.356 11.065 7.993 7.993 0 0 0 11.065 2.356l76.409-49.58a8.001 8.001 0 0 0 3.646-6.711v-87.444c0-28.331-15.816-53.725-40.812-66.396 23.671-11.814 40.41-35.658 42.05-63.429a29.956 29.956 0 0 0 5.791-7.157 7.98 7.98 0 0 0 .952-5.449zM313.47 169.876h-1.194c-9.574 0-17.663-9.28-17.663-20.265 0-.137-.003-.273-.01-.409a76.004 76.004 0 0 0 19.344 2.494c5.686 0 11.235-.634 16.572-1.835-.626 10.816-8.324 20.015-17.049 20.015zm.476-34.18c-24.123 0-45.512-14.37-54.882-35.91 11.108-3.142 19.605-12.566 21.397-24.173 4.773.613 9.61.922 14.463.922 16.272 0 31.948-3.411 45.987-9.943 3.618 12.425 15.11 21.531 28.688 21.531.99 0 1.974-.05 2.949-.148-5.641 27.18-29.847 47.721-58.602 47.721zm55.653-63.572c-7.649 0-13.872-6.221-13.872-13.869v-4.452a8 8 0 0 0-12.254-6.775c-14.077 8.837-30.865 13.508-48.55 13.508a96.545 96.545 0 0 1-20.419-2.167 8 8 0 0 0-9.695 7.818v4.853c0 7.647-6.222 13.869-13.87 13.869-.524 0-1.042-.029-1.554-.086a7.251 7.251 0 0 0-.357-.045 13.432 13.432 0 0 1-.533-.084 67.064 67.064 0 0 1-.032-2.052c0-11.1 2.785-22.088 8.055-31.783l.06-.106c.068-.123 7.294-12.65 17.741-20.813l.053-.041C286.126 20.806 300.211 16 315.105 16c10.075 0 19.753 2.191 28.764 6.512.156.075.387.18.689.313 8.897 3.952 15.728 10.348 19.918 15.059l.141.161a66.47 66.47 0 0 1 15.374 29.354c-2.617 2.964-6.401 4.725-10.392 4.725zM245.81 276.808c18.128-10.667 30.322-30.386 30.322-52.897 0-10.13-2.47-19.696-6.837-28.125a8.105 8.105 0 0 0-.536-1.011c-10.386-19.154-30.676-32.191-53.954-32.191-23.283 0-43.577 13.041-53.96 32.204a8.098 8.098 0 0 0-.522.985 60.947 60.947 0 0 0-6.844 28.138c0 22.507 12.188 42.222 30.311 52.89-22.433 11.597-36.643 34.617-36.643 60.093v29.178a8 8 0 0 0 3.704 6.749l59.659 37.98a7.995 7.995 0 0 0 8.569.014l59.8-37.781a7.999 7.999 0 0 0 3.727-6.801l-.141-29.377c-.122-25.536-14.317-48.48-36.655-60.048zm-31.005-98.224c13.925 0 26.401 6.31 34.723 16.222-10.78 3.089-22.602 4.7-34.721 4.7-12.123 0-23.946-1.611-34.725-4.7 8.322-9.912 20.799-16.222 34.723-16.222zm-45.327 45.327c0-5.197.879-10.194 2.497-14.847 13.201 4.228 27.85 6.442 42.832 6.442 14.978 0 29.625-2.214 42.828-6.442a45.127 45.127 0 0 1 2.497 14.847c0 24.993-20.333 45.327-45.327 45.327-24.993 0-45.327-20.334-45.327-45.327zm59.527 59.668c-1 7.568-7.638 12.684-13.644 12.684h-.974c-6.361 0-13.425-5.38-14.34-12.82a61.273 61.273 0 0 0 14.757 1.795c4.886 0 9.642-.575 14.201-1.659zM214.822 394.58l-51.676-32.898v-24.787c0-17.591 8.888-33.653 23.275-43.119 4.999 11.407 16.783 18.487 27.966 18.487h.974c12.073 0 22.745-7.857 27.355-18.773 14.595 9.41 23.663 25.598 23.748 43.443l.12 24.944-51.762 32.703zm-57.463-214.738a8.001 8.001 0 0 0-2.572-11.018 74.519 74.519 0 0 0-7.554-4.109c9.886-5.054 18.631-12.293 25.573-21.348a27.773 27.773 0 0 0 9.12 1.532c15.373 0 27.88-12.507 27.88-27.88V97.138c0-25.272-9.654-49.207-27.183-67.394C165.144 11.61 141.678 1.076 116.548.082h-.007a98.032 98.032 0 0 0-6.216-.055c-25.018.604-48.617 10.73-66.45 28.512-18.283 18.23-28.352 42.593-28.352 68.6v19.881c0 15.373 12.507 27.88 27.881 27.88 3.192 0 6.26-.539 9.118-1.531 7.647 9.974 17.483 17.745 28.622 22.819-24.685 12.982-39.953 38.112-39.953 65.94v65.484a7.999 7.999 0 0 0 3.646 6.711l72.575 47.091a7.994 7.994 0 0 0 11.065-2.356 8 8 0 0 0-2.356-11.065l-68.93-44.726v-61.139c0-18.51 8.619-35.505 23.058-46.472 4.952 14.37 17.668 25.167 31.728 25.167h1.194c15.27 0 27.458-13.822 31.75-29.264.477.278.95.563 1.419.854a8 8 0 0 0 11.019-2.571zM63.19 68.063a57.34 57.34 0 0 0-7.906 29.076v19.881c0 3.79-1.784 7.171-4.557 9.348a7.92 7.92 0 0 0-.681.497 11.807 11.807 0 0 1-6.643 2.035c-6.551 0-11.88-5.329-11.88-11.88V97.138c0-44.413 34.784-80.043 79.185-81.117a82.12 82.12 0 0 1 5.213.048c43.673 1.731 77.884 37.34 77.884 81.069v19.881c0 6.551-5.33 11.88-11.881 11.88-2.459 0-4.747-.751-6.645-2.036a8.07 8.07 0 0 0-.678-.495 11.868 11.868 0 0 1-4.558-9.349V97.138c0-28.238-21.036-52.64-48.932-56.761a8.005 8.005 0 0 0-9.145 7.288 81.018 81.018 0 0 1-3.022 16.457H70.083a7.998 7.998 0 0 0-6.893 3.941zm49.981 126.76h-1.194c-9.044 0-17.921-10.979-17.921-22.166 0-.69-.089-1.369-.259-2.02a76.503 76.503 0 0 0 18.868 2.35c6.12 0 12.118-.722 17.895-2.109-.544 11.633-9.348 23.945-17.389 23.945zm-.506-37.836c-18.646 0-35.855-8.489-47.161-22.99a27.746 27.746 0 0 0 5.779-16.978V97.138a41.415 41.415 0 0 1 3.652-17.016h39.783a7.999 7.999 0 0 0 7.504-5.227 96.49 96.49 0 0 0 4.513-16.675c16.017 5.83 27.309 21.343 27.309 38.918v19.881a27.74 27.74 0 0 0 5.78 16.978c-11.305 14.502-28.513 22.99-47.159 22.99z"/>
                </svg>
                {{ __('Familie') }}
            </x-responsive-nav-link>

            @auth
            <x-responsive-nav-link :href="route('wish-list', ['name' => 'user()->name'])" :active="request()->routeIs('wish-list') && user()->name == request()->route('name')">
                <svg class="inline-block h-6 pb-1 mr-1 stroke-current fill-current" viewBox="0 0 16 16">
                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                </svg>
                {{ __('Mijn lijst') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('add-wish')" :active="request()->routeIs('add-wish')">
                <svg class="inline-block h-6 pb-1 mr-1 stroke-current" viewBox="0 0 24 24" fill="none">
                    <path d="M12 8v3m0 0v3m0-3h3m-3 0H9" stroke-width="2" stroke-linecap="round"/>
                    <path d="M14 19c3.771 0 5.657 0 6.828-1.172C22 16.657 22 14.771 22 11c0-3.771 0-5.657-1.172-6.828C19.657 3 17.771 3 14 3h-4C6.229 3 4.343 3 3.172 4.172 2 5.343 2 7.229 2 11c0 3.771 0 5.657 1.172 6.828.653.654 1.528.943 2.828 1.07" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 19c-1.236 0-2.598.5-3.841 1.145-1.998 1.037-2.997 1.556-3.489 1.225-.492-.33-.399-1.355-.212-3.404L6.5 17.5" stroke-width="2" stroke-linecap="round"/>
                </svg>
                {{ __('Nieuw') }}
            </x-responsive-nav-link>

            @if (user()->name === 'Gerda')
                <x-responsive-nav-link :href="route('letters')" :active="request()->routeIs('letters')">
                    {{ __('Sinterklaasletters') }}
                </x-responsive-nav-link>
            @endif

            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth
            @guest
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Inloggen') }}
                </x-responsive-nav-link>
            @endguest
        </div>
    </div>
</nav>
