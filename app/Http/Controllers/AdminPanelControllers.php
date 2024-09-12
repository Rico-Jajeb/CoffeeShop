<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class AdminPanelControllers extends Controller
{
    // public function products_page()
    // {
    //     return view('admin_panel/products/products');
    // }


    public function products_page()
    {
        $images = Image::all(); //get all the data on images table
        return view('admin_panel/products/products', compact('images'));
    }
}
