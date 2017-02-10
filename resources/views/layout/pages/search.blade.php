@extends('layout.template')

@section('content')

<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Resultados da busca</h3>
			Resultado da pesquisa: <b>{!! $doctors->count() !!}</b>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ===================== Department detail page ================== -->
<section class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 search-row">	
			@if( $doctors->count() >= 1 )
				<div class="row col-md-12">
					<div class="title_holder title_row">
						<h3>{!! str_replace('-', '', $page_title) !!}</h3>
						<span></span>
					</div>
				</div>
			@endif
			@forelse($doctors as $doctor)
				<div class="row block-row">
					<div class="col-md-2 ">
						@if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) )
		                    <img src="{{ asset('storage/images/doctor/profile/'.$doctor->thumb) }}" alt="{!! $doctor->name !!}" class="img-thumbnail">
		                @else
		                    <img src="{{ asset('images/profile.jpg') }}" alt="Sem Imagem" class="img-thumbnail">
		                @endif
					</div>
					<div class="col-md-4">
						@php
							$uri = [
									'state' => str_slug($doctor->state_name.'-'.$doctor->state_id, '-'), 
									'city'  => str_slug($doctor->city_name.'-'.$doctor->city_id, '-'),
									'name'  => str_slug($doctor->name.'-'.$doctor->id, '-')
								];
						@endphp
						<h3>
							<a href="{!! route('single_doctor', $uri) !!}" style="color:#25a9e0;">{!! title_case($doctor->name) !!}</a>
						</h3>
						<p>CRO: {!! $doctor->number_cro !!}</p>
						<p>
							{!! title_case($doctor->address).', '.$doctor->number.' - '.title_case($doctor->neighborhood).', '.title_case($doctor->city_name).' - '.$doctor->state_uf !!}
						</p>

						<a href="{!! route('single_doctor', $uri) !!}" class="main_button"><i class="fa fa-plus" aria-hidden="true"></i> Ver Perfil</a>
					</div>
				</div>
				<hr>
			@empty
				<div class="error_page" style="margin-top:120px">
			        <h2>Nenhum resultado encontrado :(</h2>
			        <p style="text-align:center; margin-top:-50px;">{!! str_replace('-', '', $page_title) !!}</p>
			        <a href="{!! route('home') !!}" class="button"><i class="fa fa-search" aria-hidden="true"></i> Faça uma nova Pesquisa</a>
			    </div>
			@endforelse
			@php
				$uri = [
							'state'           => request()->state,
							'city'            => request()->city,
							'specialization'  => request()->specialization,
							'plan'            => request()->plan,
							'name'            => request()->name,
						];
			@endphp
			<div class="text-center">
				{{ $doctors->appends($uri)->links() }}
			</div>
		</div>
	</div>
</section>
<!-- ===================== /Department details page ================== -->

@stop