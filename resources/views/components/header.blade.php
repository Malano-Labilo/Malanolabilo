<header x-data="{ open: false }" @click.outside="open = false"
    class="flex flex-col justify-center items-center bg-dark-first  text-white-first">
    <div x-data="{ isOpen: false }"
        class="container h-[64px] sticky top-0 px-[12px] flex gap-[16px] justify-between font-spaceGrotesk">
        <a href="{{ route('home') }}" class="flex items-center uppercase font-[500] text-[28px]">Malano.</a>
        <div class="w-full flex justify-end gap-[8px] ">
            <nav role="navigation"
                class="w-full sm:max-w-[444px] lg:max-w-[488px] hidden sm:flex justify-evenly items-center [&>*]:w-[72px] lg:[&>*]:w-[72px] [&>*]:text-center [&>*]:text-[16px] [&>*]:font-[500] [&>*]:capitalize [&>*]:hover:text-blue-plus [&>*]:hover:cursor-pointer [&>*]:hover:transition-all [&>*]:hover:duration-200 ">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-dark-first bg-white-first' : 'text-white-first bg-dark-first' }}">Home</a>
                {{-- <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-dark-first bg-white-first' : 'text-white-first bg-dark-first' }}">About</a> --}}
                <a href="{{ route('works') }}"
                    class="{{ request()->routeIs('works') ? 'text-dark-first bg-white-first' : 'text-white-first bg-dark-first' }}">Works</a>
                {{-- <a href="{{ route('contact') }}"
                    class="{{ request()->routeIs('contact') ? 'text-dark-first bg-white-first' : 'text-white-first bg-dark-first' }}">Contact</a> --}}
            </nav>
            {{-- burger menu --}}
            <button aria-label="Open menu" @click="open = !open" aria-label="Toggle navigation"
                :aria-expanded="open.toString()" aria-controls="mobile-nav" class="block sm:hidden">
                <x-elements-icon name="burger-menu" class="w-[32px] h-[32px]  fill-current text-white-first " />
            </button>

            <!-- Profile dropdown -->
            {{-- <div class="w-fit relative ml-3 flex items-center">
                @if (Auth::check())
                    <button type="button" @click="isOpen = !isOpen"
                        class="w-[48px] h-[48px] relative flex justify-center items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img class="w-[40px] h-[40px] rounded-full object-center object-cover"
                            src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/user-avatar.png') }}"
                            alt="{{ Auth::user()->username }}" />
                    </button>
                    <div x-show="isOpen"
                        class="absolute top-[44px] right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                        <div class="block px-4 py-2 text-sm text-dark-first">{{ Auth::user()->username }}</div>
                        <a href="/profile" class="block px-4 py-2 text-sm text-dark-first" role="menuitem"
                            tabindex="-1" id="user-menu-item-0">Your Profile</a>
                        <a href="/dashboard" class="block px-4 py-2 text-sm text-dark-first" role="menuitem"
                            tabindex="-1" id="user-menu-item-1">Settings</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="cursor-pointer block px-4 py-2 text-sm text-dark-first"
                                role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</button>
                        </form>
                    </div>
                @else
                    <a href="/login">Login</a> <span class="mx-[4px]"> | </span> <a href="/register">Register</a>
                @endif
            </div> --}}
        </div>
    </div>
    {{-- nav pada halaman mobile --}}
    <nav id="mobile-nav" role="navigation" x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="w-full absolute top-[64px] flex sm:hidden flex-col items-center bg-dark-first [&>*]:w-full [&>*]:py-[8px] [&>*]:text-center [&>*]:capitalize [&>*]:text-[16px] [&>*]:font-[500] [&>*]:text-white-first [&>*]:hover:bg-blue-second [&>*]:hover:text-blue-plus [&>*]:hover:cursor-pointer [&>*]:hover:transition-all [&>*]:hover:duration-200 ">
        <a href="{{ route('home') }}" @click="open = false">Home</a>
        {{-- <a href="{{ route('about') }}" @click="open = false">About</a> --}}
        <a href="{{ route('works') }}" @click="open = false">Works</a>
        {{-- <a href="{{ route('contact') }}" @click="open = false">Contact</a> --}}
    </nav>
</header>
