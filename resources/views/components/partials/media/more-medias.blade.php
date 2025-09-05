<section class="flex justify-center ">
    <div class="container px-[12px] py-[72px]">
        <div class="mt-[32px] flex flex-col items-center gap-[32px]">
            <h3 class="capitalize text-[24px] font-spaceGrotesk font-[600]">{{ 'Medias' }}</h3>

            <form class="w-full flex justify-center">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('user'))
                    <input type="hidden" name="user" value="{{ request('username') }}">
                @endif
                <div class="relative">
                    <input
                        class="w-[280px] max-w-[400px] pl-[16px] pr-[32px] py-[8px] placeholder:text-blue-first placeholder:bg-white-first placeholder:italic ..."
                        placeholder="Search Projects... " type="text" name="searching" />
                    <div class="absolute top-[8px] left-[252px]">
                        <button class=""> <x-elements-icon name="search"
                                class="w-[24px] cursor-pointer text-dark-first hover:text-blue-first" /></button>
                    </div>
                </div>
            </form>
            <div class="cards w-full flex gap-[16px] overflow-x-auto [&>*]:shrink-0">
                @forelse ($medias as $m)
                    <a href="media/detail-media/{{ $m->slug }}"
                        class="card w-[280px] lg:w-[320px] h-[400px] flex flex-col items-end">
                        <div class="w-full h-[220px]">
                            <img src="{{ $m->thumbnail }}" alt="{{ $m->title }}"
                                class="w-full h-full object-cover object-center">
                        </div>
                        <div class="w-full h-[180px] p-[12px] flex flex-col gap-[8px] bg-white-first-40">
                            <h3 class="text-[16px] font-[500]">{{ $m->title }}</h3>
                            <p class="line-clamp-4">
                                {{ $m->body }}</p>
                            <div class="w-fit writer cursor-pointer flex gap-[16px] items-center ">
                                <img src="img/user-avatar.png" alt="Image of the writer"
                                    class="rounded-full w-[40px] h-[40px] object-center object-cover">
                                <div class="writer-name line-clamp-1 font-[500]">{{ $m->author->name }}</div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full flex justify-center items-center">
                        <p class="text-[40px]">MEDIAS NOT FOUND!</p>
                    </div>
                @endforelse
            </div>
            {{-- <a href="{{ route('media-home.medias') }}">
                <button type="submit"
                    class="w-fit my-[16px] px-[12px] py-[8px] cursor-pointer bg-blue-second text-white-first font-spaceGrotesk font-[600] text-[16px] hover:bg-blue-plus hover:text-dark-first transition-all duration-300">See
                    More</button></a> --}}
        </div>
    </div>
</section>
