<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('doctor.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
            <?php if(session('warning')): ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>
            
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="box box-info box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Seja Bem Vindo</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <p>
                                Complete o seu cadastro para ter uma melhor divulgação. Acesse: Meus Dados / Dados Pessoais
                            </p>
                            <p>
                                Complete o seu cadastro adicionando uma imagem de perfil (2M tamanho máximo permitido), adicione o seu horário de atendimento e telefones, coloque também suas redes socias, assim para um maior contato e interação com seus pacientes.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="margin-bottom:-13px">Estatísticas de Acesso do seu Perfil</h4>
                            <hr>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo e($totalView['viewPage']); ?></h3>
                                        
                                    <p>Perfil Visualizado</p>
                                </div>
                                <div class="icon" >
                                    <i class="fa fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php echo e($totalView['viewPhone']); ?></h3>
                                        
                                    <p>Telefone Visualizado</p>
                                </div>
                                <div class="icon" >
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>