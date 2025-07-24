<section class="flex justify-center ">
    <div class="container px-[12px] py-[72px]">
        <div class="mt-[32px] flex flex-col items-center gap-[32px]">
            <h3 class="capitalize text-[24px] font-spaceGrotesk font-[600]">{{ 'Projects' }}</h3>
            <div class="cards w-full flex gap-[16px] overflow-x-auto [&>*]:shrink-0">

                @foreach ($works as $work)
                    <div class="card w-[296px]">
                        <div class="h-[280px] w-full">
                            <img src="{{ $work->thumbnail ? asset('storage/' . $work->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                                alt="Thumbnail" class="w-full h-full object-cover object-center" />
                        </div>
                        <div class="w-full py-[24px] px-[12px] flex flex-col gap-[16px] bg-blue-plus">
                            <h3 class="text-[16px] font-[500] line-clamp-1">{{ $work->title }}</h3>
                            <p class="line-clamp-4">
                                {{ $work->excerpt }}</p>
                            @if ($work->has_page)
                                <a href="{{ route('works.work', $work->slug) }}" class="w-fit">
                                @elseif($work->link)
                                    <a href="{{ $work->link }}" target="_blank" rel="noopener noreferrer"
                                        class="w-fit">
                                    @else
                                        <span class="w-fit opacity-50 cursor-not-allowed">
                            @endif
                            <button type="submit"
                                class="w-[120px] h-[40px] cursor-pointer bg-blue-first text-white-first font-spaceGrotesk font-[400] text-[16px] hover:bg-blue-plus hover:text-dark-first transition-all duration-300">See
                                Detail</button>
                            @if ($work->has_page || $work->link)
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('works.all') }}">
                <button type="submit"
                    class="w-fit my-[16px] px-[12px] py-[8px] cursor-pointer bg-blue-first text-white-first font-spaceGrotesk font-[600] text-[16px] hover:bg-blue-plus hover:text-dark-first transition-all duration-300">See
                    More</button></a>
        </div>
    </div>
</section>
