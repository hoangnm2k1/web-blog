<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryPost::all();
        $allPosts = Post::orderBy('id', 'DESC')->paginate(5);
        $newPosts = Post::take(5)->get();
        $ranPosts = Post::orderBy(DB::raw('RAND()'))->limit(5)->get();
        return view('frontend.index', compact('categories', 'allPosts', 'newPosts', 'ranPosts'));
    }

    public function find(Request $request) {
        $key = $request->key;
        $foundPost = Post::where('title', 'LIKE', '%'. $key. '%')->orWhere('short_desc', 'LIKE', '%'. $key. '%')
        ->orWhere('content', 'LIKE', '%'. $key. '%')
        ->get();
        $categories = CategoryPost::all();
        return view('frontend.find', compact('key' ,'categories', 'foundPost'));
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
    public function show(string $id)
    {
        //
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
