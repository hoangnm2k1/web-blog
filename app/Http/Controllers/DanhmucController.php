<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $showPosts = Post::where('post_category_id', $id)->orderBy('id', 'DESC')->paginate(3);
        $viewPosts = Post::orderBy('id', 'DESC')->where('post_category_id', $id)
        ->limit(5)->get();
        $categories = CategoryPost::all();
        $title_category = CategoryPost::find($id);
        $more_category = CategoryPost::where('id', '<>', $id)->get();
        return view('frontend.category', compact('categories', 'showPosts', 'title_category', 'viewPosts', 'more_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
