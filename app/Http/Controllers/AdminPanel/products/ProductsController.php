<?php

namespace App\Http\Controllers\AdminPanel\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;



// use App\Models\Image;
use App\Models\products;
use App\Models\product_category;


class ProductsController extends Controller
{
    // public function showUploadForm()
    // {
    //     return view('upload');
    // }

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

        $imagesize= Image::make($request->file('image'))->resize(320, 240);

        $imagesize->save(public_path('images/' . $imageName));

        $image = new products;
        $image->product_image = $imageName;
        $image->product_name = $request->product_name; // Set the product name
        $image->product_price = $request->product_price; // Set the product name
        $image->product_cost_price = $request->product_cost_price; // Set the product name
        $image->product_description = $request->product_description; // Set the product name
        $image->product_category = $request->product_category; // Set the product name
        $image->save();

        return back()->with('success','You have successfully uploaded an image.');
    }

    // public function uploadImage(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'product_name' => 'required|string|max:255',
    //         'product_price' => 'required|integer|max:255',
    //         'product_cost_price' => 'required|integer|max:255',
    //         'product_description' => 'required|string|max:255',
    //         'product_category' => 'required|string|max:255',
    //     ]);

    //     $imageName = time().'.'.$request->image->extension();  
    //     $request->image->move(public_path('images'), $imageName);

    //     $image = new Image;
    //     $image->product_image = $imageName;
    //     $image->product_name = $request->product_name; // Set the product name
    //     $image->product_price = $request->product_price; // Set the product name
    //     $image->product_cost_price = $request->product_cost_price; // Set the product name
    //     $image->product_description = $request->product_description; // Set the product name
    //     $image->product_category = $request->product_category; // Set the product name
    //     $image->save();

    //     return back()->with('success','You have successfully uploaded an image.');
    // }


    public function uploadCategory(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string|max:255',
            'category_active' => 'required|string|max:255',
        ]);
    
        // Generate a unique image name
        $imageName = time().'.'.$request->image->extension();
    
        // Resize the image using Intervention Image
        $image = Image::make($request->file('image'))->resize(320, 240);
    
        // Save the resized image to the public/images folder
        $image->save(public_path('images/' . $imageName));
    
        // Create a new product category and save it in the database
        $cat = new product_category;
        $cat->category_image = $imageName;
        $cat->category_name = $request->category_name; 
        $cat->category_description = $request->category_description;
        $cat->category_active = $request->category_active;
        $cat->save();
    
        return back()->with('success', 'You have successfully uploaded and resized the image.');
    }


    // public function uploadCategory(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'category_name' => 'required|string|max:255',
    //         'category_description' => 'required|string|max:255',
    //         'category_active' => 'required|string|max:255',
    //     ]);

    //     $imageName = time().'.'.$request->image->extension();
    //     $imagesize =$request->image->resize(320, 240);  
    //     $request->$imagesize->move(public_path('images'), $imageName);

    //     $cat = new product_category;
    //     $cat->category_image = $imageName;
    //     $cat->category_name = $request->category_name; // Set the product name
    //     $cat->category_description = $request->category_description; // Set the product name
    //     $cat->category_active = $request->category_active; // Set the product name
    //     $cat->save();

    //     return back()->with('success','You have successfully uploaded an image.');
    // }

    // public function uploadCategory(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'category_name' => 'required|string|max:255',
    //         'category_description' => 'required|string|max:255',
    //         'category_active' => 'required|string|max:255',
    //     ]);

    //     $imageName = time().'.'.$request->image->extension();  
    //     $request->image->move(public_path('images'), $imageName);

    //     $cat = new product_category;
    //     $cat->category_image = $imageName;
    //     $cat->category_name = $request->category_name; // Set the product name
    //     $cat->category_description = $request->category_description; // Set the product name
    //     $cat->category_active = $request->category_active; // Set the product name
    //     $cat->save();

    //     return back()->with('success','You have successfully uploaded an image.');
    // }










}
