<footer class="flex justify-center bg-dark-first text-white-first">
    <div class="container font-spaceGrotesk flex flex-col items-center gap-[56px] py-[72px]">
        <div class="logo">
            <a href="{{ route('home') }}"
                class="flex items-center font-spaceGrotesk uppercase font-[600] text-[20px]">Malano.</a>
        </div>
        <nav
            class="menu w-full max-w-[800px] [&>*]:w-full lg:[&>*]:w-[88px] flex flex-col lg:flex-row flex-wrap justify-evenly items-center gap-[24px] lg:gap-0 [&>*]:px-[12px] [&>*]:text-center [&>*]:text-[16px] [&>*]:font-[500] [&>*]:capitalize [&>*]:text-white-first [&>*]:hover:text-blue-plus [&>*]:hover:cursor-pointer [&>*]:hover:transition-all [&>*]:hover:duration-200">
            <a href="{{ route('home') }}">Home</a>
            {{-- <a href="{{ route('about') }}">About</a> --}}
            <a href="{{ route('works') }}">Works</a>
            {{-- <a href="{{ route('contact') }}">Contact</a> --}}
        </nav>
        <address
            class="contact w-full max-w-[800px] flex flex-col gap-[24px] lg:gap-0 lg:flex-row justify-between items-center not-italic [&>*]:px-[12px]">
            <p>malanolabilo@gmail.com</p>
            <p>Malang City, Indonesia</p>
            <p>+62 823 3790 0113</p>
        </address>
        <p class="credits">&#169; 2025 Malano Labilo. All rights reserved.</p>
    </div>
</footer>
