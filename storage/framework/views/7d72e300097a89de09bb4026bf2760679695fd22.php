<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('doctor.menu_adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
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
        <div class="box">
            <div class="row box-header">
                <div class="pull-left">
                    <?php echo Form::open([ 'route' => ['doctor::gallery_upload', Auth::guard($guard)->user()->id], 'name' => 'upload', 'files'=> true, 'method' => 'post' ]); ?>

                        <div class="col-xs-12 col-md-6">
                            <label for="imagem">Selecione as imagens para a galeria: <b class="text-danger">(Permitido até 5 imagens)</b> </label>
                            <div class="input-group">
                                <input id="uploadFile" class="form-control" type="text" placeholder="Selecionar Arquivo" disabled="disabled" />
                                <div class="input-group-btn">
                                    <div class="fileUpload btn btn-default" style="margin:0">
                                        <span>Selecionar</span>
                                        <input type="file" id="uploadBtn" class="upload" name="upload[]" multiple="multiple" />
                                    </div>
                                    <button type="submit" class="btn btn-success">Enviar Imagem</button>
                                </div>
                            </div>
                            <?php if(count($errors) > 0): ?>
                                <?php  
                                    $error = $errors->all();
                                 ?>
                                <p class="text-danger"><?php echo e($error[0]); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Fotos</th>
                        <th>Ações</th>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="col-xs-6 col-md-3 col-xs-offset-3 col-md-offset-0">
                                    <?php if( !empty($img->filePath) && file_exists(public_path('storage/images/doctor/gallery/'.$img->filePath)) ): ?>
                                        <img src="<?php echo e(asset('storage/images/doctor/gallery/'.$img->filePath)); ?>" alt="<?php echo $img->filePath; ?>" class="img-thumbnail">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/no-img.png')); ?>" alt="Sem Imagem" class="img-thumbnail">
                                    <?php endif; ?>
                                </div>

                            </td>
                            <td>
                                <a href="<?php echo route('doctor::gallery_destroy', ['user_id' => $img->user_id, 'img_id' => $img->id]); ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir" class="btn btn-danger" 
                                    onclick="event.preventDefault();
                                             document.getElementById('gallery_destroy.<?php echo $img->id; ?>').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <?php echo Form::open([ 'route' => ['doctor::gallery_destroy', 'user_id' => $img->user_id, 'img_id' => $img->id], 'id' => 'gallery_destroy.'.$img->id, 'method' => 'delete' ]); ?>

                                <?php echo Form::close(); ?>

                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" style="text-align:center;">Sem registros encontrados</td>
                        </tr>
                    <?php endif; ?>

                </table>
                <div style="text-align:center">
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('structures.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>