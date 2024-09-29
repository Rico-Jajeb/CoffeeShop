<?php

namespace App\Livewire\Pages\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\shopping_cart;

class CartItem extends Component
{

    public $title = "Title";

    public $cart_items =[];


    public function mount()
    {
        $this->cart_items = shopping_cart::all();
    }
    
    public function render()
    {
        // return view('livewire.pages.cart.cart-item', ['cart_items'=> $this->cart_items,]);
        return view('livewire.pages.cart.cart-item')->with([
            'cart_items'=> $this->cart_items,
            'user_id' => Auth::user()->id,
        ]);
       
    }
}
