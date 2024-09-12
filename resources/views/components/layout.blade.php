<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">

        <nav class="flex flex-row">
            <section class="bg-green-300 p-6 basis-0 sm:basis-1/4">
                <div class="">
                    <h1>Logo</h1>
                </div>
            </section>
    
            <section class="bg-yellow-300 p-6 basis-0 sm:basis-1/2">
                <div class="">
                    <ul class="flex gap-3">
                        <li>
                            <a href="{{ route('main_page') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs_page') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us_page') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('services_page') }}">Services</a>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="basis-0 sm:basis-1/4" >
                <div class="">    
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
            </div>
            </section>
        </nav>
    
    
    
        <main class="bg-red-200">
            {{ $slot }}        
        </main>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>    

    </body>
</html>