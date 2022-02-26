<div class="flex items-center">
    <a href="{{ $preview->link }}" target="_blank" class="w-10 flex-shrink-0 mr-2 sm:mr-3" title="{{ $preview->title ?? $preview->description }}">
        <img class="max-h-10 rounded-full" src="{{ $preview->image ?? '/img/link.svg' }}" alt="link">
    </a>
</div>
