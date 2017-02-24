<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('doctor.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="row" style="margin-top:30px">
                <div class="block">
                    <div class="col-md-4 col-sm-6 col-md-offset-2">
                            <ul class="pricing p-blue">
                                <li class="bg-blue-light">
                                    <big><?php echo e(title_case($plans[0]->name)); ?></big>
                                </li>
                                <li>
                                    Dados de localização e contato
                                </li>
                                <li>
                                    Áreas de atuação
                                </li>
                                <li>
                                    Foto ilustrativa
                                </li>
                                <li>
                                    Qualificações
                                </li>
                                <li>
                                    Convênios
                                </li>
                                <li class="bg-white">
                                    <h3 class="blue-light">R$ <?php echo e(number_format($plans[0]->price, 2, ',', '')); ?></h3>
                                    <span>por mês</span>
                                </li>
                                <li class="bg-white">
                                    <form role="form" method="post" action="<?php echo e(route('billings.subscription')); ?>">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="user" value="<?php echo e(Auth::guard($guard)->user()->id); ?>">
                                        <input type="hidden" name="plan" value="<?php echo e($plans[0]->id); ?>">
                                        <button type="submit">ASSINAR PLANO</button>
                                    </form>
                                </li>
                            </ul>
                    </div>
                    <div class="col-md-4 col-sm-6">
                            <ul class="pricing p-blue">
                                <li class="bg-blue-light">
                                    <big><?php echo e(title_case($plans[1]->name)); ?></big>
                                </li>
                               <li>
                                    Dados de localização e contato
                                </li>
                                <li>
                                    Áreas de atuação
                                </li>
                                <li>
                                    Foto ilustrativa + 5 fotos adicionais
                                </li>
                                <li>
                                    Qualificações e Convênios
                                </li>
                                <li>
                                    Link para site
                                </li>
                                <li class="bg-white">
                                    <h3 class="blue-light">R$ <?php echo e(number_format($plans[1]->price, 2, ',', '')); ?></h3>
                                    <span>por mês</span>
                                </li>
                                <li class="bg-white">
                                    <form role="form" method="post" action="<?php echo e(route('billings.subscription')); ?>">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="user" value="<?php echo e(Auth::guard($guard)->user()->id); ?>">
                                        <input type="hidden" name="plan" value="<?php echo e($plans[1]->id); ?>">
                                        <button type="submit">ASSINAR PLANO</button>
                                    </form>
                                </li>
                            </ul>
                    </div>
                </div><!-- /block -->
            </div><!-- /row -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>