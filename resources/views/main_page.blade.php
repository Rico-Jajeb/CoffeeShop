<x-layout>

    {{-- Page Title --}}
    <x-slot:title> Home </x-slot:title>
    {{-- Text color of navigation --}}
    <x-slot:txtColor> text-[#ED500A] </x-slot:txtColor> 
    <x-slot:txtColor2></x-slot:txtColor2> 
    <x-slot:txtColor3></x-slot:txtColor3> 
    <x-slot:txtColor4></x-slot:txtColor4> 

    <section class="bg-[#0B0E14] flex">
        <div class=" mt-32 ml-32"> 
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

</x-layout>
