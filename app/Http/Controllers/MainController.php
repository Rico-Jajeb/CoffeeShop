<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\products;

class MainController extends Controller
{
    public function main_page(){
        $products = products::all(); //get all the data on images table
        return view('main_page', compact('products'));
    }

    public function blogs_page(){
        return view('user_panel/blogs/blogs');
    }

    public function contact_us_page(){
        return view('user_panel/contact_us/contact_us');
    }

    public function services_page(){
        return view('user_panel/services/services');
    }


}
