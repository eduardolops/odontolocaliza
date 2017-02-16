<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo SEO::generate(); ?>

    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />
    <meta name="revisit after" content="3 days" />
    <meta name="author" content="Odontolocaliza" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('images/fav-icon/57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('images/fav-icon/60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('images/fav-icon/72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('images/fav-icon/76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('images/fav-icon/114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('images/fav-icon/120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('images/fav-icon/144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('images/fav-icon/152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('images/fav-icon/180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/fav-icon/32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('images/fav-icon/96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/fav-icon/16x16.png')); ?>">
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/responsive/responsive.css')); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('css/theme/color-01.css')); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('css/bootstrap/bootstrap-multiselect.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/subscription-pricing.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/animate.min.css')); ?>">
    <link href="<?php echo e(asset('css/custom/jquery.multiselect.css')); ?>" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
   		<script src="<?php echo e(asset('js/html5shiv.js')); ?>"></script>
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

    
    <?php echo $__env->make('layout.structures.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    
    <?php echo $__env->yieldContent('content'); ?>

    <!-- ==================================== Footer ============================ -->
    <footer class="footer footer-default">
            <div class="row">                   
               <div class="container">
                    <nav class="row ">

                        <div class="col-xs-12 col-sm-12 col-md-3 espacamento">
                            <div class="footer-logo">
                                <a href="<?php echo route('home'); ?>">
                                    <img alt="Odontolocaliza - Seu Guia Odontológico" src="<?php echo e(asset('images/logo/logo.png')); ?>" class="img-responsive">
                                </a>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-2 espacamento">
                            <ul class="nav-social">
                                <li class="round_border transition3s">
                                    <a href="https://www.facebook.com/odontolocaliza/" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="round_border transition3s">
                                    <a href="https://www.instagram.com/odontolocaliza" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1">
                            <ul class="nav">
                                <li>
                                    <span style="font-size:14px;">Copyright © <?php echo date('Y'); ?> - Made with <i class="fa fa-heart"></i></span>
                                </li>
                                <li>
                                    <a href="http://bit.ly/2lTgkC4" target="_blank">
                                        <span style="font-size:14px;"><i class="fa fa-bug"></i> Reportar Erro</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

	</footer>
    <!-- ==================================== /Footer ============================ -->

    
    <?php echo $__env->make('layout.structures.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
</body>
</html>
