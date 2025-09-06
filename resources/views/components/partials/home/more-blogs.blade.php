<section class="bg-white-first flex justify-center">
    <div class="container px-[12px] py-[40px] flex flex-col gap-[24px]">
        <div class="cards w-full  h-[480px] flex items-center gap-[16px] overflow-x-auto [&>*]:shrink-0">
            @foreach ($medias as $m)
                <a href="{{ route('media-home.media', $m->slug) }}"
                    class="card w-[280px] lg:w-[320px] h-[400px] flex flex-col items-end border-[2px] border-dark-first hover:underline hover:scale-[1.02]">
                    <div class="w-full h-[220px]">
                        <img src="{{ $m->thumbnail }}" alt="{{ $m->title }}"
                            class="w-full h-full object-cover object-center">
                    </div>
                    <div
                        class="w-full h-[180px] p-[12px] flex flex-col gap-[8px] border-[2px] border-t-dark-first bg-white-first-40">
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
            @endforeach

        </div>
        <div class="flex justify-center">
            <a href="{{ route('media-home') }}"
                class="w-fit my-[16px] px-[12px] py-[8px] cursor-pointer bg-blue-second text-white-first font-spaceGrotesk font-[600] text-[16px] hover:bg-blue-plus hover:text-dark-first transition-all duration-300">See
                More</a>
        </div>
    </div>
</section>
