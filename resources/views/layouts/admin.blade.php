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
            <div class="flex items-center justify-between px-2 py-1">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><path fill="currentColor" d="M18.48 18.875c2.33-.396 4.058-2.518 4.321-5.053c.267-2.578.869-12.938-3.02-12.279c-10.088 1.711-9.38 18.702-1.301 17.332m13.273 0c8.077 1.37 8.785-15.621-1.303-17.333c-3.888-.659-3.287 9.701-3.021 12.279c.264 2.536 1.994 4.658 4.324 5.054M14.336 26.88c0-1.348-.481-2.57-1.256-3.459c-1.275-1.666-5.328-5.035-6.323-4.172c-2.077 1.806-2.01 6.251-.759 9.481c.643 1.796 2.196 3.059 4.011 3.059c2.389 0 4.327-2.198 4.327-4.909m29.137-7.631c-.993-.863-5.046 2.506-6.321 4.172c-.775.889-1.257 2.111-1.257 3.459c0 2.711 1.94 4.909 4.327 4.909c1.816 0 3.37-1.263 4.013-3.059c1.248-3.23 1.317-7.675-.762-9.481m-8.136 15.277c-3.676-1.833-3.562-5.363-4.398-8.584c-.665-2.569-3.02-4.469-5.823-4.469a6.007 6.007 0 0 0-5.779 4.312c-.895 3.082-.356 6.67-4.363 8.717c-3.255 1.061-4.573 2.609-4.573 6.27c0 2.974 2.553 6.158 5.848 6.554c3.676.554 6.544-.17 8.867-1.494c2.323 1.324 5.189 2.047 8.871 1.494c3.293-.396 5.847-3.568 5.847-6.554c-.001-3.741-1.235-5.135-4.497-6.246M31 39h-3.811l.005 4h-4.156l.006-4H19v-4h4.045l-.006-4h4.156l-.005 4H31z"/>
                    </svg>                                             
                    <span class="text-2xl text-black font-semibold antiliased"><span class="text-blue-500">ResQ</span>Pets<span class="text-blue-500">.</span></span>
                </div>
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
                        <div class="text-xl font-semibold">
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
                                                <p class="text-gray-600">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="ms-1">
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
            </nav>
            
            <div>
                {{ $slot }}
            </div>            
        </main>
    </div>
</body>
</html>