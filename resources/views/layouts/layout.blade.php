<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Move Cargo a Transportation Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Move Cargo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/assets/css/JiSlider.css" rel="stylesheet"> 
<link href="/assets/css/index.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/assets/css/flexslider.css" type="text/css" media="screen" property="" />
<!-- Owl-carousel-CSS -->
<link href="/assets/css/owl.carousel.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="/assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,900" rel="stylesheet">
<script type="text/javascript" src="/assets/js/jquery-2.1.4.min.js"></script>
{!! Charts::styles() !!}
</head>
	
<body>
<!-- banner -->
<div class="main_section_agile">
		<div class="agileits_w3layouts_banner_nav">
		   
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<h1><a class="navbar-brand" href="/"><i class="fa fa-plane" aria-hidden="true"></i> Công ty vận chuyển <span>Global Services</span></a></h1>

				</div>
				
				 <ul class="agile_forms">
				 	@if (!Auth::check())
					<li><a href="#" id="btnTrigger1" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign In</a> </li>
					<li><a href="#" id="btnTrigger" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up</a> </li>
					@elseif (Auth::user()->role==1)
					<li><a class="fa fa-pencil-square-o" href="/panel" class="effect-3">{{Auth::user()->name}}</a></li>
					<li><a class="fa fa-pencil-square-o" href="/logout" class="effect-3">Logout</a></li>
					@elseif (Auth::user()->role==2)
					<li><a class="fa fa-pencil-square-o" href="/driver" class="effect-3">{{Auth::user()->name}}</a></li>
					<li><a class="fa fa-pencil-square-o" href="/logout" class="effect-3">Logout</a></li>
					@else
					<li><a class="fa fa-pencil-square-o" href="/customer" class="effect-3">{{Auth::user()->name}}</a></li>
					<li><a class="fa fa-pencil-square-o" href="/logout" class="effect-3">Logout</a></li>
					
					@endif
				</ul>
				

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li class="active"><a href="/" class="effect-3">Home</a></li>
							<li><a href="services" class="effect-3">Services</a></li>
							<li><a href="gallery" class="effect-3">Gallery</a></li>
							<li><a href="mail" class="effect-3">Mail Us</a></li>
							
						</ul>
					</nav>

				</div>
			</nav>	
<div class="clearfix"> </div> 
		</div>
</div>

@yield('content')

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_agile_footer_grids">
				<div class="col-md-4 w3_agile_footer_grid">
					<h3>Latest Tweets</h3>
					<ul class="agile_footer_grid_list">
						<li><i class="fa fa-twitter" aria-hidden="true"></i>Nam libero tempore, cum soluta nobis est eligendi optio 
							cumque nihil impedit. <span>1 day ago</span></li>
						<li><i class="fa fa-twitter" aria-hidden="true"></i>Itaque earum rerum hic tenetur a sapiente delectus <a href="mailto:info@mail.com">info@mail.com</a>
							cumque nihil impedit. <span>2 days ago</span></li>
					</ul>
				</div>
				<div class="col-md-4 w3_agile_footer_grid">
					<h3>Navigation</h3>
					<ul class="agileits_w3layouts_footer_grid_list">
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="/">Home</a></li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="services">Services</a></li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="gallery">Gallery</a></li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i><a href="mail">Mail Us</a></li>
					</ul>
				</div>
				<div class="col-md-4 w3_agile_footer_grid">
					<h3>Instagram Posts</h3>
					<div class="w3_agileits_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal">
							<img src="/assets/images/7.jpg" alt=" " class="img-responsive" />
						</a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal">
							<img src="/assets/images/8.jpg" alt=" " class="img-responsive" />
						</a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal">
							<img src="/assets/images/3.jpg" alt=" " class="img-responsive" />
						</a>
					</div>
					<div class="w3_agileits_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal">
							<img src="/assets/images/2.jpg" alt=" " class="img-responsive" />
						</a>
					</div>
					<div class="w3_agileits_footer_grid_left">
					<a href="#" data-toggle="modal" data-target="#myModal">
							<img src="/assets/images/4.jpg" alt=" " class="img-responsive" />
						</a>
					</div>
					<div class="w3_agileits_footer_grid_left">
					<a href="#" data-toggle="modal" data-target="#myModal">
							<img src="/assets/images/1.jpg" alt=" " class="img-responsive" />
						</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3_newsletter_footer_grids">
				<div class="w3_newsletter_footer_grid_left">
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Enter Your Email...." required="">
						<input type="submit" value="SEND">
					</form>
				</div>
			</div>
			<div class="w3ls_address_mail_footer_grids">
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<p>3481 Melrose Place, Beverly Hills, <span>New York City 90210.</span></p>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<p>+(000) 123 4565 32 <span>+(010) 123 4565 35</span></p>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
					</div>
					<p><a href="mailto:info@example.com">info@example1.com</a> 
						<span><a href="mailto:info@example.com">info@example2.com</a></span></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="agileinfo_copyright">
				<p>© 2017 Move Cargo. All Rights Reserved | Design by <a href="https://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->

<!-- start-smoth-scrolling -->

<!-- //here ends scrolling icon -->
</body>
</html>
@if (session()->get('mess') =='register')
<script type="text/javascript">
	$('#btnTrigger').click();
</script>
@endif
@if (session()->get('mess') =='login')
<script type="text/javascript">
	$('#btnTrigger1').click();
</script>
@endif
@if (session()->get('mess') =='guest_fail')
<script type="text/javascript">
	$('#bnt_product').click();
</script>
@endif

@if (session()->has('guest_thanhcong'))
<script type="text/javascript">
	$('#bnt_product').click();
</script>
@endif

@if ($login =null)
<script type="text/javascript">
	$('#btnTrigger').click();
</script>
@endif

