<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Médicos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">

    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4">Listado de Médicos</h2>

        <table class="table table-hover table-striped border align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID Médico</th>
                    <th>Nombre Completo</th>
                    <th>Cédula</th>
                    <th>Especialidad</th>
                    <th>Consultorio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="fw-bold"><?php echo e(str_pad($medico->id_medico, 3, '0', STR_PAD_LEFT)); ?></td>
                        <td>
                            <?php echo e($medico->usuario->nombre ?? 'N/A'); ?> <?php echo e($medico->usuario->apellido ?? ''); ?>

                        </td>
                        <td><?php echo e($medico->cedula); ?></td>
                        <td><?php echo e($medico->especialidad->nombre ?? 'N/A'); ?></td>
                        <td><?php echo e($medico->consultorio); ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary">Ver</button>
                            <button class="btn btn-sm btn-outline-primary">Editar</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            No hay médicos registrados en el sistema.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <small class="text-muted">
                Mostrando <?php echo e($medicos->firstItem() ?? 0); ?> a <?php echo e($medicos->lastItem() ?? 0); ?> de <?php echo e($medicos->total()); ?> registros
            </small>
            <div>
                <?php echo e($medicos->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/admin/medicos/index.blade.php ENDPATH**/ ?>