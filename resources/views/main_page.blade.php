<x-layout>

    {{-- Page Title --}}
    <x-slot:title> Home </x-slot:title>
    {{-- Text color of navigation --}}
    <x-slot:txtColor> text-[#ED500A] </x-slot:txtColor> 
    <x-slot:txtColor2></x-slot:txtColor2> 
    <x-slot:txtColor3></x-slot:txtColor3> 
    <x-slot:txtColor4></x-slot:txtColor4> 

    <section class="bg-[#0B0E14] flex">
        <div class=" h-screen mt-40 mb-10 ml-32"> 
            <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Delicious Cafe</p>               
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-[#F8E6DE] md:text-5xl lg:text-6xl dark:text-white">Sweet Treats <br> <span class="text-[#ED500A] dark:text-[#ED500A]">Perfect Eats</span></h1>
            <button type="button" class="mt-14 text-white bg-[#ED500A] hover:bg-[#ED500A] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-[#ED500A] dark:hover:bg-[#ED500A] dark:focus:ring-[#ED500A]">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                Shop now
                </button>
                <button type="button" class="text-white  hover:bg-[#ED500A] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:hover:bg-[#ED500A] dark:focus:ring-[#ED500A]">
                Learn More
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>        
        </div>
    </section>

    <section class="mb-32">
        <div class="flex items-center justify-center">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Top Products</h1>            
        </div>
        <div class="flex gap-2">
            @foreach ($images as $image)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 rounded-t-lg h-64 w-full" src="{{ asset('images/' . $image->product_image) }}" alt="{{ $image->product_name }}" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $image->product_name }}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <h6 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $image->product_description }}</h6>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $image->product_price }}</span>
                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

</x-layout>
