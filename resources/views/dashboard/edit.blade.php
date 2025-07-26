<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full bg-white shadow-xs sm:rounded-lg">
        <div class="p-6 flex gap-[16px]">
            <p class="text-[18px] text-dark-first">Works By : {{ Auth::user()->username }}</p>
        </div>
        <x-partials-dashboard-work-edit :work="$work" />
    </div>
    </div>
</x-app-layout>
