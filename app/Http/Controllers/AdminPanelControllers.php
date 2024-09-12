<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelControllers extends Controller
{
    public function products_page()
    {
        return view('admin_panel/products/products');
    }
}
