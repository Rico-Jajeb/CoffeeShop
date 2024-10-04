<x-layout>
   {{-- Page Title --}}
   <x-slot:title> Shopping Cart  </x-slot:title>
   {{-- Text color of navigation --}}
   <x-slot:txtColor></x-slot:txtColor> 
   <x-slot:txtColor2> </x-slot:txtColor2> 
   <x-slot:txtColor3></x-slot:txtColor3> 
   <x-slot:txtColor4></x-slot:txtColor4> 

    <div class="bg-white h-[100vh]">
        <h1 class="text-center text-lg font-extrabold pt-2">Shopping Cart</h1>
        <livewire:pages.cart.cart-item/>
    </div>

</x-layout>