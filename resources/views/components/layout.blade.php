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
    <body class="antialiased bg-[#0B0E14]">

        <nav class="max-w-screen-2xl mx-auto flex flex-row ">
            <section class="bg-[#0B0E14] pl-6 pr-6 pt-1 pb-1 basis-0 sm:basis-1/4 flex">
                <div class="bg-[#ED500A] p-2 ml-10">
                    <img class="h-16 w-16 " src="{{asset('images/1726140619.jpg')}}" alt="System Logo">
                </div>
            </section>
    
            <section class="bg-[#0B0E14] p-6 basis-0 sm:basis-1/2">
                <div class="">
                    <ul class="flex gap-6 sm:gap-16 text-base font-semibold text-[#F8E6DE] dark:text-white">
                        <li>
                            <a href="{{ route('main_page') }}" class="{{ $txtColor }}" wire:navigate wire:navigate.hover >Home</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs_page') }}" class="{{ $txtColor2 }}" wire:navigate wire:navigate.hover >Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us_page') }}"  class="{{ $txtColor3 }}" wire:navigate wire:navigate.hover>Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('services_page') }}"  class="{{ $txtColor4 }}" wire:navigate wire:navigate.hover>Services</a>
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

        @if ($message = Session::get('success'))    
            <section class="flex justify-center fixed top-20 left-0 right-0 z-50">
                <div id="alert-3" class="flex items-center  w-96 p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">       
                        {{ $message }}                           
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>            
            </section>
        @endif   
    
        <main class="">
            {{ $slot }}        
        </main>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>    

    </body>
</html>