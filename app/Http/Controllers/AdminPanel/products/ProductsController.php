<?php

namespace App\Http\Controllers\AdminPanel\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use App\Http\Requests\upload_product_req_valid;

use App\Models\products;
use App\Models\product_category;


class ProductsController extends Controller
{


    // public function uploadImage(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
    //         'product_name' => 'required|string|max:255',
    //         'product_price' => 'required|integer|max:255',
    //         'product_cost_price' => 'required|integer|max:255',
    //         'product_description' => 'required|string|max:255',
    //         'product_category' => 'required|string|max:255',
    //     ]);

    //     $imageName = time().'.'.$request->image->extension(); 

    //     $imagesize= Image::make($request->file('image'))->resize(320, 240);

    //     $imagesize->save(public_path('images/' . $imageName));

    //     $image = new products;
    //     $image->product_image = $imageName;
    //     $image->product_name = $request->product_name; // Set the product name
    //     $image->product_price = $request->product_price; // Set the product name
    //     $image->product_cost_price = $request->product_cost_price; // Set the product name
    //     $image->product_description = $request->product_description; // Set the product name
    //     $image->product_category = $request->product_category; // Set the product name
    //     $image->save();

    //     return back()->with('success','You have successfully uploaded an image.');
    // }

    public function uploadImage(Request $request)
    {
        // Increase memory limit to handle larger images
        ini_set('memory_limit', '256M');

        // Validate the request inputs
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Allow up to 5MB images
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer|max:255',
            'product_cost_price' => 'required|integer|max:255',
            'product_description' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
        ]);

        // Generate a unique name for the image
        $imageName = time().'.'.$request->image->extension(); 

        // Process the image and resize it
        try {
            // Resize the image (use Image::make with chainable methods to avoid memory issues)
            $imageSize = Image::make($request->file('image'))
                ->resize(320, 240, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

            // Save the resized image to the public/images directory
            $imageSize->save(public_path('images/' . $imageName), 80); // Reduce image quality to 80 for lower file size
        } catch (\Exception $e) {
            return back()->withErrors(['image' => 'Error processing the image: ' . $e->getMessage()]);
        }

        // Save the product details into the database
        $image = new products;
        $image->product_image = $imageName;
        $image->product_name = $request->product_name;
        $image->product_price = $request->product_price;
        $image->product_cost_price = $request->product_cost_price;
        $image->product_description = $request->product_description;
        $image->product_category = $request->product_category;
        $image->save();

        // Return success response
        return back()->with('success', 'You have successfully uploaded an image.');
    }



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


}
