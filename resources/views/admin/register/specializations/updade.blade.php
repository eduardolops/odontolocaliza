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
            {!! Form::open([ 'route' => ['admin::specializations.update', $specialization->id], 'name' => 'specializations', 'method' => 'put' ]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('nick_name', 'Sigla Especialização') !!}
                            {!! Form::text('nick_name', $specialization->nick_name, ['class' => 'form-control', 'placeholder' => 'Sigla Especialização']) !!}
                            @if ($errors->has('nick_name'))
                                <p class="text-danger">{!! $errors->first('nick_name') !!}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('name', 'Especialização') !!}
                            {!! Form::text('name', $specialization->name, ['class' => 'form-control', 'placeholder' => 'Especialização']) !!}
                            @if ($errors->has('name'))
                                <p class="text-danger">{!! $errors->first('name') !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {!! Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop