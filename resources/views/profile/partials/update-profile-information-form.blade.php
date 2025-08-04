@push('styles')
@endpush
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
                required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div class="">
            <div class="">
                <label for="avatar" class="text-sm/6 font-medium text-gray-900">Avatar</label>
                <input id="avatar" type="file" name="avatar"
                    accept=" image/jpg, image/jpeg, image/png, image/webp"
                    class=" rounded-md  @error('avatar') bg-red-200 ring-red-300 focus:border-red-400 placeholder:text-red-400 text-red-700 border-red-200 hover:border-red-300 @else placeholder:text-slate-400 text-slate-700 focus:border-slate-400 hover:border-slate-300 border-slate-200 @enderror px-2.5 py-1.5 text-sm font-semibold shadow-xs ring-1 ring-inset hover:bg-gray-50"></input>
            </div>
            @error('avatar')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
            <div class="">
                <div class="mt-2 flex items-center gap-x-3">
                    <img id="avatar-preview"
                        src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/user-avatar.png') }}"
                        alt="{{ $user->name }}" class="h-[88px] w-[88px] rounded-full bg-gray-50 object-cover">
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
@push('scripts')
    @vite('resources/js/filepond.js')
@endpush
