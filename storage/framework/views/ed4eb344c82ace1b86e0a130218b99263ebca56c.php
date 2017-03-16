<?php $__env->startSection('content'); ?>

<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Dentista</h3>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ===================== Department detail page ================== -->
<section class="container">
	<div class="row">
		<div class="col-md-12 block-one">
			<?php if( $doctor->count() >= 1 ): ?>
				<div class="row">
					<div class="col-md-2">
						<?php if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) ): ?>
		                    <img src="<?php echo e(asset('storage/images/doctor/profile/'.$doctor->thumb)); ?>" alt="<?php echo $doctor->name; ?>" class="img-thumbnail">
		                <?php else: ?>
		                    <img src="<?php echo e(asset('images/profile.jpg')); ?>" alt="Sem Imagem" class="img-thumbnail">
		                <?php endif; ?>
					</div>
					<div class="col-md-4 hearder-title">
						<h3>
							<?php echo title_case($doctor->name); ?>

						</h3>
						<p>CRO: <?php echo $doctor->number_cro; ?></p>

						<ul>
							<?php if( $doctor->social_facebook ): ?>
								<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_facebook) ? $doctor->social_facebook : '#'; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php endif; ?>
							<?php if( $doctor->social_twitter ): ?>
								<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_twitter) ? $doctor->social_twitter : '#'; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php endif; ?>
							<?php if( $doctor->social_instagran ): ?>
								<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_instagran) ? $doctor->social_instagran : '#'; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php endif; ?>
							<?php if( $doctor->social_gplus ): ?>
								<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_gplus) ? $doctor->social_gplus : '#'; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<?php if( $gallery->count() >= 1 ): ?>
						<div class="col-md-6">
							<div id="carousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
								    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" <?php echo $key == 0 ? 'class="active"' : ''; ?>></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</ol>

								<div class="carousel-inner" role="listbox">
								    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									    <div class="item <?php echo $key == 0 ? 'active' : ''; ?>">
								  			<?php if( !empty($img->filePath) && file_exists(public_path('storage/images/doctor/gallery/'.$img->filePath)) ): ?>
		                                        <img src="<?php echo e(asset('storage/images/doctor/gallery/'.$img->filePath)); ?>" alt="<?php echo $img->filePath; ?>" style="width: 100%; height:auto;  max-height:359px;">
		                                    <?php else: ?>
		                                        <img src="<?php echo e(asset('images/no-img.png')); ?>" alt="Sem Imagem" style="width: 100%; height:auto;  max-height:359px;">
		                                    <?php endif; ?>
									    </div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</div>

                                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="destaque"><i class="fa fa-map-marker"></i> Endereço</p><hr>
						<p><?php echo title_case($doctor->address).', '.$doctor->number.' - '.title_case($doctor->neighborhood).', '.title_case($doctor->city_name).' - '.$doctor->state_uf; ?></p>
						<?php  
							$complement = !empty($doctor->complement) ? '<p>Complemento: '.title_case($doctor->complement).'</p>' : '';
						 ?>
						<?php echo $complement; ?>

						<p><i class="fa fa-calendar"></i> Horário de Atendimento: <?php echo $doctor->office_hours; ?></p>
						<p class="destaque">
							
							<a href="#" class="btn btn-primary btn-dentist">Ver Telefone</a>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-7 col-xs-12">
						<p class="destaque chamada"><i class="fa fa-medkit"></i> Especialização:</p><hr>
						<ul>
							<?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<li><?php echo $specialization->name; ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</ul>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-7 col-xs-12">
						<p class="destaque chamada"><i class="fa fa-hospital-o"></i> Convênios Odontológicos Aceitos:</p><hr>
						<ul>
							<?php $__currentLoopData = $convenants_accepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenants_accept): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<li><?php echo $convenants_accept->name; ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php $__currentLoopData = $complementaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complementary): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<div class=" col-md-6">
				                    <p class="destaque"><i class="fa <?php echo $complementary['image']; ?>"></i> <?php echo $complementary['info_name']; ?>:</p><hr>
				                    <?php echo $complementary['description']; ?>

								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</div>
					</div> 
					<?php if( $links->count() >= 1 ): ?>
						<div class="col-md-12 col-sm-7 col-xs-12">
							<p class="destaque chamada"><i class="fa fa-link"></i> Links Úteis:</p><hr>
							<ul>
								<?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uri): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<li><a href="<?php echo isset($uri->link) ? $uri->link : '#'; ?>" target="_blank"><?php echo $uri->link; ?></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
				<div class="row" style="margin-top: 50px">
					<div class="col-lg-12 col-md-12 col-sm-7 col-xs-12 maps">
						<p class="destaque"><i class="fa fa-map" aria-hidden="true"></i> Localização</p><hr>
						<div id="google-map" data-latitude="<?php echo $geo['lat']; ?>" data-longitude="<?php echo $geo['long']; ?>"></div>
					</div>
				</div>
			<?php else: ?>
				<div class="text">
					<h3>Nenhum dentista encontrado :(</h3>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- ===================== /Department details page ================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>