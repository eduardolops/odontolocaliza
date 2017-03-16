@extends('structures.admin_template')

@section('sidebar')
    @include('admin.menu_adm')
@stop

@section('content')
  	<div class="row">
    	<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
	            <div class="inner">
	            	<h3>{!! $total['total'] !!}</h3>
						
	            	<p>Total de Doutores</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            <a href="{!! route('admin::doctors') !!}" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
	            <div class="inner">
	            	<h3>{!! $total['active'] !!}</h3>
						
	            	<p>Total Ativos</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            @php
					$uri = ['doctor'  => '', 'plan'    => '', 'status'  => 'active'];
				@endphp
	            <a href="{!! route('admin::doctors', $uri) !!}" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
	            <div class="inner">
	            	<h3>{!! $total['pending'] !!}</h3>
						
	            	<p>Total Pendentes</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            @php
					$uri = ['doctor'  => '', 'plan'    => '', 'status'  => 'pending'];
				@endphp
	            <a href="{!! route('admin::doctors', $uri) !!}" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
		<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
	            <div class="inner">
	            	<h3>{!! $total['suspend'] !!}</h3>
						
	            	<p>Total Inativos</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            @php
					$uri = ['doctor'  => '', 'plan'    => '', 'status'  => 'suspend'];
				@endphp
	            <a href="{!! route('admin::doctors', $uri) !!}" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
    </div>
@stop