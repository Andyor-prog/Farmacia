<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos - Farmacia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container my-5 bg-white p-4 rounded shadow-sm">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Catálogo de Productos</h2>
        <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-success">+ Nuevo Producto</a>
    </div>

    <?php if(session('exito')): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?php echo e(session('exito')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card h-100 shadow-sm text-center p-3">
                    <img src="<?php echo e(asset('storage/' . $producto->imagen)); ?>"
                         class="card-img-top mx-auto"
                         alt="<?php echo e($producto->nombre); ?>"
                         style="max-height: 180px; object-fit: contain;">

                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-bold"><?php echo e($producto->nombre); ?></h5>
                            <span class="badge bg-primary mb-2"><?php echo e($producto->categoria); ?></span>
                            <p class="card-text text-success fw-bold fs-5">$<?php echo e(number_format($producto->precio, 2)); ?></p>
                        </div>
                        <small class="text-muted">Stock: <?php echo e($producto->stock); ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">No hay productos registrados aún.</p>
                <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-primary">Crear el primer producto</a>
            </div>
        <?php endif; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\gerin\Documents\Farmacia\resources\views/productos/index.blade.php ENDPATH**/ ?>