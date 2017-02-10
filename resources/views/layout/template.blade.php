<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />
    <meta name="revisit after" content="3 days" />
    <meta name="author" content="{!! env('TITLE_SITE') !!}" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/fav-icon/57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/fav-icon/60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/fav-icon/72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/fav-icon/76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/fav-icon/114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/fav-icon/120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/fav-icon/144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/fav-icon/152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav-icon/180x180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav-icon/32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/fav-icon/96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/fav-icon/16x16.png') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive/responsive.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/theme/color-01.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/bootstrap/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/subscription-pricing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/animate.min.css') }}">

    <!--[if lt IE 9]>
   		<script src="{{ asset('js/html5shiv.js') }}"></script>
	<![endif]-->
</head>
<body class="home2">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- pre loader  -->
    <div id="loader-wrapper">
        <div id="loader">
        </div>
    </div>
    <!-- Scroll Top Button -->
    <button class="scroll-top transition3s">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>

    {{-- include header --}}
    @include('layout.structures.header')
    
    {{-- content --}}
    @yield('content')

    <!-- ==================================== Footer ============================ -->
    <footer class="footer footer-default">
            <div class="row">                   
               <div class="container">
                    <nav class="row ">

                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="footer-logo">
                                <a href="{!! route('home') !!}">
                                    <img alt="{!! env('TITLE_SITE', 'Odontolocaliza') !!}" height="30" src="{{ asset('images/logo/logo.png') }}" class="img-responsive">
                                </a>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2">
                            <ul class="nav-social">
                                <li class="round_border transition3s">
                                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="round_border transition3s">
                                    <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1">
                            <ul class="nav">
                                <li>
                                    <span style="font-size:14px;">Copyright © 2017 - Made with <i class="fa fa-heart"></i></span>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

	</footer>
    <!-- ==================================== /Footer ============================ -->

    {{-- include scripts --}}
    @include('layout.structures.scripts')
    
</body>
</html>
