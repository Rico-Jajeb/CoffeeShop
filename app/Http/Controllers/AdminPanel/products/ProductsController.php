<?php

namespace App\Http\Controllers\AdminPanel\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\Image;

class ProductsController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer|max:255',
            'product_cost_price' => 'required|integer|max:255',
            'product_description' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $image = new Image;
        $image->product_image = $imageName;
        $image->product_name = $request->product_name; // Set the product name
        $image->product_price = $request->product_price; // Set the product name
        $image->product_cost_price = $request->product_cost_price; // Set the product name
        $image->product_description = $request->product_description; // Set the product name
        $image->product_category = $request->product_category; // Set the product name
        $image->save();

        return back()->with('success','You have successfully uploaded an image.');
    }
}
