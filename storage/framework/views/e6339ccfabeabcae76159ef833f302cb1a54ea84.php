<!-- form start -->
<?php echo Form::open([ 'route' => 'doctor.store', 'name' => 'new-doctor', 'method' => 'post' ]); ?>

        <div class="row">
            <div class="col-md-3">
                <?php echo Form::label('number_cro', 'Inscrição do CRO', ['class' => 'label']); ?>

                <?php echo Form::text('number_cro', '', ['class' => 'form-control', 'placeholder' => 'Número do CRO', 'required' => 'required']); ?>

                <?php if($errors->has('number_cro')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('number_cro'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo Form::label('name', 'Nome Completo', ['class' => 'label']); ?>

                <?php echo Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome Completo']); ?>

                <?php if($errors->has('name')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('name'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo Form::label('email', 'Email', ['class' => 'label']); ?>

                <?php echo Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']); ?>

                <?php if($errors->has('email')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('email'); ?></p>
                <?php endif; ?>                                    
            </div>
            <div class="col-md-6">
                <?php echo Form::label('doc_cpf', 'CPF', ['class' => 'label']); ?>

                <?php echo Form::text('doc_cpf', '', ['class' => 'form-control', 'placeholder' => 'CPF', 'data-inputmask' =>'"mask": "999.999.999-99"', 'data-mask' => '']); ?>

                <?php if($errors->has('doc_cpf')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('doc_cpf'); ?></p>
                <?php endif; ?>    
            </div>
            <div class="col-md-3">
                <?php echo Form::label('healthinsurance', 'Planos Odontológicos Aceitos', ['class' => 'label']); ?>

                <select name="healthinsurance[]" id="healthinsurance" multiple="multiple">
                    <?php $__currentLoopData = $healths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $health): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo str_slug($health->name,'-').'-'.$health->id; ?>"><?php echo $health->name; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php if($errors->has('specialization')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('specialization'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php echo Form::label('specialization', 'Especialidade', ['class' => 'label']); ?>

                <select name="specialization[]"  id="specialization" multiple="multiple">
                    <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialization): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo str_slug($specialization->name,'-').'-'.$specialization->id; ?>"><?php echo $specialization->name; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php if($errors->has('specialization')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('specialization'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php echo Form::label('phone', 'Telefone Comercial', ['class' => 'label']); ?>

                <?php echo Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Telefone Comercial', 'data-inputmask' =>'"mask": "(99) 9999-9999"', 'data-mask' => '']); ?>

                <?php if($errors->has('phone')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('phone'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php echo Form::label('cell_phone', 'Celular', ['class' => 'label']); ?>

                <?php echo Form::text('cell_phone', '', ['class' => 'form-control', 'placeholder' => 'Celular', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']); ?>

                <?php if($errors->has('cell_phone')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('cell_phone'); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?php echo Form::label('zip_code', 'Cep', ['class' => 'label']); ?>

                <?php echo Form::text('zip_code', '', ['id' => 'zip_code', 'class' => 'form-control zip_code', 'placeholder' => 'Cep', 'data-inputmask' =>'"mask": "99999-999"', 'data-mask' => '']); ?>

                <?php if($errors->has('zip_code')): ?>
                    <p class="text-danger" style="font-size:13px" id="zip"><?php echo $errors->first('zip_code'); ?></p>
                <?php endif; ?>
                <div class="zip_code"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <?php echo Form::label('address', 'Endereço', ['class' => 'label']); ?>

                <?php echo Form::text('address', '', ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Endereço']); ?>

                <?php if($errors->has('address')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('address'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-2">
                <?php echo Form::label('number', 'Número', ['class' => 'label']); ?>

                <?php echo Form::text('number', '', ['id' => 'number', 'class' => 'form-control', 'placeholder' => 'Número']); ?>

                <?php if($errors->has('number')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('number'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo Form::label('complement', 'Complemento', ['class' => 'label']); ?>

                <?php echo Form::text('complement', '', ['class' => 'form-control', 'placeholder' => 'Complemento']); ?>

                <?php if($errors->has('complement')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('complement'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo Form::label('neighborhood', 'Bairro', ['class' => 'label']); ?>

                <?php echo Form::text('neighborhood', '', ['id' => 'neighborhood', 'class' => 'form-control', 'placeholder' => 'Bairro']); ?>

                <?php if($errors->has('neighborhood')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('neighborhood'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo Form::label('states', 'Estado', ['class' => 'label']); ?>

                <select name="states" id="state" class="form-control" required="required">
                    <option value="">-- Selecione --</option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo str_slug($state->name,'-').'-'.$state->id; ?>"><?php echo title_case($state->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php if($errors->has('states')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('states'); ?></p>
                <?php endif; ?>
            </div>                        
            <div class="col-md-6">
                <?php echo Form::label('city', 'Cidade', ['class' => 'label']); ?>

                <select name="city" id="city" class="form-control">
                    <option value="">-- Selecione --</option>
                </select>
                <?php if($errors->has('city')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('city'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <?php echo Form::label('password', 'Senha', ['class' => 'label']); ?>

                <?php echo Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Senha']); ?>

                <p class="text-warning" style="font-size: 12px">Senha precisa ter no minimo 6 dígitos</p>
                <?php if($errors->has('password')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('password'); ?></p>
                <?php endif; ?>
            </div>
        
            <div class="col-md-6">
                <?php echo Form::label('password_confirmation', 'Confirmar Senha', ['class' => 'label']); ?>

                <?php echo Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => 'Confirmar Senha']); ?>

                <?php if($errors->has('password')): ?>
                    <p class="text-danger" style="font-size:13px"><?php echo $errors->first('password'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <div class="row col-md-12">
            <div class="privacy-policy text-center" style="font-size: 12px; margin-top:30px">
                  Ao clicar em "Cadastrar" confirmo estar de acordo com os <a href="<?php echo e(asset('doc/termos-de-uso.pdf')); ?>" target="_blank">Termos de Uso</a> da Odontolocaliza.
            </div>
        </div>
        <?php echo Form::hidden('country', 1); ?>

        <div class="row col-md-12">
            <button type="submit" class="btn btn-green btn-lg col-xs-12 col-sm-6 col-md-4 col-sm-offset-4" style="margin-top:20px;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Cadastrar</button> 
        </div>
        
    </div>
<?php echo Form::close(); ?>