<?php $__env->startSection('content'); ?>

<!-- ========================== Innaer Banner ========================= -->
<section id="inner_banner">
	<div class="overlay">
		<div class="container">
			<h3>Entre em Contato conosco</h3>
		</div>
	</div>
</section>
<!-- /inner_banner -->
<!-- ========================== /Innaer Banner ========================= -->
<!-- ====================== Conatct Information ========================= -->
<div class="information_area container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single_info">
            <div class="icon">
                <span class="transition3s ficon flaticon-map"></span>
            </div>
            <!-- /icon -->
            <h6>Endereço</h6>
            <p>60 City Center Ave. ADC 0708</p>
        </div>
        <!-- /single_info -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single_info">
            <div class="icon">
                <span class="transition3s ficon flaticon-message"></span>
            </div>
            <!-- /icon -->
            <h6>Email de Contato</h6>
            <p>contato@odontolocaliza.com</p>
        </div>
        <!-- /single_info -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 single_info">
            <div class="icon">
                <span class="transition3s ficon flaticon-phone"></span>
            </div>
            <!-- /icon -->
            <h6>Telefone</h6>
            <p>(880) 1723801729</p>
        </div>
        <!-- /single_info -->
    </div>
</div>
<!-- /information_area -->
<!-- ====================== /Conatct Information ========================= -->
<!-- ============================ Contact Form =========================== -->
<div class="contact_us_form">
    <div class="container">
        <?php echo Form::open([ 'route' => 'contact_store', 'name' => 'contact', 'method' => 'post' ]); ?>

        <h4>Ficamos muito contentes com o seu contato, diga um olá para a Odontolocaliza!</h4>
        <div class="input_wrapper row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 block_two">
                <?php if(session('message')): ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input name="name" type="text" placeholder="Nome" required>
                    <?php if($errors->has('name')): ?>
                        <span class="help-block text-danger" style="margin-top:-10px"><?php echo $errors->first('name'); ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input name="email" type="email" placeholder="Email" required>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block text-danger" style="margin-top:-10px"><?php echo $errors->first('email'); ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="message" placeholder="Mensagem" required></textarea>
                    <?php if($errors->has('message')): ?>
                        <span class="help-block text-danger" style="margin-top:-10px"><?php echo $errors->first('message'); ?></span>
                    <?php endif; ?>
                    <button class="transition3s" title="Send">Enviar</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 block_one">
                <div id="google-map" style="height:461px" data-latitude="-22.1038738" data-longitude="-51.3936998"></div>
            </div>
        </div>
        <!-- /input_wrapper -->
        <?php echo e(Form::close()); ?>

        <div id="success">
            <button class="closeAlert">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            <div class="wrapper">
                <p>
                    Your message was sent successfully!</p>
            </div>
        </div>
        <div id="error">
            <button class="closeAlert">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            <div class="wrapper">
                <p>
                    Something went wrong, try refreshing and submitting the form again.</p>
            </div>
        </div>
    </div>
</div>
<!-- /contact_form -->
<!-- ============================ /Contact Form =========================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>