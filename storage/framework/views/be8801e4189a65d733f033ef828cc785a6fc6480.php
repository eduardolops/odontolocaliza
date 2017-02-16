<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Painel do Admin</li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-plus"></i><span>Cadastrar</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li><a href="<?php echo route('admin::specializations'); ?>"><i class="fa fa-users"></i><span>Especializações</span></a></li>
                     <li><a href="<?php echo route('admin::health_insurance'); ?>"><i class="fa fa-users"></i><span>Planos de Saúde</span></a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo route('admin::doctors'); ?>"> <i class="fa fa-users" aria-hidden="true"></i><span>Doutores Cadastrados</span> </a>
            </li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-cogs"></i><span>Configurações</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li><a href="<?php echo route('admin::admin'); ?>"><i class="fa fa-users"></i><span>Gerenciar Administradores</span></a></li>
                     <li><a href="<?php echo route('admin::plan'); ?>"><i class="fa fa-users"></i><span>Planos de Cobrança</span></a></li>
                </ul>
            </li>
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>