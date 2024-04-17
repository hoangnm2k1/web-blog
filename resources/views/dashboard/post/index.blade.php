@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"><a href="{{ route('post.create') }}">Create</a>
                        <a href="/home" style="text-decoration: none">
                            << Back</a>
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
                                        <th scope="col">Image</th>
                                        <th scope="col">Short description</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($posts as $item)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr class="text-center align-middle">
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ asset('uploads/' . $item->image) }}"
                                                    style="width: 220px; height: 140px;">
                                            </td>
                                            <td>
                                                @if (strlen($item->short_desc) > 100)
                                                    <div class="content-toggle">
                                                        <span class="short-content">{!! Str::limit(strip_tags(html_entity_decode($item->short_desc)), 100) !!}
                                                            <span class="more" style="color: blue">xem thêm</span></span>
                                                        <span class="full-content"
                                                            style="display: none;">{!! $item->short_desc !!}</span>
                                                        <span class="toggle-btn" style="color: blue"></span>
                                                    </div>
                                                @else
                                                    {!! html_entity_decode($item->short_desc) !!}
                                                @endif
                                            </td>
                                            <td class="content-column">
                                                @if (strlen($item->content) > 100)
                                                    <div class="content-toggle">
                                                        <span class="short-content">{!! Str::limit(strip_tags(html_entity_decode($item->content)), 100) !!}
                                                            <span class="more" style="color: blue">xem thêm</span></span>
                                                        <span class="full-content"
                                                            style="display: none;">{!! $item->content !!}</span>
                                                        <span class="toggle-btn" style="color: blue"></span>
                                                    </div>
                                                @else
                                                    {!! html_entity_decode($item->content) !!}
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($categories as $category)
                                                    @if ($category->id == $item->post_category_id)
                                                        {{ $category->title }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td colspan="2">
                                                <div class="d-flex flex-column">
                                                    <a href="{{ route('post.edit', [$item->id]) }}"
                                                        style="text-decoration: none;
                                                padding-right: 5px">
                                                        <button type="button" class="btn btn-warning mb-1 ms-1"
                                                            style="width:68.44px">Edit</button>
                                                    </a>
                                                    <form action="{{ route('post.destroy', [$item->id]) }}" method="POST">
                                                        @method('delete')
                                                        <button onclick="return confirm('Bạn có muốn xóa không?')"
                                                            type="submit" class="btn btn-danger">Delete
                                                        </button>
                                                    </form>
                                                </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav> --}}
                            {{ $posts->links() }}
                            {{-- {!! $posts->links('pagination::bootstrap-4') !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".content-toggle .more").click(function() {
                    $(this).closest(".content-toggle").find(".short-content").hide();
                    $(this).closest(".content-toggle").find(".full-content").show();
                    $(this).closest(".content-toggle").find(".toggle-btn").text("<<");
                });

                $(".content-toggle .toggle-btn").click(function() {
                    var shortContent = $(this).closest(".content-toggle").find(".short-content");
                    var fullContent = $(this).closest(".content-toggle").find(".full-content");

                    if (shortContent.is(":hidden")) {
                        shortContent.show();
                        fullContent.hide();
                        $(this).text("");
                    } else {
                        shortContent.hide();
                        fullContent.show();
                        $(this).text("...");
                    }
                });
            });
        </script>
        <script>
            // Lấy tất cả các hình ảnh trong cột
            var images = document.querySelectorAll('.content-column img');

            // Vòng lặp qua từng ảnh và điều chỉnh kích thước
            for (var i = 0; i < images.length; i++) {
                images[i].style.maxWidth = '100%'; // Thu nhỏ ảnh để nó không vượt quá kích thước của cột
                images[i].style.height = 'auto'; // Giữ tỷ lệ khung hình
            }
        </script>
        <style>
            .content-column {
                width: 700px !important;
                max-width: 700px;

                /* Đặt kích thước tối đa cho cột */
            }
        </style>
    @endsection
