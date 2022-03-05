<div class="flex bg-{{ $color }}-300 max-w-lg my-4 mx-auto rounded-lg">
    <div class="w-16 bg-{{ $color }}-500 flex flex-col justify-center rounded-l-lg">
        <div class="p-4">
            <svg class="h-8 w-8 text-white fill-current" viewBox="0 0 512 512">{!! $icon !!}</svg>
        </div>
    </div>
    <div class="w-auto text-grey-darker items-center p-4">
        @isset($title)
        <span class="text-lg font-bold pb-4">{{ $title }}</span>
        @endisset
        <p class="leading-tight">
            {{ $message }}
        </p>
    </div>
</div>
