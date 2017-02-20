<?php $__env->startSection('content'); ?>
<!-- ======================= Banner ======================== -->
<?php echo $__env->make('layout.structures.banner-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- =========================== /Banner =========================== -->
<!-- ================= Appointment ================== -->
<?php echo $__env->make('layout.structures.search-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- ================= Appointment ================== -->
<!-- ======================= Department =================== -->
<section class="departments container department_two">
		<div class="title_holder_center title_holder">				
			<h3>O QUE FAZEMOS DE MELHOR</h3>
		</div> <!-- /title_holder_center -->
		<div class="department_item_wrapper">
		<div class="department_item">
				<div class="single_item transition3s">
					<div class="bg transition3s"><span class="icon icon-guia"></span></div>
					<h4>Seu Guia</h4>
					<p>A OdontoLocaliza é um Guia Odontológico Online onde você encontra os melhores profissionais odontológicos do Brasil.</p>						
				</div> <!-- End .single_item -->
				<div class="single_item middle_item transition3s">
					<div class="bg transition3s"><span class="icon icon-especialista"></span></div>
					<h4>Profissionais Especializados</h4>
					<p>Contamos com profissionais especializados em várias áreas atendendo em todo o Brasil, se precisar é só nos consultar.</p>						
				</div> <!-- End .single_item -->
				<div class="single_item transition3s">
					<div class="bg transition3s"><span class="icon icon-qualificacao"></span></div>
					<h4>Qualificação</h4>
					<p>Como garantia de qualidade aqui você encontra apenas profissionais com Registro Válidos no CFO e CRO's.</p>
				</div> <!-- End .single_item -->
			</div> <!-- End .practise_item -->
			<div class="department_item">
				<div class="single_item transition3s">
					<div class="bg transition3s"><span class="icon icon-plano-odonto"></span></div>
					<h4>Planos Odontológicos</h4>
					<p>Se você já possui um plano odontológico fica ainda mais fácil encontrar um profissional, basta nos informar.</p>	
				</div> <!-- End .single_item -->
				<div class="single_item transition3s">
					<div class="bg transition3s"><span class="icon icon-endereco"></span></div>
					<h4>Localização</h4>
					<p>Encontre a localização do consultório, clinica, hospital ou laboratório de atuação do seu dentista.</p>						
				</div> <!-- End .single_item -->
				<div class="single_item transition3s middle_item">
					<div class="bg transition3s"><span class="icon icon-economia"></span></div>
					<h4>O seu dinheiro vale mais</h4>
					<p>Aqui você realiza pesquisas gratuitas para encontrar o profissional que deseja.</p>						
				</div> <!-- End .single_item -->
			</div> <!-- End .department_item -->
		</div> <!-- End .department_item_wrapper -->
	</section>
<!-- ========================= /Department =================== -->

<!-- ======================== Why choose us ===================== -->
    <section class="why_choose_us">			
				<div class="left_side"></div>
				<div class="right_side">
					<div class="opacity">
						<div class="title_holder">
							<h3 style="margin-top:-6px;">Como <span> Funciona ?</span></h3>
							<span></span>
							<p>Na Odontolocaliza os melhores dentistas estão sempre por perto!</p>
						</div>
						<div class="text">
							<div class="choose_reason item1">
								<h5>Procurou</h5>
								<p>Clique no campo procurar, para encontrar seu dentista.</p>
							</div> <!-- End .choose_reason -->

							<div class="choose_reason item2">
								<h5>Localizou</h5>
								<p>Verifique a localização do dentista mais próximo de você.</p>
							</div> <!-- End .choose_reason -->
					
							<div class="choose_reason item3">
								<h5>Agendou</h5>
								<p>Entre em contato e agende sua consulta.</p>
							</div> <!-- End .choose_reason -->
						</div> <!-- End .text -->
					</div> <!-- End .opacity -->
				</div> <!-- End .right_side -->
				<div class="clear_fix"></div>
		</section>
    <!-- /why_choose_us -->
    <!-- ======================== /Why choose us ===================== -->

<!-- ========================== Our Doctors ========================-->
<section class="our_founder container">
	<div class="title_holder_center">			
		<h3>Profissionais que<span class="firm"> Recomendamos</span></h3>
		<span></span>
		<p>Profissionais em que confiamos e recomendamos para você</p>
	</div>
	<div class="row owl_slider">
		<div id="founder_slider">
			<?php $__empty_1 = true; $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
				<div class="item">
					<div class="founder_member">
						<div class="img_holder">
							<?php if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) ): ?>
                                <img src="<?php echo e(asset('storage/images/doctor/profile/'.$doctor->thumb)); ?>" alt="<?php echo $doctor->name; ?>" class="img-responsive">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/profile.jpg')); ?>" alt="Sem Imagem" class="img-responsive">
                            <?php endif; ?>

                            <?php 
								$uri = [
										'state' => str_slug($doctor->state_name.'-'.$doctor->state_id, '-'), 
										'city'  => str_slug($doctor->city_name.'-'.$doctor->city_id, '-'),
										'name'  => str_slug($doctor->name.'-'.$doctor->id, '-')
									];
							 ?>

							<div class="overlay transition3s">
	                            <div class="desc">
	                                <a href="<?php echo route('single_doctor', $uri); ?>"><h2><?php echo title_case($doctor->name); ?></h2></a>
	                            </div>
								<ul>
									<?php if($doctor->social_facebook): ?>
										<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_facebook) ? $doctor->social_facebook : '#'; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<?php endif; ?>
									<?php if($doctor->social_twitter): ?>
										<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_twitter) ? $doctor->social_twitter : '#'; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<?php endif; ?>
									<?php if($doctor->social_instagran): ?>
										<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_instagran) ? $doctor->social_instagran : '#'; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
									<?php endif; ?>
									<?php if($doctor->social_gplus): ?>
										<li class="round_border transition3s"><a href="<?php echo isset($doctor->social_gplus) ? $doctor->social_gplus : '#'; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									<?php endif; ?>
								</ul>
							</div>
						</div> <!-- /img_holder -->                       
						<div class="text">
							<a href="<?php echo route('single_doctor', $uri); ?>"><h4>Dr(a) <?php echo title_case($doctor->name); ?></h4></a>
							<span></span>
						</div>
					</div> <!-- /founder_member -->
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
				<?php for($i=1; $i<=4; $i++): ?>
					<div class="item">
						<div class="founder_member">
							<div class="img_holder">
	                            <img src="<?php echo e(asset('images/profile.jpg')); ?>" alt="Sem Imagem" class="img-responsive">
								<div class="overlay transition3s">
		                           	Usuário Teste
								</div>
							</div> <!-- /img_holder -->                       
							<div class="text">
								<h4>Usuário Teste</h4>
								<span></span>
							</div>
						</div> <!-- /founder_member -->
					</div>
				<?php endfor; ?>
			<?php endif; ?>
		</div> <!-- /#founder_slider -->
	</div> <!-- /owl_slider -->
</section>
<!-- /our_founder -->
<!-- ========================== /Our Founder ========================-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>