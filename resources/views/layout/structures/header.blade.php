<!-- ========================== Header ==================== -->
<header class="main_menu">
        
	<div class="container nav_wrapper">
		<nav class="navbar navbar-default">
		   <!-- Brand and toggle get grouped for better mobile display -->
		   <div class="navbar-header">
		   	<a class="navbar-brand" href="{!! route('home') !!}">
	        	<img alt="Brand" src="{{ asset('images/logo/logo.png') }}" class="img-responsive">
	      	</a>
		     <button type="button" style="background-color:#33BBE8; margin-top: -20px;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
		       <span class="sr-only">Toggle navigation</span>
		       {{-- <span class="icon-bar"></span>
		       <span class="icon-bar"></span>
		       <span class="icon-bar"></span> --}}
		       <span style="color: #fff">menu</span>
		     </button>
		   </div>
		   <!-- Collect the nav links, forms, and other content for toggling -->
		   <div class="collapse navbar-collapse" id="navbar-collapse-1">
		     <ul class="nav navbar-nav">
		       <li><a href="{!! route('home') !!}" class="transition-ease">Inicio</a></li>
		       <li><a href="{!! route('about') !!}" class="transition-ease">Sobre Nós</a></li>
		       <li><a href="{!! route('contact') !!}" class="transition-ease">Entre em Contato</a></li>
		       <li><a href="{!! route('sign') !!}" class="transition-ease btn btn-primary btn-dentist">Sou Dentista</a></li>
		     </ul>
		   </div><!-- /.navbar-collapse -->
		</nav>
	</div><!--  End of .nav_wrapper -->
</header>
<!-- ========================== /Header =================== -->