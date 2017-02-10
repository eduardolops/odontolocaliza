@extends('structures.admin_template')

@section('sidebar')
@include('admin.menu_adm')
@stop

@section('content')
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        @if (session('error'))
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('error') }}
            </div>
        @endif
        <div class="box">
            <div class="box-header">
                <div class="pull-left">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" name="order" class="form-control input-sm" placeholder="ID Pedido">
                        </div>
                        <div class="form-group">
                            <input type="text" name="doctor" class="form-control input-sm" placeholder="Nome do Doutor">
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control input-sm">
                                <option value="">Selecione Situação</option>
                                <option value="0">Aguardando Pagamento</option>
                                <option value="1">Pagos</option>
                                <option value="2">Pendentes</option>
                                <option value="3">Cancelados</option>
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
                        <th>ID</th>
                        <th>Nome do Doutor</th>
                        <th>Plano</th>
                        <th>Preço</th>
                        <th>Forma de Pagamento</th>
                        <th>Status</th>
                        <th>Data Pedido</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($orders as $order)
                        <tr>
                            <td>{!! str_pad($order->id, 4, "0", STR_PAD_LEFT);  !!}</td>
                            <td>{!! title_case($order->user_name) !!}</td>
                            <td>{!! title_case( $order->plan_name) !!}</td>
                            <td>{!! ( number_format($order->price - $order->discount, 2, ',', ' ') )!!}</td>
                            <td>{!! title_case($order->payment_type) !!}</td>
                            <td>{!! convertStatusInTypeSituationPayment($order->order_status) !!}</td>
                            <td>{!! date('d/m/Y H:i', strtotime($order->created_at)) !!}</td>
                            <td>
                                <a href="{!! route('admin::specializations.show', ['id' => $order->id]) !!}" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    @endforelse

                </table>
                <div style="text-align:center">
                    {!! $orders->links() !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop