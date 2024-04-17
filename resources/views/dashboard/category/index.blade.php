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

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th scope="col">STT</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($categories as $item)
                                @php
                                    $i++
                                @endphp
                                    <tr class="text-center align-middle">
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$item->title}}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('category.edit', [$item->id])}}" style="text-decoration: none;
                                                padding-right: 5px">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                            </a>
                                            <form action="{{ route('category.destroy', [$item->id])}}" method="POST">
                                                @method('delete')
                                                <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit"
                                                class="btn btn-danger">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

