<?php

namespace App\Livewire\Pages\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\shopping_cart;
use App\Models\products;

class CartItem extends Component
{



    public $cart_items = [];
    public $products_info = [];

    public function mount()
    {
        $this->cart_items = shopping_cart::all();
        $this->products_info = products::all();
    }
    
    public function render()
    {
        // return view('livewire.pages.cart.cart-item', ['cart_items'=> $this->cart_items,]);
        return view('livewire.pages.cart.cart-item')->with([
            'cart_items'=> $this->cart_items,
            'products_info'=> $this->products_info,
            'user_id' => Auth::user()->id,
        ]);
       
    }
}
