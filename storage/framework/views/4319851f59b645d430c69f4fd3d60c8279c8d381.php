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
            <div class="box-header">
                <div class="pull-left">
                    <?php echo Form::open([ 'route' => 'doctor::create_specializations', 'class' => 'form-inline', 'method' => 'post' ]); ?>

                        <div class="form-group">
                            <label>Nova Especialidade:</label>
                            <select name="specialization_id" class="form-control input-sm" required>
                                <option value="">Selecione uma nova especialidade</option>
                                <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo $specialization->id; ?>"><?php echo $specialization->name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo Auth::guard($guard)->user()->id; ?>">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</button>
                        <?php if($errors->has('specialization_id')): ?>
                            <p class="text-danger"><?php echo $errors->first('specialization_id'); ?></p>
                        <?php endif; ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Especialização</th>
                        <th>Ações</th>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $specialization_doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo $specialization->id; ?></td>
                            <td><?php echo $specialization->name; ?></td>
                            <td>
                                <a href="<?php echo route('doctor::destroy_specializations', ['id' => $specialization->id]); ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                    onclick="event.preventDefault();
                                             document.getElementById('specialization.destroy.<?php echo $specialization->id; ?>').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <?php echo Form::open([ 'route' => ['doctor::destroy_specializations', $specialization->id], 'id' => 'specialization.destroy.'.$specialization->id, 'method' => 'delete' ]); ?>

                                <?php echo Form::close(); ?>

                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    <?php endif; ?>

                </table>
                <div style="text-align:center">
                    <?php echo $specialization_doctor->links(); ?>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>