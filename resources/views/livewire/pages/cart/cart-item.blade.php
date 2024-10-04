<div class="bg-red-200 flex justify-center pt-5 pb-5">
 

    <section class="bg-yellow-300 max-w-screen-lg w-full p-5 h-auto rounded-lg ">
        @foreach ($cart_items as $cart)
            @if ($user_id == $cart->user_id)
                @foreach ( $products_info as $products )
                    @if ($products->id == $cart->product_id)
                        <div wire:key="{{ $cart->id }}" class="flex justify-start bg-red-200"> 
                            <section class="flex justify-between  min-w-full">
                                <div class="flex items-center  ">
                                    <img  class="mt-2 p-1 h-32 w-32 m-auto rounded-lg" src="{{ asset('images/product_img/' . $products->product_image) }}" alt="{{ $products->product_name }}" />
                                    <div class="ml-2">
                                        <h5 class="  text-base font-semibold text-gray-500 dark:text-white text-wrap">Product name: <span class="text-[#ED500A] font-semibold text-xl">{{ $products->product_name}}</span> </h5>
                                        <h5 class=" text-base font-semibold text-gray-500 dark:text-white text-wrap">Price: <span class="text-gray-900 font-semibold text-lg">₱ {{ $products->product_price}}</span> </h5>
                                        <label for="" class="mt-5">Description: </label>
                                        <p class="pl-6 text-gray-500 dark:text-gray-400 text-wrap">{{$products->product_description}}</p> 
                                        
                                    </div>  
                                </div>
                                <div class="flex items-center gap-4  mr-3">

                                      <h5 class=" text-base font-semibold text-gray-500 dark:text-white text-wrap">Quantity: <span class="text-gray-900 font-semibold text-lg">₱ {{ $cart->cart_quantity}}</span> </h5> 
                                      <button wire:ignore  data-modal-target="popup-modal{{$cart->id}}" data-modal-toggle="popup-modal{{$cart->id}}" class="block " type="button">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                        </svg>                                                        
                                    </button>
                                    {{-- DELETE MODAL --}}
                                    <div wire:ignore id="popup-modal{{$cart->id}}" data-modal-backdrop="static" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{$cart->id}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                                    <section class="flex justify-center">
                                                        <form action="{{ route('delete_cart', $cart->id )}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button data-modal-hide="popup-modal{{$cart->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yes, I'm sure
                                                                </button>                                                                    
                                                        </form>   
                                                        <button data-modal-hide="popup-modal{{$cart->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>                                                                    
                                                    </section>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--END DELETE MODAL --}}
                                </div>

                                                           
                            </section>


                        </div>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    @endif  
                @endforeach                
            @endif
        @endforeach
    </section>



    
 
    
    
   
</div>
