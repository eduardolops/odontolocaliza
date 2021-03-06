@extends('layout.template')

@section('content')

<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Sou Dentista</h3>
			<ul>
				<li>
					<a href="{!! url('login') !!}" class="btn button btn-block" style="color:#fff !important">Logar no Painel</a>
				</li>
				<li>
					<a href="{!! route('register') !!}" class="btn button btn-block" style="color:#fff !important">Quero me Cadastrar</a>
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ======================= Department =================== -->
<section class="jumbotron dentist-block itwork-block">
    <div class="container">
        <div class="title">
            <h3>Como funciona</h3>
        </div>
        <div class="col-md-10 col-md-offset-1 text-center">
            <div class="col-md-4 col-sm-4">
                <div class="col-md-12">
                    <img src="{{ asset('images/step-1.png') }}" alt="" class="img-responsive img">
                </div>
                <div class="col-md-12 bg-blue-light">
                    <div class="pad">
                        <p>Em sites de busca o cliente realiza a procura pelo seu <strong>dentista</strong> ou <strong>consultório</strong>.</p>
                        <p><i class="fa fa-check fa-2x" aria-hidden="true"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="col-md-12">
                    <img src="{{ asset('images/step-2.png') }}" alt="" class="img-responsive img">
                </div>
                <div class="col-md-12 bg-blue-light">
                    <div class="pad">
                        <p>No resultado ele encontra seus dados em destaque pela <strong>Odontolocaliza</strong>.</p>
                        <p><i class="fa fa-check fa-2x" aria-hidden="true"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="col-md-12">
                    <img src="{{ asset('images/step-3.png') }}" alt="" class="img-responsive img">
                </div>
                <div class="col-md-12 bg-blue-light">
                    <div class="pad">
                        <p>O cliente entra em contato com o consultório para <strong>agendar sua consulta</strong>.</p>
                        <p><i class="fa fa-check fa-2x" aria-hidden="true"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="jumbotron jumbotron-block">
    <div class="container">
        <div class="title">
            <h3>
                CADASTRE-SE E EXPERIMENTE POR <strong class="blue-light">10 DIAS GRÁTIS</strong> SEM CUSTO ALGUM, APÓS O TÉRMINO DO TESTE ATIVE SEU PLANO.
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">
                <a href="{!! route('register') !!}" class="btn btn-green btn-lg btn-block">EXPERIMENTE POR 10 DIAS GRÁTIS</a>
            </div>
        </div>
    </div>
</section>
<section class="jumbotron dentist-block top-block">
    <div class="container">
        <div class="title">
            <h3>Estamos no Topo</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="title-block-two">
                        <h4>Garanta <strong>visibilidade</strong> para seu consultório.</h4>
                        <h4>
                            A <strong class="blue-light">Odontolocaliza</strong> está nas <strong>primeiras páginas</strong> dos sites de busca.
                        </h4>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <img src="{{ asset('images/img-google.png') }}" alt="" class="img-responsive">
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<section class="jumbotron dentist-block our-plans-block" id="register">
    <div class="container">
        <div class="title">
            <h3>Nossos Planos</h3>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="block">
                    <div class="col-md-4 col-sm-6 ">
                            <ul class="pricing">
                                <li class="bg-blue-light">
                                    <big>{{ title_case($plans[0]->name) }}</big>
                                </li>
                                <li>
                                    Dados de localização e contato
                                </li>
                                <li>
                                    Áreas de atuação
                                </li>
                                <li>
                                    Foto ilustrativa + 5 fotos adicionais
                                </li>
                                <li>
                                    Qualificações e Convênios
                                </li>
                                <li>
                                    Link para site
                                </li>
                                <li class="bg-white" style="padding: 21.5px">
                                    <h3 class="blue-light">R$ {{ number_format($plans[0]->price, 2, ',', '') }}</h3>
                                    <span>por mês</span>
                                </li>
                                <li class="bg-white">
                                    <a href="{!! route('register') !!}" class="btn btn-pricing">EXPERIMENTE POR 10 DIAS GRÁTIS</a>
                                </li>
                            </ul>
                    </div>
                    <div class="col-md-4 col-sm-6">
                            <ul class="pricing">
                                <li class="bg-blue-light">
                                    <big>{{ title_case($plans[1]->name) }}</big>
                                </li>
                               <li>
                                    Dados de localização e contato
                                </li>
                                <li>
                                    Áreas de atuação
                                </li>
                                <li>
                                    Foto ilustrativa + 5 fotos adicionais
                                </li>
                                <li>
                                    Qualificações e Convênios
                                </li>
                                <li>
                                    Link para site
                                </li>
                                <li class="bg-white">
                                    <p style="margin-left:-80px; margin-bottom: -10px; font-size:13px">De <span style="text-decoration: line-through; ">R$ 104,70</span></p>
                                    <h3 class="blue-light">R$ {{ number_format($plans[1]->price, 2, ',', '') }}</h3>
                                    <span>10% desconto</span>
                                </li>
                                <li class="bg-white">
                                    <a href="{!! route('register') !!}" class="btn btn-pricing">EXPERIMENTE POR 10 DIAS GRÁTIS</a>
                                </li>
                            </ul>
                    </div>
                    <div class="col-md-4 col-sm-6">
                            <ul class="pricing">
                                <li class="bg-blue-light">
                                    <big>{{ title_case($plans[2]->name) }}</big>
                                </li>
                               <li>
                                    Dados de localização e contato
                                </li>
                                <li>
                                    Áreas de atuação
                                </li>
                                <li>
                                    Foto ilustrativa + 5 fotos adicionais
                                </li>
                                <li>
                                    Qualificações e Convênios
                                </li>
                                <li>
                                    Link para site
                                </li>
                                <li class="bg-white">
                                    <p style="margin-left:-80px; margin-bottom: -10px; font-size:13px">De <span style="text-decoration: line-through; ">R$ 209,40</span></p>
                                    <h3 class="blue-light">R$ {{ number_format($plans[2]->price, 2, ',', '') }}</h3>
                                    <span>15% desconto</span>
                                </li>
                                <li class="bg-white">
                                    <a href="{!! route('register') !!}" class="btn btn-pricing">EXPERIMENTE POR 10 DIAS GRÁTIS</a>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-md-offset-2">
                        <div class="text-center" style="margin-top:50px">
                            <h4>
                            Contrate qualquer um de nossos planos e tenha a sua disposição uma equipe qualificada para <strong>suporte técnico</strong>.
                            </h4>
                        </div>
                    </div>
                </div><!-- /block -->
            </div><!-- /col-md-12 -->
        </div><!-- /row -->
    </div>
</section>
<section class="jumbotron jumbotron-block">
    <div class="container">
        <div class="title">
            <h3>
                CADASTRE-SE E EXPERIMENTE POR <strong class="blue-light">10 DIAS GRÁTIS</strong> SEM CUSTO ALGUM, APÓS O TÉRMINO DO TESTE ATIVE SEU PLANO.
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">
                <a href="{!! route('register') !!}" class="btn btn-green btn-lg btn-block">EXPERIMENTE POR 10 DIAS GRÁTIS</a>
            </div>
        </div>
    </div>
</section>

@stop