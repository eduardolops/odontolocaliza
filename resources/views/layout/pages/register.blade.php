@extends('layout.template')

@section('content')
<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Registrar-se</h3>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ===================== Department detail page ================== -->
<section class="container">
    <div class="appointment register" id="register" style="margin-top:10px; margin-bottom:20px;">
        <div class="col-xs-12">
            <div class="col-xs-12 col-sm-6 col-md-12 well">
                @include('layout.structures.form-register-doctor')
            </div>
        </div>
    </div>
</section>

@stop