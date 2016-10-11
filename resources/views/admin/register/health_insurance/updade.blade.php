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
            {!! Form::open([ 'route' => ['admin::health_insurance.update', $health_insurance->id], 'name' => 'health_insurances', 'method' => 'put' ]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('name', 'Plano de Saúde') !!}
                            {!! Form::text('name', $health_insurance->name, ['class' => 'form-control', 'placeholder' => 'Plano de Saúde']) !!}
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