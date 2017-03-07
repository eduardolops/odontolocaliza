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
           <div class="row box-header">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="<?php echo route('doctor::links_create'); ?>" class="btn btn-sm btn-success" style="margin-right:5px;"><i class="fa fa-plus"></i> Cadastrar Novo Link</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Urls</th>
                        <th>Ações</th>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <a href="<?php echo $url->link; ?>" target="_blank"><?php echo $url->link; ?></a>
                            </td>
                            <td>
                                <a href="<?php echo route('doctor::links_show', ['id' => $url->id]); ?>" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo route('doctor::links_destroy', $url->id); ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir" 
                                    onclick="event.preventDefault();
                                             document.getElementById('links_destroy.<?php echo $url->id; ?>').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <?php echo Form::open([ 'route' => ['doctor::links_destroy', $url->id], 'id' => 'links_destroy.'.$url->id, 'method' => 'delete' ]); ?>

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
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>