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
                {{ session('status') }}
            </div>
        @endif
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open([ 'route' => ['admin::cities.update', $city->id], 'name' => 'cities', 'method' => 'put' ]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('states', 'Estado') !!}
                            <select name="id_state" class="form-control">
                                <option value="">-- Selecione --</option>
                                @foreach($states as $state)
                                    <option value="{!! $state->id !!}" {!! $state->id == $city->id_state ? 'selected' : '' !!}>{!! $state->name !!}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_state'))
                                <p class="text-danger">{!! $errors->first('id_state') !!}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('name', 'Cidade') !!}
                            {!! Form::text('name', $city->name, ['class' => 'form-control', 'placeholder' => 'Cidade']) !!}
                            @if ($errors->has('name'))
                                <p class="text-danger">{!! $errors->first('name') !!}</p>
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