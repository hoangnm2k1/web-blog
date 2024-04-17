@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">Edit category
                    <a href="/home" style="text-decoration: none"><< Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('category.update', [$category->id]) }}" autocomplete="on" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$category->title}}">
                            <input type="submit" name="editCate" value="Edit" class="btn btn-primary mt-2">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
