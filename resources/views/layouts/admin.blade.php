<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('images/psu.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,500;1,600&family=Rubik+Broken+Fax&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        body {
            font-family: 'poppins', sans-serif;
        }
    
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen">
       <!-- Sidebar -->
        <aside class="fixed h-full w-52 bg-black text-white px-2 py-4">
            <!-- Logo -->
            <div class="flex justify-center items-center">                                            
                <span class="text-3xl text-white font-semibold antialiased">
                    PetZone
                </span>
            </div>
        
            <!-- Navigation -->
            <nav class="flex flex-col mt-3 p-5 gap-7">
                <!-- Add your navigation links here -->
            </nav>
        </aside>

        <!-- Main Page -->
        <main class="flex-1 h-screen w-full overflow-hidden ml-52 p-2">
            <!-- Top bar -->
            <nav class="bg-white-100">
                <div class="mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between h-16 w-90">
                        <!-- Hello welcome back message -->
                        <div class="flex flex-col w-7/12">
                            <h1 class="text-xl font-semibold">Hello, {{ Auth::user()->name}}</h1>
                            <p class="text-xs font-semibold text-gray-500">Explore and manage pet in here.</p>
                        </div>

                        <div class="flex items-center justify-evenly flex-row w-9/12">
                            <div class="flex w-96 ml-48">
                                <form action="" class="relative">
                                    <input type="text" name="search" class="outline-none border-white shadow w-96 h-10 pr-2 pl-8 rounded-md" placeholder="Search">
                                    <svg class="absolute left-3 top-3 h-4 w-4 text-gray-500 font-medium" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2"/>
                                        <circle cx="10" cy="10" r="8"/>
                                    </svg>
                                </form>
                            </div>

                            <!-- Notification -->
                            <div class="flex items-center justify-center w-6 ml-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                  </svg>
                            </div>

                            <!-- Settings Dropdown for User Options -->
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-lg rounded-md text-black-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div class="flex w-48">
                                            <div class="flex gap-2">
                                                @if(Auth::user()->profile)
                                                <img class="w-9 h-9 rounded-full ml-2" src="{{ asset(Auth::user()->profile) }}" alt="Profile Image">
                                                @endif
                                                <div class="flex flex-col items-center justify-center">
                                                    <p class="text-gray-800 font-medium">{{ Auth::user()->name }}</p>
                                                </div>
                                            </div>
                                            <div class="ms-1 mt-1">
                                                <svg class="fill-current h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
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
                </div>
            </nav>
            
            <div class="w-5/6 ml-auto mr-auto w-full">
                {{ $slot }}
            </div>            
        </main>
    </div>
</body>
</html>
