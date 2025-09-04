<section class="flex justify-center">
    <div class="container h-[calc(100vh-64px)] relative flex items-end">
        <img src="{{ $media->thumbnail }}" alt="{{ $media->link }}"
            class="absolute z-[-10] h-full w-full object-cover object-center">
        <a href="media/detail-media/{{ $media->slug }}"
            class="z-[10] relative w-full px-[24px] lg:px-[200px] py-[16px] lg:py-[40px] flex flex-col gap-[16px] lg:gap-[32px] justify-center hover:bg-white-first-70 transition-all duration-300 ease-in-out">
            <h3 class="w-fit text-[24px] cursor-pointer">{{ $media->title }}</h3>
            <p class="cursor-pointer line-clamp-6">{{ $media->body }}</p>
            <div class="w-fit writer cursor-pointer flex gap-[16px] items-center ">
                <img src="img/user-avatar.png" alt="Image of the writer"
                    class="rounded-full w-[40px] h-[40px] object-center object-cover">
                <div class="writer-name line-clamp-1 font-[500]">{{ $media->author }}</div>
            </div>
        </a>
    </div>
</section>
