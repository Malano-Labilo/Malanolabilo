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
                @elseif (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="relative">
                    <input
                        class="w-[280px] max-w-[400px] pl-[16px] pr-[32px] py-[8px] placeholder:text-blue-first placeholder:bg-white-first placeholder:italic ..."
                        placeholder="Search Projects... " type="text" name="searching" autofocus />
                    <div class="absolute top-[8px] left-[252px]">
                        <button class=""> <x-elements-icon name="search"
                                class="w-[24px] cursor-pointer text-dark-first hover:text-blue-first" /></button>
                    </div>
                </div>
            </form>
            <div class="w-full flex justify-end">
                {{ $medias->links() }}
            </div>
            <div class="cards w-full flex flex-wrap gap-[52px] justify-evenly [&>*]:shrink-0">
                @forelse ($medias as $media)
                    <a href="{{ route('media-home.media', $media->slug) }}"
                        class="card w-[280px] lg:w-[320px] h-[400px] flex flex-col items-end border-[2px] border-dark-first hover:underline hover:scale-[1.02]">
                        <div class="w-full h-[220px]">
                            <img src=" {{ asset($media->thumbnail) }}" alt="{{ $media->title }}"
                                class="w-full h-full object-cover object-center">
                        </div>
                        <div
                            class="w-full h-[180px] p-[12px] flex flex-col gap-[8px] border-[2px] border-t-dark-first bg-white-first-40">
                            <h3 class="text-[16px] font-[500]">{{ $media->title }}</h3>
                            <p class="line-clamp-4">
                                {{ $media->body }}</p>
                            <div class="w-fit writer cursor-pointer flex gap-[16px] items-center ">
                                <img src="{{ $media->author->avatar ? asset('storage/' . $media->author->avatar) : asset('img/user-avatar.png') }}"
                                    alt="Image of the writer"
                                    class="rounded-full w-[40px] h-[40px] object-center object-cover">
                                <div class="writer-name line-clamp-1 font-[500]">{{ $media->author->name }}</div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full flex justify-center items-center">
                        <p class="text-[40px]">MEDIAS NOT FOUND!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
