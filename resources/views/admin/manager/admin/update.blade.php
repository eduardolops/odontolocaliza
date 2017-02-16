@extends('structures.admin_template')

@section('sidebar')
@include('admin.menu_adm')
@stop

@section('content')
<!-- /.row -->
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
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open([ 'route' => ['admin::admin.update', $admin->id],  'name' => 'administrador', 'method' => 'put' ]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('name', 'Nome') !!}
                            {!! Form::text('name', $admin->name, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                            @if ($errors->has('name'))
                                <p class="text-danger">{!! $errors->first('name') !!}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', $admin->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            @if ($errors->has('email'))
                                <p class="text-danger">{!! $errors->first('email') !!}</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('password', 'Senha') !!}
                            {!! Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                            @if ($errors->has('password'))
                                <p class="text-danger">{!! $errors->first('password') !!}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('password_confirmation', 'Confirmar Senha') !!}
                            {!! Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => 'Confirmar Senha']) !!}
                            @if ($errors->has('password'))
                                <p class="text-danger">{!! $errors->first('password') !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {!! Form::submit('Cadastrar',['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop