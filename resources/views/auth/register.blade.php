<x-guest-layout>
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

            <!-- Right side content (signup form) -->
            <div class="flex items-center justify-center w-1/2">
                <form method="POST" action="{{ route('register') }}" class="flex flex-col items-start justify-start w-96 p-4">
                    @csrf

                    <h1 class="text-4xl font-semibold mt-4">
                        Sign up
                    </h1>

                    <!-- Name -->
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="outline-border border-white shadow" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <!-- Email Address -->
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="outline-none border-white shadow" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Password -->
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="outline-none border-white shadow" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Confirm Password -->
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="outline-none border-white shadow" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('login') }}" class="no-underline text-sm font-medium text-gray-600 hover:text-gray-900">Already registered?<span class="text-blue-500">Login</span></a>
                        <!-- Login Button -->
                        <x-primary-button type="submit" class="h-10 w-3/6 rounded">Sign up</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>


