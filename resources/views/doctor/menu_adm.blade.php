<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Painel do Doutor</li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-users"></i><span>Meus Dados</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
		            	<a href="{!! route('doctor::profile') !!}">
		            		<span>Dados Pessoais</span>
		            	</a>
		            </li>
		            <li>
		            	<a href="{!! route('doctor::spealizations') !!}">
		            		<span>Minhas Especialidades</span>
		            	</a>
		            </li>
		            <li>
		            	<a href="{!! route('doctor::convenant') !!}">
		            		<span>Convênios Odontológicos Aceitos</span>
		            	</a>
		            </li>
		            <li>
		            	<a href="{!! route('doctor::complementary') !!}">
		            		<span>Dados Complementáres</span>
		            	</a>
		            </li>
                    {{-- @if( auth()->guard('web')->user()->whichIsPlan() == 'plano_premium' ) --}}
                    <li>
                        <a href="{!! route('doctor::links') !!}">
                            <span>Links Úteis</span>
                        </a>
                    </li>
                    {{-- @endif --}}
                </ul>
            </li>
            {{-- @if( auth()->guard('web')->user()->whichIsPlan() == 'plano_premium' ) --}}
                <li>
                	<a href="{!! route('doctor::gallery') !!}">
                		<span><i class="fa fa-picture-o"></i> Galeria de Imagens</span>
                	</a>
                </li>
            {{-- @endif --}}
            <li>
            	<a href="{!! route('billings') !!}">
            		<span><i class="fa fa-credit-card"></i> Minha Assinatura</span>
            	</a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>