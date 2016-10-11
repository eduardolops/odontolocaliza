<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link href="<?php echo e(asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
<div class="col-md-12 row"> <br><br>
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open([ 'route' => 'doctor.store', 'name' => 'new-doctor', 'method' => 'post' ]); ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo Form::label('number_cro', 'Número do CRO'); ?>

                                <?php echo Form::text('number_cro', '', ['class' => 'form-control', 'placeholder' => 'Número do CRO']); ?>

                                <?php if($errors->has('number_cro')): ?>
                                    <p class="text-danger"><?php echo $errors->first('number_cro'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('name', 'Nome Completo'); ?>

                                <?php echo Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome Completo']); ?>

                                <?php if($errors->has('name')): ?>
                                    <p class="text-danger"><?php echo $errors->first('name'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('email', 'Email'); ?>

                                <?php echo Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']); ?>

                                <?php if($errors->has('email')): ?>
                                    <p class="text-danger"><?php echo $errors->first('email'); ?></p>
                                <?php endif; ?>                                    
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('doc_cpf', 'CPF'); ?>

                                <?php echo Form::text('doc_cpf', '', ['class' => 'form-control', 'placeholder' => 'CPF', 'data-inputmask' =>'"mask": "999.999.999-99"', 'data-mask' => '']); ?>

                                <?php if($errors->has('doc_cpf')): ?>
                                    <p class="text-danger"><?php echo $errors->first('doc_cpf'); ?></p>
                                <?php endif; ?>    
                            </div>
                            <div class="col-md-3">
                                <?php echo Form::label('specialization', 'Especialidade'); ?>

                                <select name="specialization" class="form-control">
                                    <option value="1">Teste</option>
                                    <option value="2">Teste</option>
                                    <option value="3">Teste</option>
                                </select>
                                <?php if($errors->has('specialization')): ?>
                                    <p class="text-danger"><?php echo $errors->first('specialization'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <?php echo Form::label('office_hours', 'Horário de Atendimento'); ?>

                                <?php echo Form::text('office_hours', '', ['class' => 'form-control', 'placeholder' => 'Horário de Atendimento' ]); ?>

                                <?php if($errors->has('office_hours')): ?>
                                    <p class="text-danger"><?php echo $errors->first('office_hours'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <?php echo Form::label('phone', 'Telefone Comercial'); ?>

                                <?php echo Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Telefone Comercial', 'data-inputmask' =>'"mask": "(99) 9999-9999"', 'data-mask' => '']); ?>

                                <?php if($errors->has('phone')): ?>
                                    <p class="text-danger"><?php echo $errors->first('phone'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <?php echo Form::label('cell_phone', 'Celular'); ?>

                                <?php echo Form::text('cell_phone', '', ['class' => 'form-control', 'placeholder' => 'Celular', 'data-inputmask' =>'"mask": "(99) [9]9999-9999"', 'data-mask' => '']); ?>

                                <?php if($errors->has('cell_phone')): ?>
                                    <p class="text-danger"><?php echo $errors->first('cell_phone'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo Form::label('zip_code', 'Cep'); ?>

                                <?php echo Form::text('zip_code', '', ['class' => 'form-control zip_code', 'placeholder' => 'Cep', 'data-inputmask' =>'"mask": "99999-999"', 'data-mask' => '']); ?>

                                <?php if($errors->has('zip_code')): ?>
                                    <p class="text-danger" id="zip"><?php echo $errors->first('zip_code'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <?php echo Form::label('address', 'Endereço'); ?>

                                <?php echo Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Endereço']); ?>

                                <?php if($errors->has('address')): ?>
                                    <p class="text-danger"><?php echo $errors->first('address'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo Form::label('number', 'Número'); ?>

                                <?php echo Form::text('number', '', ['class' => 'form-control', 'placeholder' => 'Número']); ?>

                                <?php if($errors->has('number')): ?>
                                    <p class="text-danger"><?php echo $errors->first('number'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('es', 'Complemento'); ?>

                                <?php echo Form::text('complement', '', ['class' => 'form-control', 'placeholder' => 'Complemento']); ?>

                                <?php if($errors->has('complement')): ?>
                                    <p class="text-danger"><?php echo $errors->first('complement'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('neighborhood', 'Bairro'); ?>

                                <?php echo Form::text('neighborhood', '', ['class' => 'form-control', 'placeholder' => 'Bairro']); ?>

                                <?php if($errors->has('neighborhood')): ?>
                                    <p class="text-danger"><?php echo $errors->first('neighborhood'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('states', 'Estado'); ?>

                                <select name="states" class="form-control">
                                    <option value="1">Teste</option>
                                    <option value="2">Teste</option>
                                    <option value="3">Teste</option>
                                </select>
                                <?php if($errors->has('states')): ?>
                                    <p class="text-danger"><?php echo $errors->first('states'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('city', 'Cidade'); ?>

                                <select name="city" class="form-control">
                                    <option value="1">Teste</option>
                                    <option value="2">Teste</option>
                                    <option value="3">Teste</option>
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

                        <?php echo Form::submit('Cadastrar',['class' => 'btn btn-primary']); ?>

                    </div>
                <?php echo Form::close(); ?>

            </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[name="number_cro"]').on('blur', function(){
            var cro = $(this).val();
            $.ajax({
                method: 'POST',
                data: { cro: cro },
                url: '<?php echo route('doctor.search_cro'); ?>',
                success: function(data){
                    console.log(data);
                }
            });
        });
    </script>