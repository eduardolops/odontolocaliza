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
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                    <div class="box-body">
                    <?php echo Form::open([ 'route' => ['doctor::upload', $doctor->id], 'name' => 'upload', 'files'=> true, 'method' => 'put' ]); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Imagem de Perfil:</h4>
                                <hr>
                            </div>
                            <div class="col-md-5">
                                <div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-0" style="margin-bottom: 15px">
                                    <?php if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) ): ?>
                                        <img src="<?php echo e(asset('storage/images/doctor/profile/'.$doctor->thumb)); ?>" alt="<?php echo $doctor->name; ?>" class="img-thumbnail">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/profile.jpg')); ?>" alt="Sem Imagem" class="img-thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <div class="input-group">
                                        <input id="uploadFile" class="form-control" type="text" placeholder="Selecionar Arquivo" disabled="disabled" />
                                        <div class="input-group-btn">
                                            <div class="fileUpload btn btn-default" style="margin:0">
                                                <span>Selecionar</span>
                                                <input type="file" id="uploadBtn" class="upload"  name="upload"/>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Salvar Imagem</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <?php if($errors->has('upload')): ?>
                                        <p class="text-danger"><?php echo $errors->first('upload'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                        <hr>
                    <?php echo Form::open([ 'route' => ['doctor::update_profile', $doctor->id], 'name' => 'doctor', 'method' => 'put' ]); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo Form::label('number_cro', 'Número do CRO'); ?>

                                    <?php echo Form::text('number_cro', $doctor->number_cro, ['class' => 'form-control', 'placeholder' => 'Número do CRO']); ?>

                                    <?php if($errors->has('number_cro')): ?>
                                        <p class="text-danger"><?php echo $errors->first('number_cro'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo Form::label('name', 'Nome Completo'); ?>

                                    <?php echo Form::text('name', $doctor->name, ['class' => 'form-control', 'placeholder' => 'Nome Completo']); ?>

                                    <?php if($errors->has('name')): ?>
                                        <p class="text-danger"><?php echo $errors->first('name'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('email', 'Email'); ?>

                                    <?php echo Form::email('email', $doctor->email, ['class' => 'form-control', 'placeholder' => 'Email']); ?>

                                    <?php if($errors->has('email')): ?>
                                        <p class="text-danger"><?php echo $errors->first('email'); ?></p>
                                    <?php endif; ?>                                    
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('doc_cpf', 'CPF'); ?>

                                    <?php echo Form::text('doc_cpf', $doctor->doc_cpf, ['class' => 'form-control', 'placeholder' => 'CPF', 'data-inputmask' =>'"mask": "999.999.999-99"', 'data-mask' => '']); ?>

                                    <?php if($errors->has('doc_cpf')): ?>
                                        <p class="text-danger"><?php echo $errors->first('doc_cpf'); ?></p>
                                    <?php endif; ?>    
                                </div>
                                <div class="col-md-3">
                                    <?php echo Form::label('phone', 'Telefone do Consultório'); ?>

                                    <?php echo Form::text('phone', $doctor->phone, ['class' => 'form-control', 'placeholder' => 'Telefone Comercial', 'data-inputmask' =>'"mask": "(99) 9999-9999"', 'data-mask' => '']); ?>

                                    <?php if($errors->has('phone')): ?>
                                        <p class="text-danger"><?php echo $errors->first('phone'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo Form::label('cell_phone', 'Celular'); ?>

                                    <?php echo Form::text('cell_phone', $doctor->cell_phone, ['class' => 'form-control', 'placeholder' => 'Celular', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']); ?>

                                    <?php if($errors->has('cell_phone')): ?>
                                        <p class="text-danger"><?php echo $errors->first('cell_phone'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo Form::label('office_hours', 'Horário de Atendimento'); ?>

                                    <?php echo Form::text('office_hours', $doctor->office_hours, ['class' => 'form-control', 'placeholder' => 'Horário de Atendimento' ]); ?>

                                    <p class="help-block">Ex: 8:00 às 17:30</p>
                                    <?php if($errors->has('office_hours')): ?>
                                        <p class="text-danger"><?php echo $errors->first('office_hours'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <?php echo Form::label('social_facebook', 'Facebook'); ?>

                                    <?php echo Form::text('social_facebook', $doctor->social_facebook, ['class' => 'form-control', 'id' => 'social_facebook', 'placeholder' => 'https://']); ?>

                                    <?php if($errors->has('social_facebook')): ?>
                                        <p class="text-danger" id="zip"><?php echo $errors->first('social_facebook'); ?></p>
                                    <?php endif; ?>
                                    <div class="social_facebook"></div>
                                </div>
                                <div class="col-md-3">
                                    <?php echo Form::label('social_instagran', 'Instagram'); ?>

                                    <?php echo Form::text('social_instagran', $doctor->social_instagran, ['class' => 'form-control', 'id' => 'social_instagran', 'placeholder' => 'https://']); ?>

                                    <?php if($errors->has('social_instagran')): ?>
                                        <p class="text-danger" id="zip"><?php echo $errors->first('social_instagran'); ?></p>
                                    <?php endif; ?>
                                    <div class="social_instagran"></div>
                                </div>
                                <div class="col-md-3">
                                    <?php echo Form::label('social_twitter', 'Twitter'); ?>

                                    <?php echo Form::text('social_twitter', $doctor->social_twitter, ['class' => 'form-control', 'id' => 'social_twitter', 'placeholder' => 'https://']); ?>

                                    <?php if($errors->has('social_twitter')): ?>
                                        <p class="text-danger" id="zip"><?php echo $errors->first('social_twitter'); ?></p>
                                    <?php endif; ?>
                                    <div class="social_twitter"></div>
                                </div>
                                <div class="col-md-3">
                                    <?php echo Form::label('social_gplus', 'Google Plus'); ?>

                                    <?php echo Form::text('social_gplus', $doctor->social_gplus, ['class' => 'form-control', 'id' => 'social_gplus', 'placeholder' => 'https://']); ?>

                                    <?php if($errors->has('social_gplus')): ?>
                                        <p class="text-danger" id="zip"><?php echo $errors->first('social_gplus'); ?></p>
                                    <?php endif; ?>
                                    <div class="social_gplus"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <?php echo Form::label('zip_code', 'Cep'); ?>

                                    <?php echo Form::text('zip_code', $doctor->zip_code, ['class' => 'form-control', 'id' => 'zip_code', 'placeholder' => 'Cep', 'data-inputmask' =>'"mask": "99999-999"', 'data-mask' => '']); ?>

                                    <?php if($errors->has('zip_code')): ?>
                                        <p class="text-danger" id="zip"><?php echo $errors->first('zip_code'); ?></p>
                                    <?php endif; ?>
                                    <div class="zip_code"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <?php echo Form::label('address', 'Endereço'); ?>

                                    <?php echo Form::text('address', $doctor->address, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Endereço']); ?>

                                    <?php if($errors->has('address')): ?>
                                        <p class="text-danger"><?php echo $errors->first('address'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-2">
                                    <?php echo Form::label('number', 'Número'); ?>

                                    <?php echo Form::text('number', $doctor->number, ['class' => 'form-control', 'id' => 'number', 'placeholder' => 'Número']); ?>

                                    <?php if($errors->has('number')): ?>
                                        <p class="text-danger"><?php echo $errors->first('number'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('es', 'Complemento'); ?>

                                    <?php echo Form::text('complement', $doctor->complement, ['class' => 'form-control', 'placeholder' => 'Complemento']); ?>

                                    <?php if($errors->has('complement')): ?>
                                        <p class="text-danger"><?php echo $errors->first('complement'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('neighborhood', 'Bairro'); ?>

                                    <?php echo Form::text('neighborhood', $doctor->neighborhood, ['class' => 'form-control', 'id' => 'neighborhood', 'placeholder' => 'Bairro']); ?>

                                    <?php if($errors->has('neighborhood')): ?>
                                        <p class="text-danger"><?php echo $errors->first('neighborhood'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('states', 'Estado'); ?>

                                    <select name="states" class="form-control" id="state">
                                        <option value="">-- Selecione --</option>
                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo $state->id; ?>" <?php echo $state->id == $doctor->states ? 'selected' : ''; ?>><?php echo $state->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('states')): ?>
                                        <p class="text-danger"><?php echo $errors->first('states'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('city', 'Cidade'); ?>

                                    <select name="city" class="form-control" id="city">
                                        <option value="">-- Selecione --</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo $city->id; ?>" <?php echo $city->id == $doctor->city ? 'selected' : ''; ?>><?php echo $city->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('city')): ?>
                                        <p class="text-danger"><?php echo $errors->first('city'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo Form::label('password', 'Senha'); ?>

                                    <?php echo Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Senha']); ?>

                                    <?php if($errors->has('password')): ?>
                                        <p class="text-danger"><?php echo $errors->first('password'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo Form::label('password_confirmation', 'Confirmar Senha'); ?>

                                    <?php echo Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => 'Confirmar Senha']); ?>

                                    <?php if($errors->has('password')): ?>
                                        <p class="text-danger"><?php echo $errors->first('password'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <?php echo Form::hidden('country', 1); ?>

                            <?php echo Form::submit('Salvar',['class' => 'btn btn-primary']); ?>

                        </div>
                    <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>