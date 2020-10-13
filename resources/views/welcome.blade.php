<x-layout>
    <!-- Nav -->
    <div class="p-12 pb-0">
        <div class="text-2xl uppercase">
            <span class="font-bold">WI</span><span class="font-thin">speedy</span>
        </div>
    </div>
    <!-- Body -->
    <div class="h-full w-full bg-green-500 flex-grow"></div>

    <!-- Footer -->
    <div>
        <div class="border-t flex flex-row justify-end">
            <div class="border-l">
                <select name="" id="" class="form-select">
                    <option value="3">Past 3 Hours</option>
                    <option value="6">Past 6 Hours</option>
                    <option value="12">Past 12 Hours</option>
                    <option value="24">Past Day</option>
                    <option value="168">Past Week</option>
                    <option value="672">Past Month</option>
                </select>
            </div>
        </div>
        <div class="min-w-full bg-gray-900 divide-y md:divide-x divide-gray-700 flex flex-col md:flex-row text-gray-100 ">
            <x-footer-item text="Number of checks" value="100"/>
             <x-footer-item text="Down" value="75 Mbit/s"/>
            <x-footer-item text="Up" value="12.3 Mbit/s"/>
            <x-footer-item text="Ping" value="33.4 ms"/>
        </div>
    </div>
</x-layout>
