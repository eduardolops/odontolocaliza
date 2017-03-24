<?php $__env->startSection('content'); ?>

<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Resultados da busca</h3>
			Resultado da pesquisa: <b><?php echo $doctors->count(); ?></b>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ===================== Department detail page ================== -->
<section class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 search-row">	
			<?php if( $doctors->count() >= 1 ): ?>
				<div class="row col-md-12">
					<div class="title_holder title_row">
						<h3><?php echo str_replace('-', '', $page_title); ?></h3>
						<span></span>
					</div>
				</div>
			<?php endif; ?>
			<?php $__empty_1 = true; $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
				<div class="row block-row">
					<div class="col-md-2 ">
						<?php if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) ): ?>
		                    <img src="<?php echo e(asset('storage/images/doctor/profile/'.$doctor->thumb)); ?>" alt="<?php echo $doctor->name; ?>" class="img-thumbnail">
		                <?php else: ?>
		                    <img src="<?php echo e(asset('images/profile.jpg')); ?>" alt="Sem Imagem" class="img-thumbnail">
		                <?php endif; ?>
					</div>
					<div class="col-md-4">
						<?php 
							$uri = [
									'state' => str_slug($doctor->state_name.'-'.$doctor->state_id, '-'), 
									'city'  => str_slug($doctor->city_name.'-'.$doctor->city_id, '-'),
									'name'  => str_slug($doctor->name.'-'.$doctor->id, '-')
								];
						 ?>
						<h3>
							<a href="<?php echo route('single_doctor', $uri); ?>" style="color:#25a9e0;"><?php echo title_case($doctor->name); ?></a>
						</h3>
						<p>CRO: <?php echo $doctor->number_cro; ?></p>
						<p>
							<?php echo title_case($doctor->address).', '.$doctor->number.' - '.title_case($doctor->neighborhood).', '.title_case($doctor->city_name).' - '.$doctor->state_uf; ?>

						</p>

						<a href="<?php echo route('single_doctor', $uri); ?>" class="main_button"><i class="fa fa-plus" aria-hidden="true"></i> Ver Perfil</a>
					</div>
				</div>
				<hr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
				<div class="error_page" style="margin-top:120px">
			        <h2>Nenhum resultado encontrado :(</h2>
			        <p style="text-align:center; margin-top:-50px;"><?php echo str_replace('-', '', $page_title); ?></p>
			        <a href="<?php echo route('home'); ?>" class="button"><i class="fa fa-search" aria-hidden="true"></i> Faça uma nova Pesquisa</a>
			    </div>
			<?php endif; ?>
			<?php 
				$uri = [
							'state'           => request()->state,
							'city'            => request()->city,
							'specialization'  => request()->specialization,
							'plan'            => request()->plan,
							'name'            => request()->name,
						];
			 ?>
			<div class="text-center">
				<?php echo e($doctors->appends($uri)->links()); ?>

			</div>
		</div>
	</div>
</section>
<!-- ===================== /Department details page ================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>