<div class="flex flex-col justify-around h-full">
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded border border-yellow-300">

        <header class="px-5 py-3 border-b border-yellow-300 flex justify-between">
            <h2 class="font-semibold text-gray-800">{{ $title }}</h2>
            @if (user()->isGuest())
                {{-- show nothing --}}
            @elseif ($title === user()->name)
                <x-nav-link :href="route('add-wish')">
                    <svg class="h-8 pb-1 mr-1 stroke-current" viewBox="0 0 24 24" fill="none">
                        <path d="M12 8v3m0 0v3m0-3h3m-3 0H9" stroke-width="2" stroke-linecap="round"/>
                        <path d="M14 19c3.771 0 5.657 0 6.828-1.172C22 16.657 22 14.771 22 11c0-3.771 0-5.657-1.172-6.828C19.657 3 17.771 3 14 3h-4C6.229 3 4.343 3 3.172 4.172 2 5.343 2 7.229 2 11c0 3.771 0 5.657 1.172 6.828.653.654 1.528.943 2.828 1.07" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 19c-1.236 0-2.598.5-3.841 1.145-1.998 1.037-2.997 1.556-3.489 1.225-.492-.33-.399-1.355-.212-3.404L6.5 17.5" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    {{ __('Nieuw') }}
                </x-nav-link>
            @else
{{--                <x-nav-link :href="route('add-idea', ['user' => $title])">--}}
{{--                    <svg class="h-8 pb-1 mr-1 stroke-current" viewBox="0 0 24 24" fill="none">--}}
{{--                        <path d="M12 8v3m0 0v3m0-3h3m-3 0H9" stroke-width="2" stroke-linecap="round"/>--}}
{{--                        <path d="M14 19c3.771 0 5.657 0 6.828-1.172C22 16.657 22 14.771 22 11c0-3.771 0-5.657-1.172-6.828C19.657 3 17.771 3 14 3h-4C6.229 3 4.343 3 3.172 4.172 2 5.343 2 7.229 2 11c0 3.771 0 5.657 1.172 6.828.653.654 1.528.943 2.828 1.07" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        <path d="M14 19c-1.236 0-2.598.5-3.841 1.145-1.998 1.037-2.997 1.556-3.489 1.225-.492-.33-.399-1.355-.212-3.404L6.5 17.5" stroke-width="2" stroke-linecap="round"/>--}}
{{--                    </svg>--}}
{{--                    {{ __('Idee') }}--}}
{{--                </x-nav-link>--}}
            @endif
        </header>

        <ul class="flex flex-wrap justify-center divide-y divide-yellow-300">
            @foreach ($wishes as $wish)
            <li class="grid grid-cols-12 md:grid-cols-8 gap-0 md:gap-4 py-1 pl-2 w-full">
                @if ($wish->isClaimedByAnother())
                    <div class="col-span-12 md:col-span-6 row-span-2 md:row-span-1 flex items-center bg-warmgray-400 rounded-full">
                        <span class="font-bold text-white pt-1 px-3">Gereserveerd</span>
                    </div>
                @else
                    <div class="col-span-2 md:col-span-1 row-span-2 md:row-span-1 flex items-center">
                        @isset($wish->linkPreview)
                            <x-link-preview :preview="$wish->linkPreview"/>
                        @endisset
                    </div>
                    <div class="col-span-10 md:col-span-5 flex items-center">
                        {{-- <h3 class="font-semibold text-black">{{ $wish->description }}</h3>--}}
                        {{ $wish->description }}
                    </div>
                @endif
                <div class="col-span-10 md:col-span-2 inline-flex justify-end items-center">
                    @auth
                    @if ($wish->user_id->equals(userId()))
                        <x-wish-button type="edit" :id="$wish->id" label="Edit"/>
                        <x-wish-button type="delete" :id="$wish->id" label="Delete"/>
                    @else
                        <x-wish-button type="claim" :id="$wish->id" label="Dit geef ik" :claimedBy="$wish->claimed_by"/>
                    @endif
                    @endauth
                </div>
            </li>
            @endforeach
        </ul>

    </div>
</div>
