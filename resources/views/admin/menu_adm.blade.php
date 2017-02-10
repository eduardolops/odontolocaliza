<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Painel do Admin</li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-users"></i><span>Cadastrar</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li><a href="{!! route('admin::plan') !!}"><i class="fa fa-users"></i><span>Planos de Cobrança</span></a></li>
                     <li><a href="{!! route('admin::specializations') !!}"><i class="fa fa-users"></i><span>Especializações</span></a></li>
                     <li><a href="{!! route('admin::health_insurance') !!}"><i class="fa fa-users"></i><span>Planos de Saúde</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Pedidos</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('admin::order') !!}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Ordem de Pedidos</span></a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>