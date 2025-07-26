<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-[8px]">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 flex gap-[16px]">
                    <p class="text-[18px] text-dark-first">Works By : {{ Auth::user()->username }}</p>
                    <a href="{{ route('dashboard.work.edit', $work->slug) }}"><button id="{{ $work->id }}"
                            class="inline-flex items-center cursor-pointer text-sm font-medium hover:bg-gray-100  p-1.5 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
                            type="button">
                            Edit
                        </button></a>
                    <form x-data="{ open: false }" @submit.prevent {{-- Cegah submit otomatis --}}
                        action="{{ route('dashboard.work.destroy', $work->slug) }}" method="POST">
                        @csrf @method('DELETE') <button id="{{ $work->id }}"
                            data-modal-target="deleteModal-{{ $work->id }}" @click="open = true"
                            class="inline-flex items-center cursor-pointer text-sm font-medium hover:bg-gray-100  p-1.5 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
                            type="button">
                            Delete
                        </button>
                        {{-- Alert Konfirmasi Delete --}}
                        <template x-teleport="body">
                            <div id="deleteModal-{{ $work->id }}" x-show="open" {{-- tampilkan alert saat open true --}}
                                x-transition:opacity {{-- animasi fade --}} x-cloak {{-- sembunyikan elemen saat tidak aktif --}} role="alert"
                                class="w-full max-w-[400px] absolute top-[88px] left-[50%] -translate-x-[50%] flex items-start justify-center rounded-md border border-gray-300 bg-red-blue p-4 shadow-sm">
                                <div class="flex items-start gap-4">
                                    <x-elements-icon name="delete" class="size-[24px] text-white-first" />

                                    <div class="flex-1">
                                        <strong class="font-medium text-white-first"> Delete </strong>

                                        <p class="mt-0.5 text-sm text-white-first">Apakah Anda Yakin
                                            Ingin
                                            Menghapus
                                            Project Ini ?</p>

                                        <div class="mt-3 flex items-center gap-2">
                                            {{-- Ya: Submit Form --}}
                                            <button type="button" @click="$root.submit()" {{-- Submit form --}}
                                                class="rounded border border-gray-300 px-3 py-1.5 text-sm font-medium text-white-first shadow-sm transition-colors hover:bg-gray-100">
                                                Yes
                                            </button>
                                            {{-- Tidak: Tutup Alert --}}
                                            <button type="button" @click="open = false" {{-- Tutup alert --}}
                                                class="rounded border border-transparent px-3 py-1.5 text-sm font-medium text-white-first transition-colors hover:text-gray-900">
                                                No
                                            </button>
                                        </div>
                                    </div>
                                    {{-- Tombol Tutup (X) Alert --}}
                                    <button @click="open = false" {{-- Tutup alert --}}
                                        class="-m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700"
                                        type="button" aria-label="Dismiss alert">
                                        <span class="sr-only">Dismiss popup</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" class="size-5 text-white-first">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                        {{-- ------------ --}}
                    </form>
                </div>
                <x-partials-works-detail-work :work="$work" />
            </div>
        </div>
    </div>
</x-app-layout>
