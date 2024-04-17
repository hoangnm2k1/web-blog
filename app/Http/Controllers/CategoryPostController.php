<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryPost::orderBy('id', 'ASC')->get();
        // $i = 0;
        return view('dashboard.category.index', compact('categories'));
        // return view('dashboard.category.index', compact('categories', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new CategoryPost();
        $category->title = $request->title;
        $category->save();
        return redirect()->to('/api/category/create');
        // return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryPost)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryPost)
    {
        $categoryUpdate = CategoryPost::find($categoryPost);
        $categoryUpdate->title = $request->title;
        $categoryUpdate->save();
        return redirect('/api/category');
        // return redirect()->route('category.index')->with('success', 'Category updated successfully'); -> api not work
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        $category->delete();
        return redirect('api/category');

    }
}
