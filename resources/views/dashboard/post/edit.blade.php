@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">Edit post
                        <a href="/home" style="text-decoration: none">
                            << Back</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('post.update', [$editPost->id]) }}" autocomplete="on" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title" class="">Title</label>
                                <input type="text" class="form-control mb-2" value="{{ $editPost->title }}"
                                    name="title">
                                <label for="short_desc" class="">Short Describe</label>
                                <textarea type="text" class="form-control mb-2" name="short_desc" rows="5" id="ckeditor_short"
                                    value="{{ $editPost->short_desc }}" style="resize: none"></textarea>
                                <label for="content" class="">Content</label>
                                <textarea type="text" id="ckeditor_desc" class="form-control mb-2" name="content" rows="5"
                                    value="{{ $editPost->content }}"></textarea>
                                <label for="image" class="">Image</label>
                                <input type="file" class="form-control mb-2" placeholder="Image" name="image">
                                <p><img src="{{ asset('uploads/' . $editPost->image) }}" style="width: 200px"></p>
                                <label for="category" class="">Category</label>
                                <select name="cate" class="form-select mb-1">
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $editPost->post_category_id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <input type="submit" name="editPost" value="Edit" class="btn btn-primary mt-2">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
