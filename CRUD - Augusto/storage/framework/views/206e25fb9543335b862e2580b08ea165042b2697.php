
<?php $__env->startSection('content'); ?>

    <div class="card">
        <h2 class="card-header">
            Agregar Fechas Disponible Nueva
        </h2>
        <div class="card-body">
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(Session::has('success')): ?>
                <div class="alert alert-info">
                    <?php echo e(Session::get('success')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('fechas.store')); ?>"  role="form">
                <?php echo e(csrf_field()); ?>


                <div class="form row">
                        <input type="text" name="id_propiedades" class="form-control input-sm" id="id_propiedades" value="1" hidden="true">
                    <div class="form-group col-md-6">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control input-sm" id="fecha_inicio">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin">Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control input-sm" id="fecha_fin">
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <a href="<?php echo e(route('fechas.index')); ?>" class="btn btn-link" >Volver al listado</a>
                </div>
            </form>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>