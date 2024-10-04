<?php

namespace App\Http\Controllers\AdminPanel\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\shopping_cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|min:0|max:1000000',
            'user_id' => 'required|integer|min:0|max:1000000',
            'quantity' => 'required|integer|min:1|max:1000000',
        ]);

        $carts = new shopping_cart;

        $carts->product_id = $request->input('product_id');
        $carts->user_id = $request->input('user_id');
        $carts->cart_quantity = $request->input('quantity');

        $carts->save();

        return back()->with('success', 'Cart success');
    }

    public function shopping_cart()
    {
        return view('layouts/cart/shopping_cart');
    }

    public function delete_cart($id)
    {
        $del_cart = shopping_cart::find($id);
        $del_cart -> delete();

        return back()->with('succes', 'Deleted successfully ');
    }
}
