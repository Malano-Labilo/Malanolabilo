<section class="flex justify-center">
    <div class="container px-[12px] py-[72px] flex flex-col items-center">
        <h1 class="mb-[72px] uppercase text-center font-spaceGrotesk text-[32px] font-[700]">{{ $media->title }}ww </h1>
        <div class="w-full max-w-[448px]">
            <img src="{{ asset($media->thumbnail) }}" alt="{{ $media->title }}" class="w-full h-full">
        </div>
        <div class="mt-[24px] mb-[64px] flex flex-col gap-[8px] items-center">
            <div class="flex justify-center gap-[8px]">
                <div class="">
                    By <a href="{{ route('media-home.medias', ['author' => $media->author->username]) }}"
                        class="hover:underline">{{ $media->author->name }}</a>
                </div>
                <span> in </span><a href="{{ route('media-home.medias', ['category' => $media->category->slug]) }}"
                    class="hover:underline">{{ $media->category->name }}</a>
            </div>
            <div class="">{{ $media->created_at }}</div>
        </div>
        <article>
            <div>{{ $media->body }} </div>
        </article>
    </div>
</section>
