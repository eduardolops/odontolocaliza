@extends('layout.template')

@section('content')

<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Dentista</h3>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ===================== Department detail page ================== -->
<section class="container">
	<div class="row">
		<div class="col-md-12 block-one">
			@if( $doctor->count() >= 1 )
				<div class="row">
					<div class="col-md-2">
						@if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) )
		                    <img src="{{ asset('storage/images/doctor/profile/'.$doctor->thumb) }}" alt="{!! $doctor->name !!}" class="img-thumbnail">
		                @else
		                    <img src="{{ asset('images/profile.jpg') }}" alt="Sem Imagem" class="img-thumbnail">
		                @endif
					</div>
					<div class="col-md-4 hearder-title">
						<h3>
							{!! title_case($doctor->name) !!}
						</h3>
						<p>CRO: {!! $doctor->number_cro !!}</p>

						<ul>
							@if( $doctor->social_facebook )
								<li class="round_border transition3s"><a href="{!! $doctor->social_facebook or '#' !!}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							@endif
							@if( $doctor->social_twitter )
								<li class="round_border transition3s"><a href="{!! $doctor->social_twitter or '#' !!}" target="_blank"><i class="fa fa-twitter"></i></a></li>
							@endif
							@if( $doctor->social_instagran )
								<li class="round_border transition3s"><a href="{!! $doctor->social_instagran or '#' !!}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							@endif
							@if( $doctor->social_gplus )
								<li class="round_border transition3s"><a href="{!! $doctor->social_gplus or '#' !!}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							@endif
						</ul>
					</div>
					@if( $gallery->count() >= 1 )
						<div class="col-md-6">
							<div id="carousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
								    @foreach( $gallery as $key => $img )
									    <li data-target="#carousel-example-generic" data-slide-to="{!! $key !!}" {!! $key == 0 ? 'class="active"' : '' !!}></li>
									@endforeach
								</ol>

								<div class="carousel-inner" role="listbox">
								    @foreach( $gallery as $key => $img )
									    <div class="item {!! $key == 0 ? 'active' : '' !!}">
								  			@if( !empty($img->filePath) && file_exists(public_path('storage/images/doctor/gallery/'.$img->filePath)) )
		                                        <img src="{{ asset('storage/images/doctor/gallery/'.$img->filePath) }}" alt="{!! $img->filePath !!}" style="width: 100%; height:auto;  max-height:359px;">
		                                    @else
		                                        <img src="{{ asset('images/no-img.png') }}" alt="Sem Imagem" style="width: 100%; height:auto;  max-height:359px;">
		                                    @endif
									    </div>
									@endforeach
								</div>

                                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="destaque"><i class="fa fa-map-marker"></i> Endereço</p><hr>
						<p>{!! title_case($doctor->address).', '.$doctor->number.' - '.title_case($doctor->neighborhood).', '.title_case($doctor->city_name).' - '.$doctor->state_uf !!}</p>
						@php 
							$complement = !empty($doctor->complement) ? '<p>Complemento: '.title_case($doctor->complement).'</p>' : '';
						@endphp
						{!! $complement !!}
						<p><i class="fa fa-calendar"></i> Horário de Atendimento: {!! $doctor->office_hours !!}</p>
						<p class="destaque">
							<i class="fa fa-phone"></i> {!! $doctor->phone !!} &nbsp&nbsp
							<i class="fa fa-mobile"></i> {!! $doctor->cell_phone !!}
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-7 col-xs-12">
						<p class="destaque chamada"><i class="fa fa-medkit"></i> Especialização:</p><hr>
						<ul>
							@foreach( $specializations as $specialization )
								<li>{!! $specialization->name !!}</li>
							@endforeach
						</ul>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-7 col-xs-12">
						<p class="destaque chamada"><i class="fa fa-hospital-o"></i> Convênios Odontológicos Aceitos:</p><hr>
						<ul>
							@foreach( $convenants_accepts as $convenants_accept )
								<li>{!! $convenants_accept->name !!}</li>
							@endforeach
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							@foreach( $complementaries as $complementary )
								<div class=" col-md-6">
				                    <p class="destaque"><i class="fa {!! $complementary['image'] !!}"></i> {!! $complementary['info_name'] !!}:</p><hr>
				                    {!! $complementary['description'] !!}
								</div>
							@endforeach
						</div>
					</div> 
					@if( $links->count() >= 1 )
						<div class="col-md-12 col-sm-7 col-xs-12">
							<p class="destaque chamada"><i class="fa fa-link"></i> Links Úteis:</p><hr>
							<ul>
								@foreach( $links as $uri )
									<li><a href="{!! $uri->link or '#' !!}" target="_blank">{!! $uri->link !!}</a></li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
				<div class="row" style="margin-top: 50px">
					<div class="col-lg-12 col-md-12 col-sm-7 col-xs-12 maps">
						<p class="destaque"><i class="fa fa-map" aria-hidden="true"></i> Localização</p><hr>
						<div id="google-map" data-latitude="{!! $geo['lat'] !!}" data-longitude="{!! $geo['long'] !!}"></div>
					</div>
				</div>
			@else
				<div class="text">
					<h3>Nenhum dentista encontrado :(</h3>
				</div>
			@endif
		</div>
	</div>
</section>
<!-- ===================== /Department details page ================== -->
@stop