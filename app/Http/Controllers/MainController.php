<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main_page(){
        return view('main_page');
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
