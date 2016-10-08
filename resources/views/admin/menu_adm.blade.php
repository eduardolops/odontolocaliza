<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menus</li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-users"></i><span>Cadastrar</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li><a href="{!! route('admin::cities') !!}"><i class="fa fa-users"></i><span>Cidades</span></a></li>
                     <li><a href="{!! route('admin::specialization') !!}"><i class="fa fa-users"></i><span>Especializações</span></a></li>
                     <li><a href="{!! route('admin::health_insurance') !!}"><i class="fa fa-users"></i><span>Planos de Saúde</span></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>