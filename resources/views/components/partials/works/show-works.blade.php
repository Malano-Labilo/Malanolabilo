<section class="flex justify-center ">
    <div class="container px-[12px] py-[72px]">
        <div class="mt-[32px] flex flex-col items-center gap-[32px]">
            <div class="flex flex-col items-center font-[600]">
                <span class="text-">{{ $firstTitle }}</span>
                <h3 class="capitalize text-[24px] font-spaceGrotesk font-[600]">{{ $title }}</h3>
            </div>
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
            <div class="w-full flex justify-end">
                {{ $show->links() }}</div>
            <div class="cards w-full flex flex-wrap gap-[52px] justify-evenly [&>*]:shrink-0">
                @forelse ($show as $s)
                    <div class="card w-[296px] border-[2px] border-dark-first">
                        <div class="h-[280px] w-full">
                            <img src="{{ $s->thumbnail ? asset('storage/' . $s->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                                alt="{{ $s->title }}" class="w-full h-full object-cover object-center" />
                        </div>
                        <div class="w-full py-[24px] px-[12px] flex flex-col gap-[16px] bg-blue-plus">
                            <h3 class="text-[16px] font-[500] line-clamp-1">{{ $s->title }}</h3>
                            <p class="line-clamp-4">
                                {{ $s->excerpt }}</p>
                            @if ($s->has_page)
                                <a href="{{ route('works.work', $s->slug) }}" class="w-fit">
                                @elseif($s->link)
                                    <a href="{{ $s->link }}" target="_blank" rel="noopener noreferrer"
                                        class="w-fit">
                                    @else
                                        <span class="w-fit opacity-50 cursor-not-allowed">
                            @endif
                            <button type="submit"
                                class="w-fit my-[16px] px-[12px] py-[8px] cursor-pointer bg-blue-first text-white-first font-spaceGrotesk font-[600] text-[16px] hover:bg-blue-plus hover:text-dark-first transition-all duration-300">See
                                More</button>
                            @if ($s->has_page || $s->link)
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="w-full flex justify-center items-center">
                        <p class="text-[40px]">PROJECT NOT FOUND!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
