<div class="flex flex-col justify-around h-full">
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded border border-yellow-300">

        <header class="px-5 py-3 border-b border-yellow-300">
            <h2 class="font-semibold text-gray-800">{{ $title }}</h2>
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
