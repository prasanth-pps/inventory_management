<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product/index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('product.create', ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'category_id' => 'required|unique:products,category_id,NULL,id,deleted_at,NULL',
            'product_name' => 'required|unique:products,product_name,NULL,id,deleted_at,NULL',
            'product_code' => 'required|unique:products,product_code,NULL,id,deleted_at,NULL',
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->hsn_code = isset($request->hsn) ? $request->hsn : '';
        if ($product->save()) {
            $message = \Lang::get('validation.success');
            return redirect('product')->with('success', $message);
        } else {
            $message = \Lang::get('validation.failure');
            return redirect('product/create')->with('failure', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categorys = Category::all();
        return view('product.edit', ['categorys' => $categorys], compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $products = Product::find($product->id);
        $products->category_id = isset($request->category_id) ? ($request->category_id) : "";
        $products->product_name = isset($request->product_name) ? ($request->product_name) : "";
        $products->product_code = isset($request->product_code) ? ($request->product_code) : "";
        $products->hsn_code = isset($request->hsn) ? ($request->hsn) : "";
        if ($products->save()) {
            $message = \Lang::get('validation.updated');
            return redirect('product')->with('updated', $message);
        } else {
            $message = \Lang::get('validation.failure');
            return redirect('product')->with('failure', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }
}
