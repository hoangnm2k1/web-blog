<!DOCTYPE html>
<html>
<head>
<title>Coffee Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Coffee Break Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="{{ URL::asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/easing.js') }}"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->
</head>
<body>
	<!--header-top-starts-->
    @include('pages.header-top')
    <!--header-top-end-->

	<!--start-header-->
    @include('pages.header')

    <!-- script-for-menu -->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!-- script-for-menu -->

    <!--banner-starts-->
    {{-- @include('pages.banner') --}}
	<!--banner-end-->

	<!--about-starts-->
    {{-- @include('pages.about') --}}
    @yield('content')
	<!--about-end-->

	<!--slide-starts-->
	@include('pages.slide')
	<!--slide-end-->

	<!--footer-starts-->
	@include('pages.footer')
	<!--footer-end-->
</body>
</html>
