@extends('structures.admin_template')

@section('sidebar')
    @include('admin.menu_adm')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open([ 'route' => 'admin::store_user', 'name' => 'new_user' ]) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('name', 'Nome') !!}
                                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                                <p class="text-danger">{!! $errors->first('name') !!}</p>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('last_name', 'Sobrenome') !!}
                                {!! Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Sobrenome']) !!}
                                <p class="text-danger">{!! $errors->first('last_name') !!}</p>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                <p class="text-danger">{!! $errors->first('email') !!}</p>
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('doc_cpf', 'CPF') !!}
                                {!! Form::text('doc_cpf', '', ['class' => 'form-control', 'placeholder' => 'CPF', 'data-inputmask' =>'"mask": "999.999.999-99"', 'data-mask' => '']) !!}
                                <p class="text-danger">{!! $errors->first('doc_cpf') !!}</p>
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('doc_rg', 'RG') !!}
                                {!! Form::text('doc_rg', '', ['class' => 'form-control', 'placeholder' => 'RG', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']) !!}
                                <p class="text-danger">{!! $errors->first('doc_rg') !!}</p>
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('phone', 'Telefone') !!}
                                {!! Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Telefone', 'data-inputmask' =>'"mask": "(99) 9999-9999"', 'data-mask' => '']) !!}
                                <p class="text-danger">{!! $errors->first('phone') !!}</p>
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('cell_phone', 'Celular') !!}
                                {!! Form::text('cell_phone', '', ['class' => 'form-control', 'placeholder' => 'Celular', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']) !!}
                                <p class="text-danger">{!! $errors->first('cell_phone') !!}</p>
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('birth_date', 'Data de Nacimento') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::text('birth_date', '', ['class' => 'form-control', 'placeholder' => 'Data de Nacimento', 'data-inputmask' =>'"alias": "dd/mm/yyyy"', 'data-mask' => '']) !!}
                                </div>
                                <p class="text-danger">{!! $errors->first('birth_date') !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::label('zip_code', 'Cep') !!}
                                {!! Form::text('zip_code', '', ['class' => 'form-control zip_code', 'placeholder' => 'Cep', 'data-inputmask' =>'"mask": "99999-999"', 'data-mask' => '']) !!}
                                <p class="text-danger" id="zip">{!! $errors->first('last_name') !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                {!! Form::label('address', 'Endereço') !!}
                                {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Endereço']) !!}
                                <p class="text-danger">{!! $errors->first('address') !!}</p>
                            </div>
                            <div class="col-md-2">
                                {!! Form::label('number', 'Número') !!}
                                {!! Form::text('number', '', ['class' => 'form-control', 'placeholder' => 'Número']) !!}
                                <p class="text-danger">{!! $errors->first('number') !!}</p>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('complement', 'Complemento') !!}
                                {!! Form::text('complement', '', ['class' => 'form-control', 'placeholder' => 'Complemento']) !!}
                                <p class="text-danger">{!! $errors->first('complement') !!}</p>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('neighborhood', 'Bairro') !!}
                                {!! Form::text('neighborhood', '', ['class' => 'form-control', 'placeholder' => 'Bairro']) !!}
                                <p class="text-danger">{!! $errors->first('neighborhood') !!}</p>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('states', 'Estado') !!}
                                <select name="states" class="form-control">
                                    <option value="1">Teste</option>
                                    <option value="">Teste</option>
                                    <option value="">Teste</option>
                                </select>
                                <p class="text-danger">{!! $errors->first('states') !!}</p>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('city', 'Cidade') !!}
                                <select name="city" class="form-control">
                                    <option value="1">Teste</option>
                                    <option value="">Teste</option>
                                    <option value="">Teste</option>
                                </select>
                                <p class="text-danger">{!! $errors->first('city') !!}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('login', 'Login') !!}
                                {!! Form::text('login', '', ['class' => 'form-control', 'placeholder' => 'Login']) !!}
                                <p class="text-danger">{!! $errors->first('login') !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('password', 'Senha') !!}
                                {!! Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                                <p class="text-danger">{!! $errors->first('password') !!}</p>
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