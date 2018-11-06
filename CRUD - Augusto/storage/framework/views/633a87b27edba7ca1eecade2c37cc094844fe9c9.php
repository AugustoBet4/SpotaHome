
<?php $__env->startSection('content'); ?>
    <div class="card">
        <h2 class="card-header">
            CRUD de Fechas Disponibles
            <div class="btn btn-link">
                <a href="<?php echo e(route('fechas.create')); ?>" class="btn btn-info" >Añadir Fecha de Disponibilidad</a>
            </div>
        </h2>
        <div class="card-body">
            <div class="table-container">
                <table id="mytable" class="table">
                    <thead class="thead-black">
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    </thead>

                    <tbody>
                    <?php if($fechas->count()): ?>
                        <?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($fecha->fecha_inicio); ?></td>
                                <td><?php echo e($fecha->fecha_fin); ?></td>
                                <td><a class="btn btn-warning" href="<?php echo e(action('FechasController@edit', $fecha->id_fecha_disponibles)); ?>" ><i class="far fa-edit"></i></a></td>
                                <td>
                                    <form action="<?php echo e(action('FechasController@destroy', $fecha->id_fecha_disponibles)); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-eraser"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12" class="text-center">No hay Fechas Registrados</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($fechas->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>