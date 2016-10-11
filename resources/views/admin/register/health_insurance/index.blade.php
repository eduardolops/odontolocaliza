@extends('structures.admin_template')

@section('sidebar')
@include('admin.menu_adm')
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
                <h3 class="box-title">Listagem dos Planos de Saúdes</h3>
                <div class="box-tools">
                    <a href="{!! route('admin::health_insurance.create') !!}" class="btn btn-sm btn-success pull-left" style="margin-right:5px;"><i class="fa fa-plus"></i> Novo Plano de Saúde</a>

                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Pesquisar">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Plano de Saúde</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($health_insurances as $health_insurance)
                        <tr>
                            <td>{!! $health_insurance->id !!}</td>
                            <td>{!! $health_insurance->name !!}</td>
                            <td>
                                <a href="{!! route('admin::health_insurance.show', ['id' => $health_insurance->id]) !!}" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="{!! route('admin::health_insurance.destroy', ['id' => $health_insurance->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                    onclick="event.preventDefault();
                                             document.getElementById('health_insurance.destroy.{!! $health_insurance->id !!}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open([ 'route' => ['admin::health_insurance.destroy', $health_insurance->id], 'id' => 'health_insurance.destroy.'.$health_insurance->id, 'method' => 'delete' ]) !!}
                                {!! Form::close() !!}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    @endforelse

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop