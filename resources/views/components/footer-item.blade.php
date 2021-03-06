@props(['text', 'value'])
<div class="py-5 md:py-10 px-10 flex-1">
    <div class="text-gray-300 uppercase text-xs">
        {{ $text }}
    </div>
    <div class="text-xl lg:text-3xl font-semibold leading-none">
        {{ $value }}
    </div>
</div>
