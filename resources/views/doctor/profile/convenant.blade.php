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
                    {!! Form::open([ 'route' => 'doctor::create_convenant', 'class' => 'form-inline', 'method' => 'post' ]) !!}
                        <div class="form-group">
                            <label>Novo Convêncio Odontológico:</label>
                            <select name="convenant_id" class="form-control input-sm" required>
                                <option value="">Selecione uma novo convêncio</option>
                                @foreach($convenants as $convenant)
                                    <option value="{!! $convenant->id !!}">{!! $convenant->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{!! Auth::guard($guard)->user()->id !!}">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</button>
                        @if ($errors->has('convenant_id'))
                            <p class="text-danger">{!! $errors->first('convenant_id') !!}</p>
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Convêncio Odontológico Aceito</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($convenants_accepts as $convenants_accept)
                        <tr>
                            <td>{!! $convenants_accept->id !!}</td>
                            <td>{!! $convenants_accept->name !!}</td>
                            <td>
                                <a href="{!! route('doctor::destroy_convenant', ['id' => $convenants_accept->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                    onclick="event.preventDefault();
                                             document.getElementById('convenants_accept.destroy.{!! $convenants_accept->id !!}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open([ 'route' => ['doctor::destroy_convenant', $convenants_accept->id], 'id' => 'convenants_accept.destroy.'.$convenants_accept->id, 'method' => 'delete' ]) !!}
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
                    {!! $convenants_accepts->links() !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop