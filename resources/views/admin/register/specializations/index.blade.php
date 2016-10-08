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
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listagem das Especializações</h3>
                <div class="box-tools">
                    <a href="{!! route('admin::cities.create') !!}" class="btn btn-sm btn-success pull-left" style="margin-right:5px;"><i class="fa fa-plus"></i> Nova Especialização</a>

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
                        <th>Especialização</th>
                        <th>Sigla</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($specializations as $specialization)
                    <tr>
                        <td>{!! $specialization->id !!}</td>
                        <td>{!! $specialization->name !!}</td>
                        <td>{!! $specialization->nick_name !!}</td>
                        <td>
                            <a href="{!! route('admin::specialization.show', ['id' => $specialization->id]) !!}" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="{!! route('admin::specialization.destroy', ['id' => $specialization->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                onclick="event.preventDefault();
                                         document.getElementById('specialization.destroy.{!! $specialization->id !!}').submit();">
                                <i class="fa fa-trash"></i>
                            </a>
                            {!! Form::open([ 'route' => ['admin::specialization.destroy', $specialization->id], 'id' => 'specialization.destroy.'.$specialization->id, 'method' => 'delete' ]) !!}
                            {!! Form::close() !!}
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;">Não a registros encontrados</td>
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