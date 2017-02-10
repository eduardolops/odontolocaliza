@extends('structures.admin_template')

@section('sidebar')
@include('doctor.menu_adm')
@stop

@section('content')
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
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
        <div class="box">
            <div class="box-header">
                <div class="pull-left">
                    {!! Form::open([ 'route' => 'doctor::create_specializations', 'class' => 'form-inline', 'method' => 'post' ]) !!}
                        <div class="form-group">
                            <label>Nova Especialidade:</label>
                            <select name="specialization_id" class="form-control input-sm" required>
                                <option value="">Selecione uma nova especialidade</option>
                                @foreach($specializations as $specialization)
                                    <option value="{!! $specialization->id !!}">{!! $specialization->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{!! Auth::guard($guard)->user()->id !!}">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</button>
                        @if ($errors->has('specialization_id'))
                            <p class="text-danger">{!! $errors->first('specialization_id') !!}</p>
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Especialização</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($specialization_doctor as $specialization)
                        <tr>
                            <td>{!! $specialization->id !!}</td>
                            <td>{!! $specialization->name !!}</td>
                            <td>
                                <a href="{!! route('doctor::destroy_specializations', ['id' => $specialization->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                    onclick="event.preventDefault();
                                             document.getElementById('specialization.destroy.{!! $specialization->id !!}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open([ 'route' => ['doctor::destroy_specializations', $specialization->id], 'id' => 'specialization.destroy.'.$specialization->id, 'method' => 'delete' ]) !!}
                                {!! Form::close() !!}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    @endforelse

                </table>
                <div style="text-align:center">
                    {!! $specialization_doctor->links() !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop