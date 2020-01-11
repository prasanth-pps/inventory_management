<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function deletecategory(Request $request)
    {
        $category_id = $request->category_id;
        $delete_category = Category::
            Where('categories.id', $category_id)
            ->update(['categories.deleted_at' => now()]);
        if ($delete_category) {
            echo "0";
        } else {
            echo "1";
        }
    }

    public function deleteproduct(Request $request)
    {
        $product_id = $request->product_id;
        $delete_product = Product::
            Where('products.id', $product_id)
            ->update(['products.deleted_at' => now()]);
        if ($delete_product) {
            echo "0";
        } else {
            echo "1";
        }
    }
}
