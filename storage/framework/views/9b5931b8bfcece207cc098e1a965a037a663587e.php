<div class="appointment">
    <div class="container">
        <div class="row">
            <?php echo Form::open([ 'route' => 'search_doctor', 'name' => 'search', 'method' => 'get' ]); ?>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <label>Estado</label>
                <select name="state" id="state" required="required">
                    <option value="">-- Selecione --</option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    <option value="<?php echo str_slug($state->name,'-').'-'.$state->id; ?>"><?php echo title_case($state->name); ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php if($errors->has('states')): ?>
                    <p class="text-danger" style="color:#fff;"><?php echo $errors->first('states'); ?></p>
                <?php endif; ?>
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <label>Cidade</label>
                <select name="city" id="city" required="required">
                    <option value="">-- Selecione --</option>
                </select>
                <?php if($errors->has('city')): ?>
                    <p class="text-danger" style="color:#fff;"><?php echo $errors->first('city'); ?></p>
                <?php endif; ?>
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <label>Especialização</label>
                <select name="specialization">
                    <option value="">-- Selecione --</option>
                    <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    <option value="<?php echo str_slug($specialization->name,'-').'-'.$specialization->id; ?>"><?php echo $specialization->name; ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php if($errors->has('specialization')): ?>
                    <p class="text-danger" style="color:#fff;"><?php echo $errors->first('specialization'); ?></p>
                <?php endif; ?>
            </div>
            <!-- end col-4 -->
            <div class="col-xs-12 hidden-xs">
                <hr>
            </div>
            <!-- end col-12 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <label>Planos Odontológicos</label>
                <select name="plan">
                    <option value="">-- Selecione --</option>
                    <?php $__currentLoopData = $healths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $health): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	                    <option value="<?php echo str_slug($health->name,'-').'-'.$health->id; ?>"><?php echo $health->name; ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php if($errors->has('plan')): ?>
                    <p class="text-danger" style="color:#fff;"><?php echo $errors->first('plan'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 department">
                <label>Nome do Dentista</label>
                <input type="text" name="name">
                <?php if($errors->has('name')): ?>
                    <p class="text-danger" style="color:#fff;"><?php echo $errors->first('name'); ?></p>
                <?php endif; ?>
            </div>
            <!-- end col-3 -->
            <div class="col-md-4 col-sm-12 col-xs-12 gender">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
            </div>
            <!-- end col-4 -->
            <?php echo Form::close(); ?>

            <!-- end form -->
        </div>
    </div>
    <!-- /Appointment -->
</div>
<!-- End .Appointment -->