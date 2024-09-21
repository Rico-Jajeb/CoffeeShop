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

    //--------------------------------------- INSERT ---------------------------------------//

    // Products
    public function uploadImage(Request $request)
    {
        ini_set('memory_limit', '256M');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Allow up to 5MB images
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer|max:255',
            'product_cost_price' => 'required|integer|max:255',
            'product_description' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
        ]);

        $image = new products;
        // Generate a unique name 
        $imageName = time().'.'.$request->image->extension(); 

        try {
            $imageName = $this->processProductImage($request->file('image'));
            $image->product_image = $imageName;
        } catch (\Exception $e) {
            return back()->with('error', 'error processing the image.');
        }
        
        // Save the product details into the database
        $image->product_name = $request->input('product_name');
        $image->product_price = $request->input('product_price');
        $image->product_cost_price = $request->input('product_cost_price');
        $image->product_description = $request->input('product_description');
        $image->product_category = $request->input('product_category');
        $image->save();

        // Return success response
        return back()->with('success', 'You have successfully uploaded an image.');
    }



    // Product Category
    public function uploadCategory(Request $request)
    {
        ini_set('memory_limit', '256M');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string|max:255',
            'category_active' => 'required|string|max:255',
        ]);

        $cat = new product_category;
        // Generate a unique image name
        $imageName = time().'.'.$request->image->extension();

        try {
            //This use the process Image function
            $imageName = $this->processProductImage($request->file('image'));
            $cat->category_image = $imageName;
        } catch (\Exception $e) {
            return back()->with('error', 'error processing the image.');
        }

        // Save the Category details into the database
        $cat->category_image = $imageName;
        $cat->category_name = $request->category_name; 
        $cat->category_description = $request->category_description;
        $cat->category_active = $request->category_active;
        $cat->save();
    
        return back()->with('success', 'You have successfully uploaded and resized the image.');
    }











    //--------------------------------------- FOR PROCESSING THE IMAGE RESIZING ---------------------------------------//

    protected function processProductImage($image)
    {
        $imageName = time() . '.' . $image->extension();
    
        // Resize and save the image
        $imageResized = Image::make($image)
            ->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save(public_path('images/' . $imageName), 80); // Adjust quality for smaller file size
    
        return $imageName;
    }









    
    // public function uploadCategory(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'category_name' => 'required|string|max:255',
    //         'category_description' => 'required|string|max:255',
    //         'category_active' => 'required|string|max:255',
    //     ]);
    
    //     // Generate a unique image name
    //     $imageName = time().'.'.$request->image->extension();
    
    //     // Resize the image using Intervention Image
    //     $image = Image::make($request->file('image'))->resize(320, 240);
    
    //     // Save the resized image to the public/images folder
    //     $image->save(public_path('images/' . $imageName));
    
    //     // Create a new product category and save it in the database
    //     $cat = new product_category;
    //     $cat->category_image = $imageName;
    //     $cat->category_name = $request->category_name; 
    //     $cat->category_description = $request->category_description;
    //     $cat->category_active = $request->category_active;
    //     $cat->save();
    
    //     return back()->with('success', 'You have successfully uploaded and resized the image.');
    // }


}
