<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('doctor.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
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
        <div class="box">
            <?php echo Form::open([ 'route' => 'doctor::store_complementary', 'method' => 'post' ]); ?>

              <?php $__empty_1 = true; $__currentLoopData = $complementaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $complementary): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                <div class="box-header">
                  <h3 class="box-title">
                    <i class="fa <?php echo $complementary->image; ?>"></i> <?php echo $complementary->info_name; ?>

                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <?php  
                      # I'm break rules, but fuc#
                      $content = DB::table('content_info_complementaries')
                                        ->where('info_id','=', $complementary->id)
                                        ->where('user_id','=', Auth::guard($guard)->user()->id)->first();
                     ?>
                    <input type="hidden" name="id[]" value="<?php echo $complementary->id; ?>">
                    <textarea class="textarea" name="description_<?php echo $key; ?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($content->description) ? $content->description : ''; ?></textarea>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                <p class="text-danger">Sem registros</p> 
              <?php endif; ?>

              <div class="box-footer">
                <input type="hidden" name="doctor" value="<?php echo Auth::guard($guard)->user()->id; ?>">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            <?php echo Form::close(); ?>

        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>