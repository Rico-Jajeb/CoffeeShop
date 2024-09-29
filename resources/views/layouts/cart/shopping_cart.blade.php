<x-layout>
   {{-- Page Title --}}
   <x-slot:title> Blogs  </x-slot:title>
   {{-- Text color of navigation --}}
   <x-slot:txtColor></x-slot:txtColor> 
   <x-slot:txtColor2> </x-slot:txtColor2> 
   <x-slot:txtColor3></x-slot:txtColor3> 
   <x-slot:txtColor4></x-slot:txtColor4> 

    <div class="bg-white h-[100vh]">
        <h1>Shopping Cart</h1>
        <br>
        <livewire:pages.cart.cart-item/>
    </div>

</x-layout>