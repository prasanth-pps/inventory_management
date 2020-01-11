<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        return view('category/index', ['categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category_name' => 'required|unique:categories,category_name,NULL,id,deleted_at,NULL',
        ]);
        $category = new category();
        $category->category_name = $request->category_name;
        $category->description = isset($request->description) ? $request->description : '';
        // $category->created_by       = Auth::id();
        if ($category->save()) {
            $message = \Lang::get('validation.success');
            return redirect('category')->with('success', $message);
        } else {
            $message = \Lang::get('validation.failure');
            return redirect('category/create')->with('failure', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name,' . $category->id . ',id,deleted_at,NULL',
        ]);
        $categorys = Category::find($category->id);
        $categorys->category_name = isset($request->category_name) ? ($request->category_name) : "";
        $categorys->description = isset($request->description) ? ($request->description) : "";
        if ($categorys->save()) {
            $message = \Lang::get('validation.updated');
            return redirect('category')->with('updated', $message);
        } else {
            $message = \Lang::get('validation.failure');
            return redirect('category')->with('failure', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categorys = Category::find($category->id);
        if ($categorys->delete()) {
            $message = \Lang::get('validation.deleted');
            return redirect('category')->with('deleted', $message);
        } else {
            $message = \Lang::get('validation.failure');
            return redirect('category')->with('failure', $message);

        }
    }

}
