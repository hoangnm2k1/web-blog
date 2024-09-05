<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-one">
                    <h3>{{ $title_category->title }}</h3>
                </div>
                <div class="about-two">
                    <ul>
                        <li>
                            <p>Share : </p>
                        </li>
                        <li><a href="#"><span class="fb"> </span></a></li>
                        <li><a href="#"><span class="twit"> </span></a></li>
                        <li><a href="#"><span class="pin"> </span></a></li>
                        <li><a href="#"><span class="rss"> </span></a></li>
                        <li><a href="#"><span class="drbl"> </span></a></li>
                    </ul>
                </div>
                <div class="about-tre">
                    <div class="a-1">
                        @foreach ($showPosts as $post)
                        <a
                            href="{{ route('danh-muc.show', [$post->categoryPost->id, Str::slug($post->categoryPost->title)]) }}">
                            <h6 style="margin-top:5px">{{ $post->categoryPost->title }}</h6>
                        </a>
                        <div class="row" style="margin: 5px">
                            <div class="col-md-6 abt-left">
                                <img height="250px" src="{{ asset('uploads/' . $post->image) }}"
                                    alt="{{ Str::slug($post->title) }}" />
                            </div>
                            <div class="col-md-6 abt-left">
                                <h6 style="margin-top:5px">{{ $post->categoryPost->title }}</h6>
                                <h3>{{ $post->title }}</h3>
                                <p>{!! $post->short_desc !!}</p>
                                <span style="float: right">{{ $post->created_at }}</span>
                                <a href="{{ route('bai-viet.show', [$post->id]) }}">Read more</a>
                            </div>
                        </div>
                        @endforeach

                        <div class="clearfix"></div>
                        {{-- {{ $showPosts->links() }} --}}
                        {!! $showPosts->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 about-right heading">
                {{-- <div class="abt-1">
                    <h3>ABOUT US</h3>
                    <div class="abt-one">
                        <img src="{{ URL::asset('images/c-2.jpg')}}" alt="" />
                        <p>Quisque non tellus vitae mauris luctus aliquam sit amet id velit. Mauris ut dapibus nulla, a
                            dictum neque.</p>
                        <div class="a-btn">
                            <a href="single.html">Read More</a>
                        </div>
                    </div>
                </div> --}}
                <div class="abt-2">
                    <h3>SEE MORE</h3>
                    <ul>
                        @foreach ($more_category as $cate)
                        <li><a href="{{ route('danh-muc.show', [$cate->id, Str::slug($cate->title)]) }}">{{ $cate->title
                                }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="abt-2">
                    <h3>YOU MIGHT ALSO LIKE</h3>
                    @foreach ($viewPosts as $post)
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
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
</div>