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
                <div class="pull-left">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="email" class="form-control input-sm" placeholder="ID Pedido">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-sm" placeholder="Parceiro">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control  input-sm" placeholder="CNPJ">
                        </div>
                        <div class="form-group">
                            <select name="" class="form-control input-sm">
                                <option value="">Selecione Situação</option>
                                <option value="">Pagos</option>
                                <option value="">Não Pagos</option>
                                <option value="">Cancelados</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="" class="form-control input-sm">
                                <option value="">Selecione Plano</option>
                                <option value="">Teste1</option>
                                <option value="">Teste2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="" class="form-control input-sm">
                                <option value="">Selecione Estado</option>
                                <option value="">Teste1</option>
                                <option value="">Teste2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="" class="form-control  input-sm">
                                <option value="">Selecione Cidade</option>
                                <option value="">Teste1</option>
                                <option value="">Teste2</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Pesquisar</button>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID Pedido</th>
                        <th>Descrição</th>
                        <th>Cidade-UF</th>
                        <th>Situação</th>
                        <th>Data Aquisição</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>Presidente Prudente - SP</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>11-7-2014</td>
                        <td>R$ 100.00</td>
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