<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center w-full h-screen bg-gray-100">
        <div class="w-9/12 h-5/6 shadow-md overflow-hidden sm:rounded-lg flex">
            <!-- Left side content -->
            <div class="w-1/2 bg-white h-full flex flex-col items-center justify-evenly">
                <!-- Top -->
                <div class="flex flex-col justify-start w-full p-4">
                    <h1 class="text-6xl text-lightdark font-semibold">Changing Lives, One Adoption at a Time.</h1>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/help.png') }}">
                </div>
            </div>

            <!-- Right side content (login form) -->
            <div class="flex items-center justify-center w-1/2">
                <form method="POST" action="{{ route('login') }}" class="flex flex-col items-start justify-start w-96 p-4">
                    @csrf

                    <h1 class="text-4xl font-semibold mt-4">
                        Log in
                    </h1>

                    <!-- Email Address -->
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="outline-none border-white shadow w-96" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Password -->
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="outline-none border-white shadow w-96" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <!-- Login Button -->
                        <x-primary-button type="submit" class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
