@extends('pages.layout')
@section('content')
@include('pages.banner')
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-tre">
                    <div class="a-1">
                        @foreach ($allPosts as $post)
                        <div class="row" style="margin: 5px">
                            <a href="">
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img height="250px"
                                            src="{{ asset('uploads/' . $post->image) }}"
                                            alt="{{ Str::slug($post->title) }}" /></a>
                                </div>
                                <div class="col-md-6 abt-left">
                                    <a
                                        href="{{ route('danh-muc.show', [$post->categoryPost->id, Str::slug($post->categoryPost->title)]) }}">
                                        <h6 style="margin-top:5px">{{ $post->categoryPost->title }}</h6>
                                    </a>
                                    <h3><a href="single.html">{{ $post->title }}</a></h3>
                                    <p>{!! substr($post->short_desc, 0, 200) !!}</p>
                                    <span style="float: right">{{ $post->created_at }}</span>
                                    <a href="{{ route('bai-viet.show', [$post->id]) }}">Read more</a>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                {!! $allPosts->links('pagination::bootstrap-4') !!}
            </div>
            <div class="col-md-4 about-right heading">
                <div class="abt-2">
                    <h3>NEW POSTS</h3>
                    @foreach ($newPosts as $post)
                    <a href="{{ route('bai-viet.show', [$post->id]) }}">
                        <div class="might-grid">
                            <div class="grid-might">
                                <a href="single.html"><img class="img-responsive" style="height: 63px; width: 102px"
                                        src="{{ asset('uploads/' . $post->image) }}"></a>
                            </div>
                            <div class="might-top">
                                <h4><a href="{{ route('bai-viet.show', [$post->id]) }}">{{ $post->title }}</a>
                                </h4>
                                <p>{!! substr($post->short_desc, 0, 100) !!}...</p>
                                <a href="{{ route('bai-viet.show', [$post->id]) }}">Read more</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="abt-2">
                    <h3>YOU MAY LIKE</h3>
                    <ul>
                        @foreach ($ranPosts as $post)
                        <li><a href="{{ route('bai-viet.show', [$post->id]) }}">{!! $post->title !!}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="abt-2">
                    <h3>NEWS LETTER</h3>
                    <div class="news">
                        <form>
                            <input type="text" value="Email" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Email';}" />
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection