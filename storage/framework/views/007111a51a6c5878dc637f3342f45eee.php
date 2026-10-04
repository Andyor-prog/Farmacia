<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">

    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4">Catálogo de Productos</h2>

        <table class="table table-hover table-striped border">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($producto->id); ?></td>
                        <td><?php echo e($producto->nombre); ?></td>
                        <td>$<?php echo e(number_format($producto->precio, 2)); ?></td>
                        <td><?php echo e($producto->imagen ?? 'sin-imagen.jpg'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay productos registrados en la base de datos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Paginación adaptada a Bootstrap 5 -->
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($productos->links('pagination::bootstrap-5')); ?>

        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/productos/index.blade.php ENDPATH**/ ?>