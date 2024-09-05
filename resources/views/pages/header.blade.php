<div class="header">
    <div class="container">
        <div class="head">
            <div class="navigation">
                <span class="menu"></span>
                <ul class="navig">
                    <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
                    {{-- <li><a href="about.html">About</a></li> --}}
                    @foreach ($categories as $cate)
                    <li><a
                            href="{{ route('danh-muc.show', [$cate->id, Str::slug($cate->title)]) }}">{{$cate->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="header-right">
                <form action="{{ route('home.find') }}" method="GET">
                    @csrf
                    <div class="search-bar">
                        <input type="text" value="Search" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Search';}" name="key">
                        <input type="submit" value="">
                    </div>
                </form>
                <ul style="margin-right: 25px">
                    <li><a href="#"><span class="fb"> </span></a></li>
                    <li><a href="#"><span class="twit"> </span></a></li>
                    <li><a href="#"><span class="pin"> </span></a></li>
                    <li><a href="#"><span class="rss"> </span></a></li>
                    <li><a href="#"><span class="drbl"> </span></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>