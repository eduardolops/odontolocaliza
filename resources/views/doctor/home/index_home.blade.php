@extends('structures.admin_template')

@section('sidebar')
    @include('doctor.menu_adm')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('error') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('warning') }}
                </div>
            @endif
            
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="box box-info box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Seja Bem Vindo</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <p>
                                Complete o seu cadastro para ter uma melhor divulgação. Acesse: Meus Dados / Dados Pessoais
                            </p>
                            <p>
                                Complete o seu cadastro adicionando uma imagem de perfil (2M tamanho máximo permitido), adicione o seu horário de atendimento e telefones, coloque também suas redes socias, assim para um maior contato e interação com seus pacientes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop