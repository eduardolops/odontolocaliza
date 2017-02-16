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
                <h3 class="box-title">Listagem</h3>
                <div class="box-tools" style="width: 290px;">
                    <a href="{!! route('admin::admin.create') !!}" class="btn btn-sm btn-success pull-left" style="margin-right:5px;"><i class="fa fa-plus"></i> Novo Adminstrador</a>

                    {!! Form::open([ 'route' => ['admin::admin'], 'method' => 'get']) !!}
                        <div class="input-group input-group-sm pull-left" style="width: 150px;">
                            <input type="text" name="search" class="form-control pull-right" placeholder="Pesquisar">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($admins as $admin)
                        <tr>
                            <td>{!! $admin->id !!}</td>
                            <td>{!! title_case($admin->name) !!}</td>
                            <td>
                                <a href="{!! route('admin::admin.show', ['id' => $admin->id]) !!}" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="{!! route('admin::plan.destroy', ['id' => $admin->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                    onclick="event.preventDefault();
                                             document.getElementById('plan.destroy.{!! $admin->id !!}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open([ 'route' => ['admin::admin.destroy', $admin->id], 'id' => 'plan.destroy.'.$admin->id, 'method' => 'delete' ]) !!}
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
                <div style="text-align:center">
                    {!! $admins->appends(['search' => request()->search])->links() !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop