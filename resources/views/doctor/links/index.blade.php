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
           <div class="row box-header">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="{!! route('doctor::links_create') !!}" class="btn btn-sm btn-success" style="margin-right:5px;"><i class="fa fa-plus"></i> Cadastrar Novo Link</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Urls</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($urls as $url)
                        <tr>
                            <td>
                                <a href="{!! $url->link !!}" target="_blank">{!! $url->link !!}</a>
                            </td>
                            <td>
                                <a href="{!! route('doctor::links_show', ['id' => $url->id]) !!}" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="{!! route('doctor::links_destroy', $url->id) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir" 
                                    onclick="event.preventDefault();
                                             document.getElementById('links_destroy.{!! $url->id !!}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open([ 'route' => ['doctor::links_destroy', $url->id], 'id' => 'links_destroy.'.$url->id, 'method' => 'delete' ]) !!}
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
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop