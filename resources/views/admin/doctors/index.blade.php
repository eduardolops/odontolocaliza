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
                            <input type="text" name="doctor" class="form-control input-sm" placeholder="Nome do Doutor">
                        </div>
                        <div class="form-group">
                            <select name="plan" class="form-control input-sm">
                                <option value="">Selecione Plano</option>
                                @foreach($plans as $plan)
                                    <option value="{!! str_slug($plan->name, '_') !!}">{!! $plan->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control input-sm">
                                <option value="">Selecione Status</option>
                                <option value="active">Ativos</option>
                                <option value="suspend">Inativos</option>
                                <option value="pending">Pendentes</option>
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
                        <th>Status</th>
                        <th>Telefone</th>
                        <th>Data Cadastro</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($doctors as $doctor)
                        <tr>
                            <td>{!! str_pad($doctor->id, 4, "0", STR_PAD_LEFT);  !!}</td>
                            <td>{!! title_case($doctor->name) !!}</td>
                            <td>{!! title_case( str_replace('_', ' ', $doctor->subscription_plan) ) !!}</td>
                            <td>{!! convertTypeStatus($doctor->status) !!}</td>
                            <td>{!! $doctor->phone !!}</td>
                            <td>{!! date('d/m/Y H:i', strtotime($doctor->created_at)) !!}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm" onclick="window.open('{!! route('admin::doctors.logar', ['user_id' => $doctor->id]) !!}', '_blank');" >
                                        <i class="fa fa-sign-in" aria-hidden="true"></i> Logar no Painel
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{!! route('admin::doctors.show', ['id' => $doctor->id]) !!}"><i class="fa fa-edit"></i>Editar</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    @endforelse

                </table>
                <div style="text-align:center">
                    {!! $doctors->appends(['status' => request()->status])->links() !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop