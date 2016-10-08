<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listagem de Planos</h3>
                <div class="box-tools">
                    <a href="<?php echo route('admin::cities.create'); ?>" class="btn btn-sm btn-success pull-left" style="margin-right:5px;"><i class="fa fa-plus"></i> Nova Cidade</a>

                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Pesquisar">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo $city->id; ?></td>
                        <td><?php echo $city->name; ?></td>
                        <td>
                            <a href="<?php echo route('admin::cities.show', ['id' => $city->id]); ?>" style="margin-right:5px;" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo route('admin::cities.destroy', ['id' => $city->id]); ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"
                                onclick="event.preventDefault();
                                         document.getElementById('cities.destroy.<?php echo $city->id; ?>').submit();">
                                <i class="fa fa-trash"></i>
                            </a>
                            <?php echo Form::open([ 'route' => ['admin::cities.destroy', $city->id], 'id' => 'cities.destroy.'.$city->id, 'method' => 'delete' ]); ?>

                            <?php echo Form::close(); ?>

                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" style="text-align:center;">Não a registros encontrados</td>
                        </tr>
                    <?php endif; ?>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>