<section class="antialiased bg-gray-100 text-gray-600 pt-1 px-1 md:px-4">
    <div class="flex flex-col justify-around h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded border border-yellow-300">

            <header class="px-5 py-3 border-b border-yellow-300">
                <h2 class="font-semibold text-gray-800">{{ $title }}</h2>
            </header>

                <ul class="flex flex-wrap justify-center divide-y divide-yellow-300">
                    @foreach ($wishes as $wish)
                    <li class="grid grid-cols-8 gap-4 py-1 pl-2 w-full">
                        <div class="col-span-5 lg:col-span-2">
                            Test
                            @if ($wish->linkPreview)
                                <x-link-preview :preview="$wish->linkPreview"/>
                            @endif
                        </div>
                        <div class="col-span-8 lg:col-span-4 order-first lg:order-none flex items-center">
                            {{-- <h3 class="font-semibold text-black">{{ $wish->description }}</h3>--}}
                            {{ $wish->description }}
                        </div>
                        <div class="col-span-3 lg:col-span-2 inline-flex justify-end">
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
    </div>
</section>
