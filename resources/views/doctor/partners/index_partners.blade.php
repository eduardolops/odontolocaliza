@extends('structures.admin_template')

@section('sidebar')
    @include('admin.menu_adm')
@stop

@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listagem de Parceiros</h3>
                <div class="box-tools">
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
                        <th>Nome</th>
                        <th>Atividade</th>
                        <th>Status</th>
                        <th>Data Cadastro</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>Academia</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>11-7-2014</td>
                        <td>
                            <a href="" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop