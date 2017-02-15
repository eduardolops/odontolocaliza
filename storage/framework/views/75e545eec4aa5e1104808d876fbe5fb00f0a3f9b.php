<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('doctor.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="row">
	            <div class="col-md-12">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="col-md-12">
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <h4>Detalhes da Assinatura</h4>
	                                    <div class="subscription-details">
	                                        <table class="table table-hover">
	                                            <tbody>
	                                            <tr>
	                                                <td class="text-right">
	                                                    Validade:
	                                                </td>
	                                                <td>
	                                                    <?php if($user->isExpired()): ?>
	                                                        <label class="label label-danger">
	                                                            Expirado em <?php echo e(with(new DateTime($user->expires_at))->format('d/m/Y')); ?>

	                                                        </label>
	                                                    <?php else: ?>
	                                                        <label class="label label-success">
	                                                            Expira em <?php echo e(with(new DateTime($user->expires_at))->format('d/m/Y')); ?>

	                                                        </label>
	                                                    <?php endif; ?>
	                                                </td>
	                                            </tr>
	                                            <tr>
	                                                <td class="text-right">Plano:</td>
	                                                <td>
	                                                    <label class="label label-primary">
	                                                        <?php echo e(title_case($subscription->plan_name)); ?> (R$ <?php echo e(number_format(($subscription->price_cents / 100), 2, ',', '.')); ?>)
	                                                    </label>
	                                                </td>
	                                            </tr>
	                                            <tr>
	                                                <td class="text-right">Estado:</td>
	                                                <td>
	                                                    <?php if($user->isSuspended()): ?>
	                                                        <label class="label label-danger">
	                                                            Suspensa
	                                                        </label>
	                                                    <?php else: ?>
	                                                        <label class="label label-success">
	                                                            Ativa
	                                                        </label>
	                                                    <?php endif; ?>
	                                                </td>
	                                            </tr>

	                                            </tbody>
	                                        </table>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                    <h4>Pagamentos Recorrentes</h4>
	                                    Se deseja optar pela praticidade dos pagamentos automáticos, basta selecionar a opção <strong>"Usar este cartão de crédito em cobranças futuras"</strong> ao pagar sua próxima fatura.
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <h4>Alterar Plano</h4>

	                                    <form role="form" class="form-sm form-horizontal" method="post" action="<?php echo e(route('subscription.update', [ 'id' =>$user->id ])); ?>">
	                                        <input type="hidden" name="_method" value="PUT">
	                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	                                        <input type="hidden" name="action" value="plan">

	                                        <div class="col-md-9">
	                                            <div class="form-group">
	                                                <select name="plan" class="form-control">
	                                                	<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		                                                    <?php if($user->subscription_plan != $plan->identifier): ?>
		                                                        <option value="<?php echo e($plan->identifier); ?>"><?php echo e(title_case($plan->name)); ?> (R$ <?php echo e(number_format(($plan->price), 2, ',', '.')); ?>)</option>
		                                                    <?php endif; ?>
	                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="col-md-3">
	                                            <div class="form-group text-right">
	                                                <button class="btn btn-primary" type="submit">Confirmar</button>
	                                            </div>
	                                        </div>
	                                    </form>
	                                </div>
	                                <div class="col-md-6">
	                                    <h4><?php if( $user->isSuspended() ): ?> Reativar Assinatura <?php else: ?> Suspender Assinatura <?php endif; ?></h4>
	                                    <form role="form" class="form-sm form-horizontal" method="post" action="<?php echo e(route('subscription.update', [ 'id' =>$user->id ])); ?>">
	                                        <input type="hidden" name="_method" value="PUT">
	                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	                                        <?php if($user->isSuspended()): ?>
	                                            <input type="hidden" name="action" value="activate">
	                                        <?php else: ?>
	                                            <input type="hidden" name="action" value="suspend">
	                                        <?php endif; ?>

	                                        <div class="row">
	                                            <div class="input-group">
	                                                <div class="col-md-9">
	                                                    <?php if($user->isSuspended()): ?>
	                                                        Caso a assinatura ainda não tenha expirado, uma nova fatura só será gerada próximo a data de expiração.
	                                                    <?php else: ?>
	                                                        Uma assinatura suspensa continuará válida até a data de expiração, porém novas faturas não serão geradas.
	                                                    <?php endif; ?>
	                                                </div>
	                                                <div class="col-md-3">
	                                                    <?php if($user->isSuspended()): ?>
	                                                        <button class="btn btn-success" type="submit">Reativar</button>
	                                                    <?php else: ?>
	                                                        <button class="btn btn-danger" type="submit">Suspender</button>
	                                                    <?php endif; ?>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </form>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-12">&nbsp;</div>
	                        </div>
	                        
	                        <div class="row"><hr></div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="col-md-12">
	                                    <h4>Faturas Recentes:</h4>
	                                </div>
	                                <div class="col-md-12">
	                                    <?php if(count($subscription->recent_invoices)): ?>
	                                        <table class="table table-striped">
	                                            <thead>
	                                            <tr>
	                                                <th>Vencimento</th>
	                                                <th>Valor</th>
	                                                <th>Status</th>
	                                                <th class="text-right">Ações</th>
	                                            </tr>
	                                            </thead>
	                                            <tbody>
	                                            <?php $__currentLoopData = $subscription->recent_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                                                <tr>
	                                                    <td><?php echo e(with(new DateTime($inv->due_date))->format('d/m/Y')); ?></td>
	                                                    <td><?php echo e($inv->total); ?></td>
	                                                    <td>
	                                                        <?php if($inv->status == 'draft'): ?>
	                                                            Rascunho
	                                                        <?php elseif($inv->status == 'pending'): ?>
	                                                            Pendente
	                                                        <?php elseif($inv->status == 'partilly_paid'): ?>
	                                                            Parcialmente Paga
	                                                        <?php elseif($inv->status == 'paid'): ?>
	                                                            Paga
	                                                        <?php elseif($inv->status == 'canceled'): ?>
	                                                            Cancelada
	                                                        <?php elseif($inv->status == 'refunded'): ?>
	                                                            Reembolsada
	                                                        <?php elseif($inv->status == 'expired'): ?>
	                                                            Expirada
	                                                        <?php else: ?>
	                                                            <?php echo e($inv->status); ?>

	                                                        <?php endif; ?>
	                                                    </td>
	                                                    <td class="text-right">
	                                                        <?php if($inv->status == 'draft'): ?>
	                                                            <a class="btn btn-sm btn-warning" target="_blank" href="<?php echo e($inv->secure_url); ?>">Visualizar</a>
	                                                        <?php elseif($inv->status == 'pending'): ?>
	                                                            <a class="btn btn-sm btn-warning" target="_blank" href="<?php echo e($inv->secure_url); ?>">Efetuar Pagamento</a>
	                                                        <?php elseif($inv->status == 'partilly_paid'): ?>
	                                                            <a class="btn btn-sm btn-warning" target="_blank" href="<?php echo e($inv->secure_url); ?>">Paga Parcialmente</a>
	                                                        <?php elseif($inv->status == 'paid'): ?>
	                                                            <a class="btn btn-sm btn-success" target="_blank" href="<?php echo e($inv->secure_url); ?>">Comprovante</a>
	                                                        <?php elseif($inv->status == 'canceled'): ?>
	                                                            <a class="btn btn-sm btn-default" target="_blank" href="<?php echo e($inv->secure_url); ?>">Visualizar</a>
	                                                        <?php elseif($inv->status == 'refunded'): ?>
	                                                            <a class="btn btn-sm btn-success" target="_blank" href="<?php echo e($inv->secure_url); ?>">Comprovante</a>
	                                                        <?php elseif($inv->status == 'expired'): ?>
	                                                            <a class="btn btn-sm btn-danger" target="_blank" href="<?php echo e($inv->secure_url); ?>">Expirada</a>
	                                                        <?php else: ?>
	                                                            <?php echo e($inv->status); ?>

	                                                        <?php endif; ?>

	                                                    </td>

	                                                </tr>
	                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                            </tbody>
	                                        </table>
	                                    <?php else: ?>
	                                        <div class="col-md-12">
	                                            Nenhuma Fatura Recente
	                                        </div>
	                                    <?php endif; ?>
	                                </div>
	                            </div>

	                        </div>

	                        <div class="row"><hr></div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="col-md-12">
	                                    <h4>Histórico da Assinatura:</h4>
	                                </div>
	                                <div class="col-md-12">
	                                    <?php if(count($subscription->logs)): ?>
	                                        <table class="table table-striped">
	                                            <thead>
	                                            <tr>
	                                                <th>Data</th>
	                                                <th>Descrição</th>
	                                                <th>Detalhes</th>
	                                            </tr>
	                                            </thead>
	                                            <tbody>
	                                            <?php $__currentLoopData = $subscription->logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                                                <tr>
	                                                    <td><?php echo e(with(new DateTime($log->created_at))->format('d/m/Y H:i:s')); ?></td>
	                                                    <td><?php echo e($log->description); ?></td>
	                                                    <td><?php echo e($log->notes); ?></td>
	                                                </tr>
	                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	                                            </tbody>
	                                        </table>
	                                    <?php else: ?>
	                                        Nenhuma movimentação recente.
	                                    <?php endif; ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>