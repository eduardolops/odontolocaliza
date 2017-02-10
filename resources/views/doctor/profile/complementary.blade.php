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
            {!! Form::open([ 'route' => 'doctor::store_complementary', 'method' => 'post' ]) !!}
              @forelse( $complementaries as $key => $complementary )
                <div class="box-header">
                  <h3 class="box-title">
                    <i class="fa {!! $complementary->image !!}"></i> {!! $complementary->info_name !!}
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    @php 
                      # I'm break rules, but fuc#
                      $content = DB::table('content_info_complementaries')
                                        ->where('info_id','=', $complementary->id)
                                        ->where('user_id','=', Auth::guard($guard)->user()->id)->first();
                    @endphp
                    <input type="hidden" name="id[]" value="{!! $complementary->id !!}">
                    <textarea class="textarea" name="description_{!! $key !!}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $content->description or '' !!}</textarea>
                </div>
              @empty
                <p class="text-danger">Sem registros</p> 
              @endforelse

              <div class="box-footer">
                <input type="hidden" name="doctor" value="{!! Auth::guard($guard)->user()->id !!}">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop