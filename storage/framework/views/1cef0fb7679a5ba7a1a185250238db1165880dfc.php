<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::open([ 'route' => 'admin::admin.store',  'name' => 'administrador', 'method' => 'post' ]); ?>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('name', 'Nome'); ?>

                            <?php echo Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome']); ?>

                            <?php if($errors->has('name')): ?>
                                <p class="text-danger"><?php echo $errors->first('name'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('email', 'Email'); ?>

                            <?php echo Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']); ?>

                            <?php if($errors->has('email')): ?>
                                <p class="text-danger"><?php echo $errors->first('email'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('password', 'Senha'); ?>

                            <?php echo Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Senha']); ?>

                            <?php if($errors->has('password')): ?>
                                <p class="text-danger"><?php echo $errors->first('password'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo Form::label('password_confirmation', 'Confirmar Senha'); ?>

                            <?php echo Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => 'Confirmar Senha']); ?>

                            <?php if($errors->has('password')): ?>
                                <p class="text-danger"><?php echo $errors->first('password'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?php echo Form::submit('Cadastrar',['class' => 'btn btn-primary']); ?>

                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>