<?php

namespace App\Livewire\Pages\Products;

use App\Models\Image;
use App\Models\products;
use App\Models\product_category;


use Livewire\WithPagination;

use Livewire\Component;

class ProductTable extends Component
{

    public $category;

    // Capture the category via the mount method
    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $products = products::where('product_category', $this->category)->paginate(5);

        $product_category = product_category::all(); //get all the data on images table

        return view('livewire.pages.products.product-table',  [
            'products' => $products,
            'product_category' => $product_category,
            'category' => $this->category
        ])->layout('components.layout');
    }
}
