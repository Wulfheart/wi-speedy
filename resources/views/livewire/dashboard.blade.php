<div class="flex flex-col justify-between min-h-screen space-y-10" wire:poll>
    <!-- Nav -->
    <div class="p-12 pb-0">
        <div class="text-2xl uppercase">
            <span class="font-bold">WI</span><span class="font-thin">speedy</span>
        </div>
    </div>
    <!-- Body -->
    <div class="flex items-center flex-grow w-full h-full overflow-x-auto ">
        <div class="flex flex-row items-end h-64 px-12 mx-auto w-6xl">
            @php
            $max = $diagram->entries->max('y');
            @endphp
            @foreach ($diagram->entries as $entry)
            <div class="flex flex-col-reverse flex-1 h-full sm:bg-gray-200">
                <div class="" style="height: {{ $entry->y / $max * 100 }}%; background-color: {{ $entry->color }}">
                </div>
            </div>
            <div class="hidden sm:block" style="margin-left: 1px; margin-right: 1px;"></div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div>
        <div class="flex flex-row justify-end border-t">
            <div class="border-l">
                <select name="" id="" class="form-select" wire:model="hours">
                    <option value="3">Past 3 Hours</option>
                    <option value="6">Past 6 Hours</option>
                    <option value="12">Past 12 Hours</option>
                    <option value="24">Past Day</option>
                    <option value="168">Past Week</option>
                    <option value="672">Past Month</option>
                </select>
            </div>
        </div>
        <div
            class="flex flex-col min-w-full text-gray-100 bg-gray-900 divide-y divide-gray-700 md:divide-x md:flex-row ">
            <x-footer-item text="Number of checks">
                <x-slot name="value">
                    {{ $checks }}
                </x-slot>
            </x-footer-item>
            <x-footer-item text="Down">
                <x-slot name="value">
                    {{ $down }}bit/s
                </x-slot>
            </x-footer-item>
            <x-footer-item text="Up">
                <x-slot name="value">
                    {{ $up }}bit/s
                </x-slot>
            </x-footer-item>
            <x-footer-item text="Ping">
                <x-slot name="value">
                    {{ $ping }}s
                </x-slot>
            </x-footer-item>
        </div>
    </div>


</div>
