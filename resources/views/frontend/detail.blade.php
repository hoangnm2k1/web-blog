@extends('pages.layout')
@section('content')
<div class="single">
    <div class="container">
        <div class="col-md-8">
            <style type="text/css">
                .single-top img {
                    width: 100% !important;
                }
            </style>
            <div class="single-top">
                <a href="#"><img class="" src="{{ asset('uploads/' . $post->image) }}" alt=" "></a>
                <div class="single-grid">
                    <h4 style="text-align:center; font-weight: bold; font-size: 30px">{!! $post->title !!}</h4>
                    <ul class="blog-ic">
                        <li><a href="#"><span> <i class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
                        <li><span><i class="glyphicon glyphicon-time"> </i>{{ $post->created_at }}</span></li>
                        <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:145</span></li>
                    </ul>
                    {!! $post->content !!}
                </div>
                <div class="comments heading">
                    <h3>Comments</h3>
                </div>
                <div class="comment-bottom heading">
                    <h3>Leave a Comment</h3>
                    <form>
                        <input type="text" value="Name" onfocus="this.value='';"
                            onblur="if (this.value == '') {this.value ='Name';}">
                        <input type="text" value="Email" onfocus="this.value='';"
                            onblur="if (this.value == '') {this.value ='Email';}">
                        <input type="text" value="Subject" onfocus="this.value='';"
                            onblur="if (this.value == '') {this.value ='Subject';}">
                        <textarea cols="77" rows="6" value=" " onfocus="this.value='';"
                            onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="abt-2 about-right heading">
                <h3>Related</h3>
                @foreach ($relatePosts as $post)
                <a href="{{ route('bai-viet.show', [$post->id]) }}">
                    <div class="might-grid">
                        <div class="grid-might">
                            <a href="single.html"><img class="img-responsive" style="height: 63px; width: 102px"
                                    src="{{ asset('uploads/' . $post->image) }}"></a>
                        </div>
                        <div class="might-top">
                            <h4><a href="{{ route('bai-viet.show', [$post->id]) }}">{{ $post->title }}</a></h4>
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
@endsection