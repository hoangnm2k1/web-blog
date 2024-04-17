@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">Create post
                        <a href="/api/post" style="text-decoration: none">
                            << Back</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('post.store') }}" autocomplete="on" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="">Title</label>
                                <input type="text" class="form-control mb-2" placeholder="Title..." name="title">
                                <label for="short_desc" class="">Short Describe</label>
                                <textarea type="text" class="form-control mb-2" name="short_desc" rows="5" id="ckeditor_short"
                                    placeholder="Short describe..." style="resize: none"></textarea>
                                <label for="content" class="">Content</label>
                                <textarea type="text" id="ckeditor_desc" class="form-control mb-2" name="content" rows="5"></textarea>
                                <label for="image" class="">Image</label>
                                <input type="file" class="form-control mb-2" placeholder="Image" name="image"
                                    onchange="previewImage(event)">
                                <img id="preview" src="#" alt="Preview Image"
                                    style="display: none; width: 200px; height: 140px; margin-bottom: 2px;">
                                <label for="category" class="">Category</label>
                                <select name="cate" class="form-select mb-1">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <input type="submit" name="createPost" value="Create" class="btn btn-primary mt-2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
