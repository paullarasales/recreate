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
    <div class="flex h-screen">
       <!-- Sidebar -->
        <aside class="fixed h-full w-52 bg-sidebar text-white px-2 py-4">
            <!-- Logo -->
            <div class="flex justify-center items-center">                                            
                <span class="text-2xl text-black font-semibold antialiased">
                    <span class="text-blue-500">ResQ</span>Pets<span class="text-blue-500">.</span>
                </span>
            </div>
            
            <!-- Navigation -->
            <nav class="flex flex-col mt-3 p-5 gap-7">
                <!-- Add your navigation links here -->
            </nav>
        </aside>

        <!-- Main Page -->
        <main class="flex-1 h-screen overflow-hidden p-10">
            <!-- Top bar -->
            <nav class="bg-white shadow">
                <!-- Your existing top bar code -->
            </nav>
            
            <div class="w-5/6 ml-52">
                {{ $slot }}
            </div>            
        </main>
    </div>
</body>
</html>
