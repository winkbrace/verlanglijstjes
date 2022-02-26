<div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded border border-yellow-300">

    <header class="px-5 py-3 border-b border-yellow-300">
        <h2 class="font-semibold text-gray-800">{{ $title }}</h2>
    </header>

    <ul class="flex flex-wrap justify-center divide-y divide-yellow-300">
        @foreach ($wishes as $wish)
        <li class="grid grid-cols-12 md:grid-cols-8 gap-0 md:gap-4 py-1 pl-2 w-full">
            <div class="col-span-2 md:col-span-1 row-span-2 md:row-span-1 flex items-center">
                @isset($wish->linkPreview)
                    <x-link-preview :preview="$wish->linkPreview"/>
                @endisset
            </div>
            <div class="col-span-10 md:col-span-5 flex items-center">
                {{-- <h3 class="font-semibold text-black">{{ $wish->description }}</h3>--}}
                {{ $wish->description }}
            </div>
            <div class="col-span-10 md:col-span-2 inline-flex justify-end items-center">
                @auth
                @if ($wish->user_id->equals(user()->id))
                    <x-wish-button type="edit" :id="$wish->id"/>
                    <x-wish-button type="delete" :id="$wish->id"/>
                @else
                    <x-checkbox :wishId="$wish->id"/>
                @endif
                @endauth
            </div>
        </li>
        @endforeach
    </ul>

</div>

