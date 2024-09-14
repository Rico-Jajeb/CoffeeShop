<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script> --}}
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="antialiased ">

        <nav class="flex flex-row ">
            <section class="bg-[#0B0E14] pl-6 pr-6 pt-1 pb-1 basis-0 sm:basis-1/4 flex">
                <div class="bg-[#ED500A] p-2 ml-10">
                    <img class="h-16 w-16 " src="{{asset('images/1726140619.jpg')}}" alt="System Logo">
                </div>
            </section>
    
            <section class="bg-[#0B0E14] p-6 basis-0 sm:basis-1/2">
                <div class="">
                    <ul class="flex gap-6 sm:gap-16 text-base font-semibold text-[#F8E6DE] dark:text-white">
                        <li>
                            <a href="{{ route('main_page') }}" class="{{ $txtColor }}" >Home</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs_page') }}" class="{{ $txtColor2 }}" >Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us_page') }}"  class="{{ $txtColor3 }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('services_page') }}"  class="{{ $txtColor4 }}">Services</a>
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

        {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>     --}}

    </body>
</html>