<!-- Main Header -->
<header class="main-header">
    <?php 
        if( $guard == 'admin' ):
            $uri = '/admin/login/logout';
            $uri_logo = 'admin::home_admin';
        else:
            $uri = '/logout';                            
            $uri_logo = 'doctor::home_doctor';
        endif;
        $auth = Auth::guard($guard)->user();
     ?>
    <!-- Logo -->
    <a href="<?php echo route($uri_logo); ?>" class="logo">Odonto<b>localiza</b></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <?php if( !empty($auth->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$auth->thumb)) ): ?>
                            <img src="<?php echo e(asset('storage/images/doctor/profile/'.$auth->thumb)); ?>" alt="<?php echo $auth->name; ?>" class="user-image img-circle" height="25">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/profile.jpg')); ?>" alt="Sem Imagem" class="user-image img-circle" height="25">
                        <?php endif; ?>
                        <span class="hidden-xs"> <?php echo e(ucwords( $auth->name )); ?> <span class="caret"></span> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if( $guard == 'admin' ): ?>
                            <li>
                                <a href="<?php echo route('admin::profile'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Meu Perfil</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(url( $uri )); ?>"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off" aria-hidden="true"></i> Sair
                            </a>

                            <form id="logout-form" action="<?php echo e(url( $uri )); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>