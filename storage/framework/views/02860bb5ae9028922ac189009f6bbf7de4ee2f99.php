<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('doctor.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <?php if(is_array($errors)): ?>
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo 'Erro: '. $k .' '.$erro. '<br>'; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <p>Se você tiver alguma dúvida entre em contato conosco </p>
            </div>
        <?php endif; ?>
        <div class="box">
            <div class="row" style="margin-top:30px">
                <div class="block">
                    <div class="col-md-12" style="text-align:center; margin-bottom:25px; ">
                        <h4>Aproveite o teste <strong class="blue-light">GRÁTIS</strong> por <strong class="blue-light">10 dias</strong>.</h4>
                        <h4>
                            A primeira mensalidade só será cobrada após o término do período de teste.
                        </h4>
                    </div>
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
                                        <button type="submit">EXPERIMENTE POR 10 DIAS GRÁTIS</button>
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
                                        <button type="submit">EXPERIMENTE POR 10 DIAS GRÁTIS</button>
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