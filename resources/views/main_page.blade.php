<x-layout>

    {{-- Page Title --}}
    <x-slot:title> Home </x-slot:title>
    {{-- Text color of navigation --}}
    <x-slot:txtColor> text-[#ED500A] </x-slot:txtColor> 
    <x-slot:txtColor2></x-slot:txtColor2> 
    <x-slot:txtColor3></x-slot:txtColor3> 
    <x-slot:txtColor4></x-slot:txtColor4> 

    <section class=" max-w-screen-2xl mx-auto flex flex-row">
        <div class=" h-screen mt-40 mb-10 ml-10 basis-2/6"> 
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
        <div class="  basis-4/6 flex  justify-center">
            <div class="ml-20 mt-20 ">
                <img class="w-[33vw] h-[33vw]  " src="{{asset('images/system_img/coffee cup-pana.svg')}}" alt="">
            </div>
             
        </div>
    </section>

<main class="bg-gray-700 pb-10 "  wire:init="loadPosts">
        <section class="mb-32 max-w-screen-2xl mx-auto ">
            <div class="flex items-center justify-center">
                <h1 class="mt-20 mb-4 text-4xl font-extrabold leading-none tracking-tight text-[#F8E6DE] md:text-5xl lg:text-6xl dark:text-white">Top Products</h1>            
            </div>
            <div class="flex flex-wrap justify-center gap-4 mt-28" wire:init="loadPosts">
                @foreach ($products as $image)
                    {{-- Products Cards --}}
                    <div class="w-80 h-[82]  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img wire:init="loadPosts" class=" p-1 h-64 w-full m-auto rounded-lg" src="{{ asset('images/product_img/' . $image->product_image) }}" alt="{{ $image->product_name }}" />
                        </a>
                        <div class="px-5 pb-3">
                            <h5 class="mt-2 text-2xl font-bold tracking-tight text-[#ED500A] dark:text-[#ED500A]">₱ {{ $image->product_price }}</h5>
                            <div class="flex items-center justify-between mt-2">
                                <span class=" w-52 text-xl font-semibold text-gray-900 dark:text-white truncate ">{{ $image->product_name}}</span>
                           

                                <button type="button" data-modal-target="progress-modal{{$image->id}}" data-modal-toggle="progress-modal{{$image->id}}"  class="text-white bg-[#ED500A] hover:bg-[#23C55E]  focus:ring-4 focus:outline-none focus:ring-[#ED500A] font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-[#ED500A] dark:hover:bg-[#ED500A] dark:focus:ring-[#ED500A]">
                                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                                    </svg>
                                </button>  
                            


                                    <!-- Main modal -->
                                    <div id="progress-modal{{$image->id}}" data-modal-backdrop="static"   tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="progress-modal{{$image->id}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5">
                                                    <span class=" w-52 text-xl font-semibold text-gray-900 dark:text-white truncate ">{{ $image->product_name}}</span>
                                                    <img wire:init="loadPosts" class="mt-2 p-1 h-64 w-full m-auto rounded-lg" src="{{ asset('images/product_img/' . $image->product_image) }}" alt="{{ $image->product_name }}" />
                                                 
                                                
                                                    <form action="{{ route('add_to_cart') }}" method="POST">
                                                        @csrf
                                                        <input class="hidden" type="text" name="product_id" id="" value="{{ $image->id }}">
                                                        <input class="hidden" type="text" name="user_id" id="" value="{{$userId = auth()->id();}}">

                                                        <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose quantity:</label>
                                                        <div class="relative flex items-center max-w-[8rem]">
                                                            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input{{$image->id}}" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                                </svg>
                                                            </button>
                                                            <input type="text" name="quantity" id="quantity-input{{$image->id}}" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="1" required />
                                                            <button type="button" id="increment-button" data-input-counter-increment="quantity-input{{$image->id}}" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                                          
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center mt-6 space-x-4 rtl:space-x-reverse">
                                                       
                                                        <button type="submit"  class="flex text-white bg-[#ED500A] hover:bg-[#23C55E]  focus:ring-4 focus:outline-none focus:ring-[#ED500A] font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-[#ED500A] dark:hover:bg-[#ED500A] dark:focus:ring-[#ED500A]">
                                                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                                                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                                                            </svg>add to cart
                                                        </button>                                                                      
                                                        <button data-modal-hide="progress-modal{{$image->id}}" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>    
</main>

{{-- <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose quantity:</label>
<div class="relative flex items-center max-w-[8rem]">
    <button type="button" id="decrement-button" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
        </svg>
    </button>
    <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="5" required />
    <button type="button" id="increment-button" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
        </svg>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const incrementButton = document.getElementById('increment-button');
        const decrementButton = document.getElementById('decrement-button');
        const quantityInput = document.getElementById('quantity-input');

        const min = parseInt(quantityInput.getAttribute('data-input-counter-min'), 10);
        const max = parseInt(quantityInput.getAttribute('data-input-counter-max'), 10);

        incrementButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value, 10);
            if (currentValue < max) {
                quantityInput.value = currentValue + 1;
            }
        });

        decrementButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value, 10);
            if (currentValue > min) {
                quantityInput.value = currentValue - 1;
            }
        });
    });
</script> --}}

   


    <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose quantity:</label>
    <div class="relative flex items-center max-w-[8rem]">
        <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
            </svg>
        </button>
        <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
        <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </button>
    </div>





</x-layout>
