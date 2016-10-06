<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Odontolocaliza | <?php echo e(isset($page_title) ? $page_title : "Page Title"); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo e(asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")); ?>" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    </head>
    <body class="skin-blue">
    <div class="wrapper">

        
        <?php echo $__env->make('structures.header_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
        <?php echo $__env->yieldContent('sidebar'); ?>

                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo e(isset($page_title) ? $page_title : "Page Title"); ?>

                    <small><?php echo e(isset($page_description) ? $page_description : null); ?></small>
                    <?php if( Route::currentRouteName() <> 'admin::home_adm' ): ?>
                         <a href="javascript:window.history.go(-1)" class="btn btn-sm btn-default pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                    <?php endif; ?>

                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                <?php echo $__env->yieldContent('content'); ?>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js")); ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo e(asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js")); ?>" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js")); ?>"></script>
    <script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js")); ?>"></script>
    <script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js")); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset ("/bower_components/admin-lte/dist/js/app.min.js")); ?>" type="text/javascript"></script>
    <!-- myApp -->
    <script src="<?php echo e(asset("/assets/js/app.js")); ?>"></script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    </body>
</html>