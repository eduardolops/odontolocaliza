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
                <div class="pull-left">
                    {!! Form::open([ 'route' => ['doctor::gallery_upload', Auth::guard($guard)->user()->id], 'name' => 'upload', 'files'=> true, 'method' => 'post' ]) !!}
                        <div class="col-xs-12 col-md-6">
                            <label for="imagem">Selecione as imagens para a galeria: <b class="text-danger">(Permitido até 5 imagens)</b> </label>
                            <div class="input-group">
                                <input id="uploadFile" class="form-control" type="text" placeholder="Selecionar Arquivo" disabled="disabled" />
                                <div class="input-group-btn">
                                    <div class="fileUpload btn btn-default" style="margin:0">
                                        <span>Selecionar</span>
                                        <input type="file" id="uploadBtn" class="upload" name="upload[]" multiple="multiple" />
                                    </div>
                                    <button type="submit" class="btn btn-success">Enviar Imagem</button>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                @php 
                                    $error = $errors->all();
                                @endphp
                                <p class="text-danger">{{ $error[0] }}</p>
                            @endif
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Fotos</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($images as $img)
                        <tr>
                            <td>
                                <div class="col-xs-6 col-md-3 col-xs-offset-3 col-md-offset-0">
                                    @if( !empty($img->filePath) && file_exists(public_path('storage/images/doctor/gallery/'.$img->filePath)) )
                                        <img src="{{ asset('storage/images/doctor/gallery/'.$img->filePath) }}" alt="{!! $img->filePath !!}" class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('images/no-img.png') }}" alt="Sem Imagem" class="img-thumbnail">
                                    @endif
                                </div>

                            </td>
                            <td>
                                <a href="{!! route('doctor::gallery_destroy', ['user_id' => $img->user_id, 'img_id' => $img->id]) !!}" data-toggle="tooltip" data-placement="bottom" title="Excluir" class="btn btn-danger" 
                                    onclick="event.preventDefault();
                                             document.getElementById('gallery_destroy.{!! $img->id !!}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open([ 'route' => ['doctor::gallery_destroy', 'user_id' => $img->user_id, 'img_id' => $img->id], 'id' => 'gallery_destroy.'.$img->id, 'method' => 'delete' ]) !!}
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