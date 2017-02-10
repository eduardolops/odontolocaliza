<div class="appointment">
    <div class="container">
        <div class="row">
            {!! Form::open([ 'route' => 'search_doctor', 'name' => 'search', 'method' => 'get' ]) !!}
            <div class="col-md-4 col-sm-4 col-xs-12">
                <label>Estado</label>
                <select name="state" id="state" required="required">
                    <option value="">-- Selecione --</option>
                    @foreach($states as $state)
	                    <option value="{!! str_slug($state->name,'-').'-'.$state->id !!}">{!! title_case($state->name) !!}</option>
	                @endforeach
                </select>
                @if ($errors->has('states'))
                    <p class="text-danger" style="color:#fff;">{!! $errors->first('states') !!}</p>
                @endif
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <label>Cidade</label>
                <select name="city" id="city" required="required">
                    <option value="">-- Selecione --</option>
                </select>
                @if ($errors->has('city'))
                    <p class="text-danger" style="color:#fff;">{!! $errors->first('city') !!}</p>
                @endif
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <label>Especialização</label>
                <select name="specialization">
                    <option value="">-- Selecione --</option>
                    @foreach($specializations as $specialization)
	                    <option value="{!! str_slug($specialization->name,'-').'-'.$specialization->id !!}">{!! $specialization->name !!}</option>
	                @endforeach
                </select>
                @if ($errors->has('specialization'))
                    <p class="text-danger" style="color:#fff;">{!! $errors->first('specialization') !!}</p>
                @endif
            </div>
            <!-- end col-4 -->
            <div class="col-xs-12 hidden-xs">
                <hr>
            </div>
            <!-- end col-12 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <label>Planos Odontológicos</label>
                <select name="plan">
                    <option value="">-- Selecione --</option>
                    @foreach($healths as $health)
	                    <option value="{!! str_slug($health->name,'-').'-'.$health->id !!}">{!! $health->name !!}</option>
	                @endforeach
                </select>
                @if ($errors->has('plan'))
                    <p class="text-danger" style="color:#fff;">{!! $errors->first('plan') !!}</p>
                @endif
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 department">
                <label>Nome do Dentista</label>
                <input type="text" name="name">
                @if ($errors->has('name'))
                    <p class="text-danger" style="color:#fff;">{!! $errors->first('name') !!}</p>
                @endif
            </div>
            <!-- end col-3 -->
            <div class="col-md-4 col-sm-12 col-xs-12 gender">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
            </div>
            <!-- end col-4 -->
            {!! Form::close() !!}
            <!-- end form -->
        </div>
    </div>
    <!-- /Appointment -->
</div>
<!-- End .Appointment -->