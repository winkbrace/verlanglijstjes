<div class="flex flex-col justify-around h-full">
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded border border-yellow-300">

        <header class="px-5 py-3 border-b border-yellow-300">
            <h2 class="font-semibold text-gray-800">Chocoladeletters</h2>
        </header>

        <ul class="flex flex-wrap justify-center divide-y divide-yellow-300">
            @foreach ($users as $user)
            <li class="grid grid-cols-12 py-1 pl-2 w-full">
                <div class="col-span-6 md:col-span-4 lg:col-span-3 flex items-center">
                    <span class="w-10"><img src="{{ $user->avatarUrl() }}" alt="" class="h-8"></span>
                    {{ $user->name }}
                </div>
                <div class="col-span-6 flex items-center">
                    {{ $user->chocolate_preference }}
                </div>
            </li>
            @endforeach
        </ul>

    </div>
</div>
