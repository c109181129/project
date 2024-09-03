<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="author" content="SemiColonWeb">
	<meta name="description" content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=PT+Serif:ital@0;1&display=swap" rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="{{asset('assets/style.css')}}">
    
	<!-- Font Icons -->   
	<link rel="stylesheet" href="{{asset('assets/css/font-icons.css')}}">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="{{asset('assets/demos/pet/pet.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}">
	<!-- Document Title
	============================================= -->
	<title>{{ $title }}</title>

</head>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">

		<!-- Header
		============================================= -->
		<header id="header" class="dark">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="{{route('user.auth.home')}}">
								<img class="logo-default" src="{{asset('assets/greensheiled/logo.png')}}" alt="Logo">
							</a>
						</div><!-- #logo end -->
						<div class="header-misc">
							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
							</div><!-- #top-search end -->
						</div>

						<div class="primary-menu-trigger">
							<button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
								<span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
							</button>
						</div>
						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

						<ul class="menu-container">
							@if (session()->has('user_id'))
								<li class="menu-item">
									<a class="menu-link" href="{{ route('user.auth.signout') }}">
										<div>登出</div>
									</a>
								</li>
								@if (session('user_type') == 'A')
									<li class="menu-item">
										<a class="menu-link" href="{{ route('merchandise.create') }}">
											<div>新增商品</div>
										</a>
									</li>
									<li class="menu-item">
										<a class="menu-link" href="{{ route('merchandise.manage') }}">
											<div>商品管理</div>
										</a>
									</li>
								@endif
								<li class="menu-item">
									<a class="menu-link" href="{{ route('merchandise.shop') }}">
										<div>商品頁面</div>
									</a>
								</li>
							@else
								<li class="menu-item">
									<a class="menu-link" href="{{ route('user.auth.login') }}">
										<div>登入</div>
									</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="{{ route('user.auth.signup') }}">
										<div>註冊</div>
									</a>
								</li>
							@endif
							<li class="menu-item">
								<a class="menu-link" href="{{ route('user.auth.home') }}">
									<div>首頁</div>
								</a>
							</li>
						</ul>


						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="{{ route('merchandise.search') }}" method="get">
							<input type="text" name="q" class="form-control" value="{{ old('q') }}" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>
					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

        @yield('content')

		<footer id="footer" class="dark">
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-8">

							<div class="row col-mb-50">
								<div class="col-md-4">

									<div class="widget">

										<img src="{{ asset('assets/greensheiled/logo.png')}}" alt="Image" class="footer-logo">

										<p>我們公司的宗旨為:讓顧客使用 <strong>最安全</strong>, <strong>無毒</strong> &amp; <strong>無添加</strong> 的健康塗料。</p>
										
										<div style="background: url('{{ asset('assets/images/world-map.png')}}')  no-repeat center center; background-size: 100%;">
											<address>
												<strong>綠盾塗料總部:</strong><br>
												地址:高雄市鹽埕區大智路10段888號<br>
											</address>
											<abbr title="Phone Number"><strong>來電請打:</strong></abbr>0800-092-000<br>
											<abbr title="free-contract"><strong>免費服務:</strong></abbr>(07)6520498<br>
											<abbr title="Email Address"><strong>電子信箱:</strong></abbr>greensheiled@gglife.com
										</div>

									</div>

								</div>

								<div class="col-md-4">

									<div class="widget widget_links">

										<h4>產品介紹</h4>

										<ul>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 1]) }}">P-731自潔型防水隔熱彈性漆</a></li>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 4]) }}">P-999 節能漆</a></li>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 5]) }}">P-800 逆轉滲</a></li>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 6]) }}">P-916 磁磚專用接著底漆</a></li>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 7]) }}">防水專用抗裂聚酯網</a></li>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 8]) }}">P-617 水性彩色彈性防水膠</a></li>
											<li><a href="{{ route('merchandise.thing', ['merchandise_id' => 9]) }}">P-255 單液型彈泥</a></li>
										</ul>

									</div>

								</div>

								<div class="col-md-4">

									<div class="widget">
										<h4>新產品</h4>

										<div class="posts-sm row col-mb-30" id="post-list-footer">
											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="{{ route('merchandise.thing', ['merchandise_id' => 10]) }}">(P-226 單液型油性透明防水膠)</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>2024/08/16</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="{{ route('merchandise.thing', ['merchandise_id' => 11]) }}">(	P-090 壓克力彈性水泥防水材)</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>2024/08/17</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>

						<div class="col-lg-4">

							<div class="row col-mb-50">
								<div class="col-md-4 col-lg-12">
									<div class="widget">

										<div class="row col-mb-30">
											<div class="col-lg-6">
												<div class="counter counter-small"><span data-from="50" data-to="30678" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
												<h5 class="mb-0">造訪人數</h5>
											</div>

											<div class="col-lg-6">
												<div class="counter counter-small"><span data-from="0" data-to="2000" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
												<h5 class="mb-0">客戶</h5>
											</div>
										</div>

									</div>
								</div>

								<div class="col-md-5 col-lg-12">
									<div class="widget subscribe-widget">
										<h5>想要知道我們的最新產品消息?</h5>
										<div class="widget-subscribe-form-result"></div>
										<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
											<div class="input-group mx-auto">
												<div class="input-group-text"><i class="bi-envelope-plus"></i></div>
												<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="輸入你的電子郵件">
												<button class="btn btn-success" type="submit">訂閱我們</button>
											</div>
										</form>
									</div>
								</div>

								<div class="col-md-3 col-lg-12">
									<div class="widget">

										<div class="row col-mb-30">
											<div class="col-6 col-md-12 col-lg-6 d-flex align-items-center">
												<a href="https://zh-tw.facebook.com/" class="social-icon text-white border-transparent bg-facebook me-2 mb-0 float-none">
													<i class="fa-brands fa-facebook-f"></i>
													<i class="fa-brands fa-facebook-f"></i>
												</a>
												<a href="https://zh-tw.facebook.com/" class="ms-1"><small class="d-block"><strong>Like Us</strong><br>on Facebook</small></a>
											</div>
											<div class="col-6 col-md-12 col-lg-6 d-flex align-items-center">
												<a href="#" class="social-icon text-white border-transparent bg-rss me-2 mb-0 float-none">
													<i class="fa-solid fa-rss"></i>
													<i class="fa-solid fa-rss"></i>
												</a>
												<a href="{{route('user.auth.home')}}" class="ms-1"><small class="d-block"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
											</div>
										</div>

									</div>
								</div>

							</div>

						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row col-mb-30">

						<div class="col-md-6 text-center text-md-start">
							Copyrights &copy; 2024 All Rights Reserved by Greensheiled Inc.<br>
							<div class="copyright-links"><a href="{{route('user.auth.home')}}">首頁</a> / <a href="{{route('user.auth.login')}}">登入頁面</a></div>
						</div>

						<div class="col-md-6 text-center text-md-end">
							<div class="d-flex justify-content-center justify-content-md-end mb-2">
								<a href="https://zh-tw.facebook.com/" class="social-icon border-transparent si-small h-bg-facebook">
									<i class="fa-brands fa-facebook-f"></i>
									<i class="fa-brands fa-facebook-f"></i>
								</a>
							</div>

							<i class="bi-envelope"></i> greensheiled@gglife.com <span class="middot">&middot;</span> <i class="fa-solid fa-phone"></i> (07)6520498 <span class="middot">&middot;</span> <i class="bi-skype"></i> greensheiled
						</div>

					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>
	<!-- JavaScripts
	============================================= -->
	<script src="{{asset('assets/js/functions.js')}}"></script>
</body>
</html>