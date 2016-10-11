<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::open([ 'route' => ['admin::specializations.update', $specialization->id], 'name' => 'specializations', 'method' => 'put' ]); ?>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('nick_name', 'Sigla Especialização'); ?>

                            <?php echo Form::text('nick_name', $specialization->nick_name, ['class' => 'form-control', 'placeholder' => 'Sigla Especialização']); ?>

                            <?php if($errors->has('nick_name')): ?>
                                <p class="text-danger"><?php echo $errors->first('nick_name'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('name', 'Especialização'); ?>

                            <?php echo Form::text('name', $specialization->name, ['class' => 'form-control', 'placeholder' => 'Especialização']); ?>

                            <?php if($errors->has('name')): ?>
                                <p class="text-danger"><?php echo $errors->first('name'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?php echo Form::submit('Salvar',['class' => 'btn btn-primary']); ?>

                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>