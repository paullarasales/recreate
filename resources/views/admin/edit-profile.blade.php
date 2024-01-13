<x-admin-layout>
    <div class="flex flex-row justify-start ml-10 items-center w-full h-screen">
        <!-- Content -->
        <div class="flex flex-col w-full h-5/6">
             <!-- Top -->
            <div class="flex flex-col w-full ml-3">
                <h1 class="text-2xl font-semibold">
                    Account Information
                </h1>
                <h2 class="text-lg font-semibold">
                    Manage your profile
                </h2>
            </div>
            <!-- Form -->
            <div class="flex w-full h-full ml-5">
                <div class="flex w-3/6 h-1/2">
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
    
                        <div class="flex items-center justify-start gap-2">
                            <div>
                                @if(Auth::user()->profile)
                                    <img class="w-20 h-20 rounded-full ml-2" src="{{ asset(Auth::user()->profile) }}" alt="Profile Image">
                                @endif
                            </div>
                            <div class="mt-10">
                                <x-file-input />
                            </div>
                        </div>
    
                        <div class="flex flex-row w-11/12 justify-between gap-4 items-center">
                            <div class="mb-2"> <!-- Add margin-bottom here -->
                                <x-input-label for="firstname" :value="__('First Name')" />
                                <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="firstname" />
                                <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
                            </div>
                        
                            <div class="mb-2"> <!-- Add margin-bottom here -->
                                <x-input-label for="lastname" :value="__('Last Name')" />
                                <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->lastname)" required autofocus autocomplete="lastname" />
                                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                            </div>
                        
                            <div class="mb-2"> <!-- Add margin-bottom here -->
                                <x-input-label for="name" :value="__('User Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </div>
                        
                        
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}
                
                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="flex items-center w-3/6 h-full ml-5">
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        
                        <h1 class="text-xl font-medium antiliased">
                            Password
                        </h1>

                        <div class="w-full">
                            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-96" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                
                        <div class="w-full">
                            <x-input-label for="update_password_password" :value="__('New Password')" />
                            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                
                        <div class="w-full">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>