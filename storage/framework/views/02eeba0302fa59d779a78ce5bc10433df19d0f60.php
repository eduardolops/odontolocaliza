<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('admin.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  	<div class="row">
    	<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
	            <div class="inner">
	            	<h3><?php echo $total['total']; ?></h3>
						
	            	<p>Total de Doutores</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            <a href="<?php echo route('admin::doctors'); ?>" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
	            <div class="inner">
	            	<h3><?php echo $total['active']; ?></h3>
						
	            	<p>Total Ativos</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            <?php 
					$uri = ['doctor'  => '', 'plan'    => '', 'status'  => 'active'];
				 ?>
	            <a href="<?php echo route('admin::doctors', $uri); ?>" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
	            <div class="inner">
	            	<h3><?php echo $total['pending']; ?></h3>
						
	            	<p>Total Pendentes</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            <?php 
					$uri = ['doctor'  => '', 'plan'    => '', 'status'  => 'pending'];
				 ?>
	            <a href="<?php echo route('admin::doctors', $uri); ?>" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
		<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
	            <div class="inner">
	            	<h3><?php echo $total['suspend']; ?></h3>
						
	            	<p>Total Inativos</p>
	            </div>
	            <div class="icon">
	             	<i class="ion ion-person-add"></i>
	            </div>
	            <?php 
					$uri = ['doctor'  => '', 'plan'    => '', 'status'  => 'suspend'];
				 ?>
	            <a href="<?php echo route('admin::doctors', $uri); ?>" class="small-box-footer">
	              	Mais Informação <i class="fa fa-arrow-circle-right"></i>
	            </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>