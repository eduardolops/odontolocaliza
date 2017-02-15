@extends('structures.admin_template')

@section('sidebar')
    @include('admin.menu_adm')
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
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                    <div class="box-body">
                    {!! Form::open([ 'route' => ['admin::doctors.update', $doctor->id], 'name' => 'doctor', 'method' => 'put' ]) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::label('number_cro', 'Número do CRO') !!}
                                    {!! Form::text('number_cro', $doctor->number_cro, ['class' => 'form-control', 'placeholder' => 'Número do CRO']) !!}
                                    @if ($errors->has('number_cro'))
                                        <p class="text-danger">{!! $errors->first('number_cro') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::label('name', 'Nome Completo') !!}
                                    {!! Form::text('name', $doctor->name, ['class' => 'form-control', 'placeholder' => 'Nome Completo']) !!}
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{!! $errors->first('name') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::email('email', $doctor->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{!! $errors->first('email') !!}</p>
                                    @endif                                    
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('doc_cpf', 'CPF') !!}
                                    {!! Form::text('doc_cpf', $doctor->doc_cpf, ['class' => 'form-control', 'placeholder' => 'CPF', 'data-inputmask' =>'"mask": "999.999.999-99"', 'data-mask' => '']) !!}
                                    @if ($errors->has('doc_cpf'))
                                        <p class="text-danger">{!! $errors->first('doc_cpf') !!}</p>
                                    @endif    
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('phone', 'Telefone do Consultório') !!}
                                    {!! Form::text('phone', $doctor->phone, ['class' => 'form-control', 'placeholder' => 'Telefone Comercial', 'data-inputmask' =>'"mask": "(99) 9999-9999"', 'data-mask' => '']) !!}
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{!! $errors->first('phone') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('cell_phone', 'Celular') !!}
                                    {!! Form::text('cell_phone', $doctor->cell_phone, ['class' => 'form-control', 'placeholder' => 'Celular', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']) !!}
                                    @if ($errors->has('cell_phone'))
                                        <p class="text-danger">{!! $errors->first('cell_phone') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('office_hours', 'Horário de Atendimento') !!}
                                    {!! Form::text('office_hours', $doctor->office_hours, ['class' => 'form-control', 'placeholder' => 'Horário de Atendimento' ]) !!}
                                    <p class="help-block">Ex: 8:00 às 17:30</p>
                                    @if ($errors->has('office_hours'))
                                        <p class="text-danger">{!! $errors->first('office_hours') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::label('social_facebook', 'Facebook') !!}
                                    {!! Form::text('social_facebook', $doctor->social_facebook, ['class' => 'form-control', 'id' => 'social_facebook', 'placeholder' => 'https://']) !!}
                                    @if ($errors->has('social_facebook'))
                                        <p class="text-danger" id="zip">{!! $errors->first('social_facebook') !!}</p>
                                    @endif
                                    <div class="social_facebook"></div>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('social_instagran', 'Instagram') !!}
                                    {!! Form::text('social_instagran', $doctor->social_instagran, ['class' => 'form-control', 'id' => 'social_instagran', 'placeholder' => 'https://']) !!}
                                    @if ($errors->has('social_instagran'))
                                        <p class="text-danger" id="zip">{!! $errors->first('social_instagran') !!}</p>
                                    @endif
                                    <div class="social_instagran"></div>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('social_twitter', 'Twitter') !!}
                                    {!! Form::text('social_twitter', $doctor->social_twitter, ['class' => 'form-control', 'id' => 'social_twitter', 'placeholder' => 'https://']) !!}
                                    @if ($errors->has('social_twitter'))
                                        <p class="text-danger" id="zip">{!! $errors->first('social_twitter') !!}</p>
                                    @endif
                                    <div class="social_twitter"></div>
                                </div>
                                <div class="col-md-3">
                                    {!! Form::label('social_gplus', 'Google Plus') !!}
                                    {!! Form::text('social_gplus', $doctor->social_gplus, ['class' => 'form-control', 'id' => 'social_gplus', 'placeholder' => 'https://']) !!}
                                    @if ($errors->has('social_gplus'))
                                        <p class="text-danger" id="zip">{!! $errors->first('social_gplus') !!}</p>
                                    @endif
                                    <div class="social_gplus"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::label('zip_code', 'Cep') !!}
                                    {!! Form::text('zip_code', $doctor->zip_code, ['class' => 'form-control', 'id' => 'zip_code', 'placeholder' => 'Cep', 'data-inputmask' =>'"mask": "99999-999"', 'data-mask' => '']) !!}
                                    @if ($errors->has('zip_code'))
                                        <p class="text-danger" id="zip">{!! $errors->first('zip_code') !!}</p>
                                    @endif
                                    <div class="zip_code"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Form::label('address', 'Endereço') !!}
                                    {!! Form::text('address', $doctor->address, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Endereço']) !!}
                                    @if ($errors->has('address'))
                                        <p class="text-danger">{!! $errors->first('address') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    {!! Form::label('number', 'Número') !!}
                                    {!! Form::text('number', $doctor->number, ['class' => 'form-control', 'id' => 'number', 'placeholder' => 'Número']) !!}
                                    @if ($errors->has('number'))
                                        <p class="text-danger">{!! $errors->first('number') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('es', 'Complemento') !!}
                                    {!! Form::text('complement', $doctor->complement, ['class' => 'form-control', 'placeholder' => 'Complemento']) !!}
                                    @if ($errors->has('complement'))
                                        <p class="text-danger">{!! $errors->first('complement') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('neighborhood', 'Bairro') !!}
                                    {!! Form::text('neighborhood', $doctor->neighborhood, ['class' => 'form-control', 'id' => 'neighborhood', 'placeholder' => 'Bairro']) !!}
                                    @if ($errors->has('neighborhood'))
                                        <p class="text-danger">{!! $errors->first('neighborhood') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('states', 'Estado') !!}
                                    <select name="states" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        @foreach($states as $state)
                                            <option value="{!! $state->id !!}" {!! $state->id == $doctor->states ? 'selected' : '' !!}>{!! $state->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('states'))
                                        <p class="text-danger">{!! $errors->first('states') !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('city', 'Cidade') !!}
                                    <select name="city" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        @foreach($cities as $city)
                                            <option value="{!! $city->id !!}" {!! $city->id == $doctor->city ? 'selected' : '' !!}>{!! $city->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city'))
                                        <p class="text-danger">{!! $errors->first('city') !!}</p>
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
                            {!! Form::hidden('country', 1) !!}
                            {!! Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop