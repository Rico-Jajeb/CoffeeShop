<?php

namespace App\Http\Controllers\AdminPanel\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Intervention\Image\Facades\Image;

use App\Http\Requests\upload_product_req_valid;

use App\Models\products;
use App\Models\product_category;

class UpdateController extends Controller
{




   


    public function update_products(Request $request)
    {
        // Increase memory limit to handle larger images (if absolutely necessary)
        ini_set('memory_limit', '256M');
    
        // Validate the request inputs before finding the product
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Allow up to 5MB images, optional
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer|min:0|max:1000000',
            'product_cost_price' => 'required|integer|min:0|max:1000000',
            'product_description' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
        ]);
    
        // Find the product
        $product = products::findOrFail($request->input('product_id'));
    
        // Handle image processing in a separate method to clean up the main logic
        if ($request->hasFile('image')) {
            try {
                $imageName = $this->processProductImage($request->file('image'));
                $product->product_image = $imageName;
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Error processing the image: ' . $e->getMessage()]);
            }
        }
    
        // Update product details
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_cost_price = $request->input('product_cost_price');
        $product->product_description = $request->input('product_description');
        $product->product_category = $request->input('product_category');
        // Save the product changes
        $product->save();

        // Return success response
        return back()->with('success', 'Product updated successfully.');
    }


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










    // public function update_products(Request $request)
    // {
    //     // Increase memory limit to handle larger images
    //     ini_set('memory_limit', '256M');

    //     $product_id = $request->input('product_id');
    //     $product = products::findOrFail($product_id);

    //     // Validate the request inputs
    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Allow up to 5MB images, optional
    //         'product_name' => 'required|string|max:255',
    //         'product_price' => 'required|integer|min:0|max:1000000',
    //         'product_cost_price' => 'required|integer|min:0|max:1000000',
    //         'product_description' => 'required|string|max:255',
    //         'product_category' => 'required|string|max:255',
    //     ]);
    //     // Check if a new image is provided
    //     if ($request->hasFile('image')) {
    //         // Generate a unique name for the image
    //         $imageName = time() . '.' . $request->image->extension();
    //         // Process the image and resize it
    //         try {
    //             $imageSize = Image::make($request->file('image'))
    //                 ->resize(320, 240, function ($constraint) {
    //                     $constraint->aspectRatio();
    //                     $constraint->upsize();
    //                 });
    //             // Save the resized image to the public/images directory
    //             $imageSize->save(public_path('images/' . $imageName), 80); // Reduce image quality to 80 for lower file size
    //             // Save the image path to the product
    //             $product->product_image = $imageName;
    //         } catch (\Exception $e) {
    //             return back()->withErrors(['image' => 'Error processing the image: ' . $e->getMessage()]);
    //         }
    //     }

    //     // Update other product details
    //     $product->product_name = $request->input('product_name');
    //     $product->product_price = $request->input('product_price');
    //     $product->product_cost_price = $request->input('product_cost_price');
    //     $product->product_description = $request->input('product_description');
    //     $product->product_category = $request->input('product_category');
    //     // Save the product changes
    //     $product->save();

    //     // Return success response
    //     return back()->with('success', 'Product updated successfully.');
    // }


    // public function update_products(Request $request){

    //     // Increase memory limit to handle larger images
    //     ini_set('memory_limit', '256M');

    //     $product_ids = $request->input('product_id');

    //     $image =  products::findOrFail($product_ids);

    //     // Validate the request inputs
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Allow up to 5MB images
    //         'product_name' => 'required|string|max:255',
    //         'product_price' => 'required|integer|max:255',
    //         'product_cost_price' => 'required|integer|max:255',
    //         'product_description' => 'required|string|max:255',
    //         'product_category' => 'required|string|max:255',
    //     ]);

    //     $imageCheck = $request->input('image');

    //     // Generate a unique name for the image
    //     $imageName = time().'.'.$request->image->extension(); 

    //     // Process the image and resize it
    //     try {
    //         // Resize the image (use Image::make with chainable methods to avoid memory issues)
    //         $imageSize = Image::make($request->file('image'))
    //             ->resize(320, 240, function ($constraint) {
    //                 $constraint->aspectRatio();
    //                 $constraint->upsize();
    //             });

    //         // Save the resized image to the public/images directory
    //         $imageSize->save(public_path('images/' . $imageName), 80); // Reduce image quality to 80 for lower file size
    //     } catch (\Exception $e) {
    //         //  return back()->withErrors(['image' => 'Error processing the image: ' . $e->getMessage()]);
    //         return back()->with('success', 'You No Image.');
    //     }


    //     if(!empty($imageCheck) ){

    
    //              // Save the product details into the database
             
            
    //         $image->product_name = $request->input('product_name');
    //         $image->product_price = $request->input('product_price');
    //         $image->product_cost_price = $request->input('product_cost_price');
    //         $image->product_description = $request->input('product_description');
    //         $image->product_category = $request->input('product_category');
    //         $image->save();

    //         return back()->with('success', 'You Update.');

    //     }else{




    //             $image->product_image = $imageName;
    //              $image->product_name = $request->input('product_name');
    //              $image->product_price = $request->input('product_price');
    //              $image->product_cost_price = $request->input('product_cost_price');
    //              $image->product_description = $request->input('product_description');
    //              $image->product_category = $request->input('product_category');
    //              $image->save();
     
    //              return back()->with('success', 'You have successfully uploaded an image.'. $imageCheck);  
            
    //     }
    //     // Return success response
        
    //     return back()->with('success', 'You return');
    // }

    // public function update_products(Request $request, $id){

    //     // Increase memory limit to handle larger images
    //     ini_set('memory_limit', '256M');


    //     $image =  products::findOrFail($id);

    //     // Validate the request inputs
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Allow up to 5MB images
    //         'product_name' => 'required|string|max:255',
    //         'product_price' => 'required|integer|max:255',
    //         'product_cost_price' => 'required|integer|max:255',
    //         'product_description' => 'required|string|max:255',
    //         'product_category' => 'required|string|max:255',
    //     ]);

    //     // Generate a unique name for the image
    //     $imageName = time().'.'.$request->image->extension(); 

    //     // Process the image and resize it
    //     try {
    //         // Resize the image (use Image::make with chainable methods to avoid memory issues)
    //         $imageSize = Image::make($request->file('image'))
    //             ->resize(320, 240, function ($constraint) {
    //                 $constraint->aspectRatio();
    //                 $constraint->upsize();
    //             });

    //         // Save the resized image to the public/images directory
    //         $imageSize->save(public_path('images/' . $imageName), 80); // Reduce image quality to 80 for lower file size
    //     } catch (\Exception $e) {
    //         return back()->withErrors(['image' => 'Error processing the image: ' . $e->getMessage()]);
    //     }

       

    //     // Save the product details into the database
     
    //     $image->product_image = $imageName;
    //     $image->product_name = $request->product_name;
    //     $image->product_price = $request->product_price;
    //     $image->product_cost_price = $request->product_cost_price;
    //     $image->product_description = $request->product_description;
    //     $image->product_category = $request->product_category;
    //     $image->save();

    //     // Return success response
    //     return back()->with('success', 'You have successfully uploaded an image.');

    // }
}
