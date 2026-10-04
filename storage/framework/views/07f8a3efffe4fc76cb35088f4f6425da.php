<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Citas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">

    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4">Listado de Citas Médicas</h2>

        <table class="table table-hover table-striped border">
            <thead class="table-dark">
                <tr>
                    <th>ID Cita</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($cita->id_cita); ?></td>
                        <td><?php echo e($cita->paciente->nombre ?? 'N/A'); ?></td>
                        <!-- Se accede al usuario dentro del modelo Medico -->
                        <td><?php echo e($cita->medico->usuario->nombre ?? 'N/A'); ?></td>
                        <td><?php echo e($cita->fecha ? $cita->fecha->format('Y-m-d') : ''); ?></td>
                        <td><?php echo e($cita->hora); ?></td>
                        <td>
                            <span class="badge bg-info"><?php echo e($cita->estado); ?></span>
                        </td>
                        <td><?php echo e($cita->motivo); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center">No hay citas registradas en la base de datos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($citas->links('pagination::bootstrap-5')); ?>

        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/admin/citas/index.blade.php ENDPATH**/ ?>