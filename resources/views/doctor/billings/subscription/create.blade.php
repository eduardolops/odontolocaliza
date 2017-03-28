@extends('structures.admin_template')

@section('sidebar')
@include('doctor.menu_adm')
@stop

@section('content')
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        @if ( is_array($errors) )
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($errors as $k => $v)
                    @foreach($v as $erro)
                        {!! 'Erro: '. $k .' '.$erro. '<br>' !!}
                    @endforeach
                @endforeach
                <br>
                <p>Se você tiver alguma dúvida entre em contato conosco </p>
            </div>
        @endif
        <div class="box">
            <div class="row" style="margin-top:30px">
                <div class="block">
                    <div class="col-md-12" style="text-align:center; margin-bottom:25px; ">
                        <h4>
                            APROVEITE O TESTE <strong class="blue-light">GRÁTIS POR 10 DIAS</strong>. 
                        </h4>
                        <h4>
                            ATIVE SEU PLANO APÓS O PERÍODO DE TESTE PARA FAZER PARTE DO MELHOR PORTAL ODONTOLÓGICO DO BRASIL.
                        </h4>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4 col-sm-6 ">
                                <ul class="pricing p-blue">
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
                                    <li class="bg-white" style="padding:12.5px">
                                        <h3 class="blue-light">R$ {{ number_format($plans[0]->price, 2, ',', '') }}</h3>
                                        <span>por mês</span>
                                    </li>
                                    <li class="bg-white">
                                        <form role="form" method="post" action="{{ route('billings.subscription') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user" value="{{ Auth::guard($guard)->user()->id }}">
                                            <input type="hidden" name="plan" value="{{ $plans[0]->id }}">
                                            <button type="submit">EXPERIMENTE POR 10 DIAS GRÁTIS</button>
                                        </form>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                                <ul class="pricing p-blue">
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
                                        <p style="margin-left:-80px; margin-bottom:-20px; font-size:13px">De <span style="text-decoration: line-through; ">R$ 104,70</span></p>
                                        <h3 class="blue-light">R$ {{ number_format($plans[1]->price, 2, ',', '') }}</h3>
                                        <span>10% desconto</span>
                                    </li>
                                    <li class="bg-white">
                                        <form role="form" method="post" action="{{ route('billings.subscription') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user" value="{{ Auth::guard($guard)->user()->id }}">
                                            <input type="hidden" name="plan" value="{{ $plans[1]->id }}">
                                            <button type="submit">EXPERIMENTE POR 10 DIAS GRÁTIS</button>
                                        </form>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                                <ul class="pricing p-blue">
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
                                        <p style="margin-left:-80px; margin-bottom:-20px; font-size:13px">De <span style="text-decoration: line-through; ">R$ 209,40</span></p>
                                        <h3 class="blue-light">R$ {{ number_format($plans[2]->price, 2, ',', '') }}</h3>
                                        <span>20% desconto</span>
                                    </li>
                                    <li class="bg-white">
                                        <form role="form" method="post" action="{{ route('billings.subscription') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user" value="{{ Auth::guard($guard)->user()->id }}">
                                            <input type="hidden" name="plan" value="{{ $plans[1]->id }}">
                                            <button type="submit">EXPERIMENTE POR 10 DIAS GRÁTIS</button>
                                        </form>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div><!-- /block -->
            </div><!-- /row -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop