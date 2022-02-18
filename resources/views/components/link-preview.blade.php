<div class="flex items-center">
    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
        <a href="{{ $preview->url }}">
            <img class="rounded-full" src="{{ $preview->image }}" width="40" height="40" alt="">
        </a>
    </div>
    <div class="font-medium text-gray-800">
        <a href="{{ $preview->url }}">{{ $preview->title }}</a>
    </div>
</div>
