<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="index, follow" />
    <meta name="generator" content="{{ config('app.version') }}" />
    <meta name="author" content="{{ getSetting('web_author') }}" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	{!! SEO::generate() !!}

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('po-content/uploads/'.getSetting('favicon')) }}" />
    <!-- Stylesheets
	============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/swiper.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/dark.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/font-icons.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/animate.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/magnific-popup.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('po-content/frontend/bpkad/css/style.css') }}" rel="stylesheet" type="text/css"/>

	@stack('styles')

    <script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>

	{!! NoCaptcha::renderJs() !!}

	@if(getSetting('google_analytics_id') != '')
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', "{{ getSetting('google_analytics_id') }}"]);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	@endif
</head>
<body class="sticky-footer stretched page-transition adaptive-color-scheme" data-loader="1" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800">
	<div id="wrapper" class="clearfix">
		<div id="top-bar" class="transparent-topbar">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-12 col-md-auto">
						<ul id="top-social">
                            <li><a href="{{ getSetting('facebook') }}" target="_blank" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                            <li><a href="{{ getSetting('twitter') }}" target="_blank" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                            <li><a href="{{ getSetting('facebook') }}" target="_blank" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                            <li><a href="{{ getSetting('youtube') }}" target="_blank" class="si-youtube"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<header id="header" class="transparent-header floating-header">
			<div id="header-wrap">
                <div class="container">
                    <div class="header-row">
                        <div id="logo">
							<a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset('po-content/uploads/'.getSetting('logo')) }}">
								<img src="{{ asset('po-content/uploads/'.getSetting('logo')) }}" alt="">
							</a>
						</div>
                        <div class="header-misc">
                            <div id="top-search" class="header-misc-icon">
                                <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                            </div>
                        </div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

			            <nav class="primary-menu with-arrows">
                                <ul class="menu-container">
                                    @each(getTheme('partials.menu'), getMenus(), 'menu', getTheme('partials.menu'))
                                </ul>
                        </nav>
                        <form class="top-search-form row" action="{{ url('search') }}" method="get">
                            <input type="text" name="terms" class="form-control" placeholder="Ketik &amp; Tekan Enter.." autocomplete="off">
                        </form>
				    </div>
                </div>
            </div>
		</header>

		@yield('content')

		<footer id="footer" class="light">
				<div class="container">
                    <div class="footer-widgets-wrap">
					        <div class="row">
						        <div class="col-md-4 col-sm-12">
							        <img class="footer-logo" src="{{ asset('po-content/uploads/'.getSetting('logo_footer')) }}" alt="" />
							            <p>{{ \Str::limit(strip_tags(getPages(1)->content), 200) }}</p>
							    <div class="footer-social">
									    <a href="{{ getSetting('facebook') }}" target="_blank" class="social-icon si-small si-rounded topmargin-sm si-facebook"> <i class="icon-facebook"></i> <i class="icon-facebook"></i></a>
									    <a href="{{ getSetting('twitter') }}" target="_blank" class="social-icon si-small si-rounded topmargin-sm si-twitter"> <i class="icon-twitter"></i> <i class="icon-twitter"></i></a>
                                        <a href="{{ getSetting('twitter') }}" target="_blank" class="social-icon si-small si-rounded topmargin-sm si-instagram"> <i class="icon-instagram"></i> <i class="icon-instagram"></i> </a>
									    <a href="{{ getSetting('youtube') }}" target="_blank" class="social-icon si-small si-rounded topmargin-sm si-youtube"> <i class="icon-youtube"></i> <i class="icon-youtube"></i></a>
							    </div>
						    </div>

						    <div class="col-md-4 col-sm-12 footer-widget">
							    <!-- <h3 class="widget-title">ALAMAT</h3>
							    <div class="working-hours">
								    <i class="fa fa-location-arrow"></i> {{ getSetting('address') }}
							    </div> -->
						    </div>

						    <div class="col-md-4 col-sm-12 footer-widget">
							    <h3 class="widget-title">SITEMAP</h3>
							    <ul class="list-arrow">
								    <li><a href="{{ url('/') }}">Home</a></li>
								    <li><a href="{{ url('pages/about-us') }}">About Us</a></li>
								    <li><a href="{{ url('pages/services') }}">Services</a></li>
								    <li><a href="{{ url('album/all') }}">Gallery</a></li>
								    <li><a href="{{ url('contact') }}">Contact</a></li>
							    </ul>
						    </div>
					    </div>
                    </div>
				</div>

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="copyright-info">
								<span>Copyright &copy; {{ date('Y') }} {{ getSetting('web_author') }}. All Rights Reserved.</a></span>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6">
							<div class="footer-menu">
								<ul class="nav unstyled">
									<li><a href="{{ url('pages/about-us') }}">About Us</a></li>
									<li><a href="{{ url('pages/services') }}">Services</a></li>
									<li><a href="{{ url('contact') }}">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>

<div id="gotoTop" class="icon-angle-up"></div>
				</div>
			</div>
		</footer>

		<script type="text/javascript" src="{{ asset('po-content/frontend/bpkad/js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('po-content/frontend/bpkad/js/plugins.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('po-content/frontend/bpkad/js/functions.js') }}"></script>

	 	@stack('scripts')
	</div>
</body>
</html>
