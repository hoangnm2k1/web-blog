@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">Create category
                    <a href="/home" style="text-decoration: none"><< Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('category.store') }}" autocomplete="on" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Title..." name="title"></input>
                            <input type="submit" name="createCate" value="Create" class="btn btn-primary mt-2">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
