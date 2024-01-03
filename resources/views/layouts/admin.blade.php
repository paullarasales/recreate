<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('images/psu.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins antialiased">
    <div class="relative h-full md:flex justify-between">
       <!-- Sidebar -->
        <aside class="z-10 bg-background w-52 border-solid  text-white px-2 py-4 absolute inset-y-0 left-0 md:relative transform -translate-x-full md:translate-x-0 transition ease-in-out-200 shadow-lg overflow-y-auto min-h-screen">
            <!-- Logo -->
            <div class="flex justify-center items-center">                                            
                <span class="text-2xl text-black font-semibold antialiased">
                    <span class="text-blue-500">ResQ</span>Pets<span class="text-blue-500">.</span>
                </span>
            </div>
            
            <!-- Navigation -->
            
            <nav class="flex flex-col mt-3 p-5 gap-7">
                
            </nav>


        </aside>


        <!-- Main Page -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top bar -->
            <nav class="bg-white shadow">
                <div class="mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between h-16 w-90">
                        <!-- Hello welcome back message -->
                        <div class="text-base font-semibold">
                            {{ __('Admin Dashboard')}}
                        </div>

                        <!-- Settings Dropdown for User Options -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-lg rounded-md text-black-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex justify-between w-56">
                                        <div class="flex gap-2">
                                            @if(Auth::user()->profile)
                                            <img class="w-8 h-8 rounded-full ml-2" src="{{ asset(Auth::user()->profile) }}" alt="Profile Image">
                                            @endif
                                            <div class="flex flex-col items-start w-28">
                                                <p class="text-gray-800">{{ Auth::user()->name }}</p>
                                                <p class="text-gray-600">{{ Auth::user()->usertype }}</p>
                                            </div>
                                        </div>
                                        {{-- <div class="ms-1">
                                            <svg class="fill-current h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div> --}}
                                    </div>
                                </button>
            
                                <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-1">
                                        <!-- Add other options like "Edit Profile" here -->
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Edit Profile') }}
                                        </x-dropdown-link>
            
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
            
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            
            <div>
                {{ $slot }}
            </div>            
        </main>
    </div>
</body>
</html>