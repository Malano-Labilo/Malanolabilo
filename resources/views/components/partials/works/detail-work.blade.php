<section class="flex justify-center">
    <div class="container px-[12px] py-[72px] flex flex-col items-center">
        <h1 class="mb-[72px] uppercase text-center font-spaceGrotesk text-[32px] font-[700]"> {{ $work->title }}</h1>
        <div class="w-[448px]">
            <img src="{{ $work->thumbnail ? asset('storage/' . $work->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                alt="{{ $work->title }}" class="w-full h-full">
        </div>
        <div class="mt-[24px] mb-[64px] flex flex-col gap-[8px] items-center">
            <div class="flex justify-center gap-[8px]">
                <div class="">
                    By <a
                        href="{{ route('works.all', ['creator' => $work->user->username]) }}">{{ $work->user->username }}</a>
                </div>
                <span> in </span><a
                    href={{ route('works.all', ['category' => $work->category->slug]) }}>{{ $work->category->name }}</a>
            </div>
            <div class="">{{ $work->created_at->diffForHumans() }}</div>
        </div>
        <article>
            <div>{!! $work->description ?? 'No Description' !!} </div>
        </article>
    </div>
</section>
