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
                <h3 class="box-title">Listagem das Cidades</h3>
                <div class="box-tools">
                    <a href="{!! route('admin::cities.create') !!}" class="btn btn-sm btn-success pull-left" style="margin-right:5px;"><i class="fa fa-plus"></i> Nova Cidade</a>

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
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($cities as $city)
                    <tr>
                        <td>{!! $city->id !!}</td>
                        <td>{!! $city->name !!}</td>
                        <td>
                            <a href="{!! route('admin::cities.show', ['id' => $city->id]) !!}" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="{!! route('admin::cities.destroy', ['id' => $city->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                onclick="event.preventDefault();
                                         document.getElementById('cities.destroy.{!! $city->id !!}').submit();">
                                <i class="fa fa-trash"></i>
                            </a>
                            {!! Form::open([ 'route' => ['admin::cities.destroy', $city->id], 'id' => 'cities.destroy.'.$city->id, 'method' => 'delete' ]) !!}
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