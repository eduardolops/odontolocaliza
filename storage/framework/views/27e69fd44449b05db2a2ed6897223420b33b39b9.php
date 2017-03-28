<?php $__env->startSection('content'); ?>
    <form role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
        <?php echo e(csrf_field()); ?>

        <?php if($errors->has('errors')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('errors')); ?></strong>
            </span>
        <?php endif; ?>
        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" required autofocus>
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Senha" required>
            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color: #25a9e0;">Logar</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.login_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>