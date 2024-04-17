<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use File;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::useBootstrap();
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        $categories = CategoryPost::all();
        return view('dashboard.post.index', compact('posts','categories'));
        // return Post::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryPost::all();
        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_desc = $request->short_desc;
        $post->content = $request->content;
        $post->post_category_id = $request->cate;

        if ($request->image) {
            $file = $request->image;
            $file_extension = $file->getClientOriginalExtension();
            $file_name = 'image' . uniqid() . '.' . $file_extension;
            $file->move(public_path('uploads'),$file_name);
            $post->image = $file_name;
        } else {
            $post->image = 'default.jpg';
        }
        $post->save();
        return redirect()->route('post.index');
   }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $editPost = Post::find($post);
        $categories = CategoryPost::all();
        return view('dashboard.post.edit', compact('editPost','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $editPost = Post::find($id);
        $editPost->title = $request->title;
        $editPost->short_desc = $request->short_desc;
        $editPost->content = $request->content;
        $editPost->post_category_id = $request->cate;

        if ($request->hasFile('image')) {
            if ($editPost->image != 'default.jpg') {
                unlink('uploads/' . $editPost->image);
            }
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = 'image' . uniqid() . '.' . $file_extension;
            $file->move(public_path('uploads'), $file_name);
            $editPost->image = $file_name;
        }

        $editPost->save();

        return redirect()->route('post.index')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        $delete_post = Post::find($post);
        if ($delete_post->image != 'default.jpg') {
            $path = public_path('uploads/' . $delete_post->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $delete_post->delete();
        return redirect('api/post');
    }
}
