<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-[8px]">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6">
                    <p class="text-[18px] text-dark-first">Works By : {{ Auth::user()->username }}</p>
                </div>

                {{-- Alert Success Project --}}
                @if (Session::has('success'))
                    <div class="flex justify-center" x-data="{ show: true }" {{-- state --}} x-show="show"
                        {{-- tampil/ hilang --}} x-transition.opacity.duration.300ms {{-- animasi fade --}}
                        x-init="setTimeout(() => show = false, 4000)" {{-- auto close 4 detik --}}>
                        <div role="alert"
                            class="w-full max-w-[320px] absolute top-[120px] bg-green-700 text-white-first rounded-md border border-gray-300 p-4 shadow-sm">
                            <div class="flex items-start gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="flex-1">
                                    <strong class="font-medium"> Success </strong>
                                    <p class="mt-0.5 text-sm">{{ Session::get('success') }}</p>
                                </div>
                                <button @click="show = false" {{-- klik button untuk menghilangkan alert --}}
                                    class="-m-3 rounded-full p-1.5  transition-colors hover:bg-gray-50 hover:text-gray-700"
                                    type="button" aria-label="Dismiss alert">
                                    <span class="sr-only">Dismiss popup</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @elseif (Session::has('error'))
                    <div class="flex justify-center" x-data="{ show: true }" {{-- state --}} x-show="show"
                        {{-- tampil/ hilang --}} x-transition.opacity.duration.300ms {{-- animasi fade --}}
                        x-init="setTimeout(() => show = false, 4000)" {{-- auto close 4 detik --}}>
                        <div role="alert"
                            class="w-full max-w-[320px] absolute top-[120px] bg-red-700 text-white-first rounded-md border border-gray-300 p-4 shadow-sm">
                            <div class="flex items-start gap-4">
                                <x-elements-icon name="error" class="size-[16px] text-white-first" />
                                <div class="flex-1">
                                    <strong class="font-medium"> Error </strong>
                                    <p class="mt-0.5 text-sm">{{ Session::get('error') }}</p>
                                </div>
                                <button @click="show = false" {{-- klik button untuk menghilangkan alert --}}
                                    class="-m-3 rounded-full p-1.5  transition-colors hover:bg-gray-50 hover:text-gray-700"
                                    type="button" aria-label="Dismiss alert">
                                    <span class="sr-only">Dismiss popup</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <x-table-works-table :works="$works" />
            </div>
        </div>
    </div>
</x-app-layout>
