<?php

namespace App\Http\Controllers;

 



use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\products;
use App\Models\product_category;


use Livewire\WithPagination;
use Livewire\Component;


class AdminPanelControllers extends Controller
{

    use WithPagination;

    public function products_page($category)
    {

        $products = products::where('product_category', $category)->paginate(5);

        $product_category = product_category::all(); //get all the data on images table
    
        // Pass both the filtered products, all products, and the category to the view
        return view('admin_panel/products/products', compact( 'products', 'category','product_category' ));
    }

    
    
    // public function products_page($category)
    // {
    //     // Filter products by the selected category
    //     $filteredProducts = products::where('category', $category)->get();
    
    //     // Get all products (if you still need to display all products somewhere on the page)
    //     $products = products::all();

    //     $product_category = product_category::all(); //get all the data on images table
    
    //     // Pass both the filtered products, all products, and the category to the view
    //     return view('admin_panel/products/products', compact('filteredProducts', 'products', 'category','product_category' ));
    // }
    

    public function products_category_page()
    {
        $product_category = product_category::all(); //get all the data on images table
        return view('admin_panel/products/product_category', compact('product_category'));
    }
 
}
