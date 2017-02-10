<!-- form start -->
{!! Form::open([ 'route' => 'doctor.store', 'name' => 'new-doctor', 'method' => 'post' ]) !!}
        <div class="row">
            <div class="col-md-3">
                {!! Form::label('cro', 'CRO') !!}
                <select name="cro" class="form-control" required="required">
                    <option value="">-- Selecione --</option>
                    @foreach($states as $state)
                        <option value="{!! str_slug($state->name,'-').'-'.$state->id !!}">{!! title_case($state->name) !!}</option>
                    @endforeach
                </select>
                @if ($errors->has('states'))
                    <p class="text-danger">{!! $errors->first('states') !!}</p>
                @endif
            </div>
            <div class="col-md-3">
                {!! Form::label('number_cro', 'Inscrição') !!}
                {!! Form::text('number_cro', '', ['class' => 'form-control', 'placeholder' => 'Número do CRO', 'required' => 'required']) !!}
                @if ($errors->has('number_cro'))
                    <p class="text-danger">{!! $errors->first('number_cro') !!}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::label('name', 'Nome Completo') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome Completo']) !!}
                @if ($errors->has('name'))
                    <p class="text-danger">{!! $errors->first('name') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                @if ($errors->has('email'))
                    <p class="text-danger">{!! $errors->first('email') !!}</p>
                @endif                                    
            </div>
            <div class="col-md-6">
                {!! Form::label('doc_cpf', 'CPF') !!}
                {!! Form::text('doc_cpf', '', ['class' => 'form-control', 'placeholder' => 'CPF', 'data-inputmask' =>'"mask": "999.999.999-99"', 'data-mask' => '']) !!}
                @if ($errors->has('doc_cpf'))
                    <p class="text-danger">{!! $errors->first('doc_cpf') !!}</p>
                @endif    
            </div>
            <div class="col-md-3">
                {!! Form::label('healthinsurance', 'Planos Odontológicos Aceitos') !!}
                <select name="healthinsurance[]" class="form-control" id="healthinsurance" multiple="multiple">
                    @foreach($healths as $health)
                        <option value="{!! str_slug($health->name,'-').'-'.$health->id !!}">{!! $health->name !!}</option>
                    @endforeach
                </select>
                @if ($errors->has('specialization'))
                    <p class="text-danger">{!! $errors->first('specialization') !!}</p>
                @endif
            </div>
            <div class="col-md-3">
                {!! Form::label('specialization', 'Especialidade') !!}
                <select name="specialization[]" class="form-control" id="specialization" multiple="multiple">
                    @foreach($specializations as $specialization)
                        <option value="{!! str_slug($specialization->name,'-').'-'.$specialization->id !!}">{!! $specialization->name !!}</option>
                    @endforeach
                </select>
                @if ($errors->has('specialization'))
                    <p class="text-danger">{!! $errors->first('specialization') !!}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                {!! Form::label('phone', 'Telefone Comercial') !!}
                {!! Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Telefone Comercial', 'data-inputmask' =>'"mask": "(99) 9999-9999"', 'data-mask' => '']) !!}
                @if ($errors->has('phone'))
                    <p class="text-danger">{!! $errors->first('phone') !!}</p>
                @endif
            </div>
            <div class="col-md-3">
                {!! Form::label('cell_phone', 'Celular') !!}
                {!! Form::text('cell_phone', '', ['class' => 'form-control', 'placeholder' => 'Celular', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']) !!}
                @if ($errors->has('cell_phone'))
                    <p class="text-danger">{!! $errors->first('cell_phone') !!}</p>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {!! Form::label('zip_code', 'Cep') !!}
                {!! Form::text('zip_code', '', ['id' => 'zip_code', 'class' => 'form-control zip_code', 'placeholder' => 'Cep', 'data-inputmask' =>'"mask": "99999-999"', 'data-mask' => '']) !!}
                @if ($errors->has('zip_code'))
                    <p class="text-danger" id="zip">{!! $errors->first('zip_code') !!}</p>
                @endif
                <div class="zip_code"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                {!! Form::label('address', 'Endereço') !!}
                {!! Form::text('address', '', ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Endereço']) !!}
                @if ($errors->has('address'))
                    <p class="text-danger">{!! $errors->first('address') !!}</p>
                @endif
            </div>
            <div class="col-md-2">
                {!! Form::label('number', 'Número') !!}
                {!! Form::text('number', '', ['id' => 'number', 'class' => 'form-control', 'placeholder' => 'Número']) !!}
                @if ($errors->has('number'))
                    <p class="text-danger">{!! $errors->first('number') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                {!! Form::label('complement', 'Complemento') !!}
                {!! Form::text('complement', '', ['class' => 'form-control', 'placeholder' => 'Complemento']) !!}
                @if ($errors->has('complement'))
                    <p class="text-danger">{!! $errors->first('complement') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                {!! Form::label('neighborhood', 'Bairro') !!}
                {!! Form::text('neighborhood', '', ['id' => 'neighborhood', 'class' => 'form-control', 'placeholder' => 'Bairro']) !!}
                @if ($errors->has('neighborhood'))
                    <p class="text-danger">{!! $errors->first('neighborhood') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                {!! Form::label('states', 'Estado') !!}
                <select name="states" id="state" class="form-control" required="required">
                    <option value="">-- Selecione --</option>
                    @foreach($states as $state)
                        <option value="{!! str_slug($state->name,'-').'-'.$state->id !!}">{!! title_case($state->name) !!}</option>
                    @endforeach
                </select>
                @if ($errors->has('states'))
                    <p class="text-danger">{!! $errors->first('states') !!}</p>
                @endif
            </div>                        
            <div class="col-md-6">
                {!! Form::label('city', 'Cidade') !!}
                <select name="city" id="city" class="form-control">
                    <option value="">-- Selecione --</option>
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
                <p class="text-warning" style="font-size: 12px">Senha precisa ter no minimo 6 dígitos</p>
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
    <!-- /.box-body -->

    <div class="box-footer">
        <div class="row col-md-12">
            <div class="privacy-policy text-center" style="font-size: 12px; margin-top:30px">
                  Ao clicar em "Cadastrar" confirmo estar de acordo com os <a href="#">Termos de Uso</a> da Odontolocaliza.
            </div>
        </div>
        {!! Form::hidden('country', 1) !!}
        <div class="row col-md-12">
            <button type="submit" class="btn btn-green btn-lg col-xs-12 col-sm-6 col-md-4 col-sm-offset-4" style="margin-top:20px;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Cadastrar</button> 
        </div>
        
    </div>
{!! Form::close() !!}