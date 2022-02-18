<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">{{ $title }}</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($wishes as $wish)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    @if ($wish->linkPreview)
                                    <x-link-preview :preview="$wish->linkPreview"/>
                                    @endif
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $wish->title }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium">{{ $wish->description }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">🇺🇸</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
