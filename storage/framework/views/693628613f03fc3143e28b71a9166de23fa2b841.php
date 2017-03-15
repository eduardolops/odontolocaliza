<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('admin.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <div class="box">
            <div class="box-header">
                <div class="pull-left">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" name="doctor" class="form-control input-sm" placeholder="Nome do Doutor">
                        </div>
                        <div class="form-group">
                            <select name="plan" class="form-control input-sm">
                                <option value="">Selecione Plano</option>
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo str_slug($plan->name, '_'); ?>"><?php echo $plan->name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control input-sm">
                                <option value="">Selecione Status</option>
                                <option value="active">Ativos</option>
                                <option value="suspend">Inativos</option>
                                <option value="pending">Pendentes</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Pesquisar</button>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Nome do Doutor</th>
                        <th>Plano</th>
                        <th>Status</th>
                        <th>Telefone</th>
                        <th>Data Cadastro</th>
                        <th>Ações</th>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo str_pad($doctor->id, 4, "0", STR_PAD_LEFT);; ?></td>
                            <td><?php echo title_case($doctor->name); ?></td>
                            <td><?php echo title_case( str_replace('_', ' ', $doctor->subscription_plan) ); ?></td>
                            <td><?php echo convertTypeStatus($doctor->status); ?></td>
                            <td><?php echo $doctor->phone; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($doctor->created_at)); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm" onclick="window.open('<?php echo route('admin::doctors.logar', ['user_id' => $doctor->id]); ?>', '_blank');" >
                                        <i class="fa fa-sign-in" aria-hidden="true"></i> Logar no Painel
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo route('admin::doctors.show', ['id' => $doctor->id]); ?>"><i class="fa fa-edit"></i>Editar</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    <?php endif; ?>

                </table>
                <div style="text-align:center">
                    <?php echo $doctors->appends(['status' => request()->status])->links(); ?>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>