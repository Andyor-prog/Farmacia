<?php $__env->startSection('content'); ?>
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <a href="<?php echo e(route('productos.index')); ?>" class="text-sm font-semibold text-teal-700 hover:text-teal-900">← Volver al catálogo</a>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Papelera de productos</h1>
            <p class="mt-2 text-slate-500">Registros eliminados mediante borrado lógico. Puedes restaurarlos o eliminarlos definitivamente.</p>
        </div>

        <?php if(session('exito')): ?>
            <div class="mb-6 rounded-lg border border-teal-200 bg-teal-50 px-4 py-3 text-sm font-medium text-teal-800"><?php echo e(session('exito')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php if(session('advertencia')): ?>
            <div class="mb-6 rounded-lg border border-orange-200 bg-orange-50 px-4 py-3 text-sm font-medium text-orange-800"><?php echo e(session('advertencia')); ?></div>
        <?php endif; ?>

        <section class="admin-panel overflow-hidden rounded-xl">
            <div class="overflow-x-auto">
                <table class="admin-table w-full min-w-[720px] text-sm">
                    <thead>
                        <tr><th>Imagen</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Eliminado el</th><th>Acciones</th></tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="transition hover:bg-slate-50">
                                <td>
                                    <?php if($producto->imagen): ?>
                                        <img src="<?php echo e(asset($producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>" class="h-12 w-12 rounded object-contain">
                                    <?php else: ?>
                                        <span class="text-xs text-slate-400">Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                                <td class="font-semibold text-slate-800"><?php echo e($producto->nombre); ?></td>
                                <td><span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600"><?php echo e($producto->categoria); ?></span></td>
                                <td>$<?php echo e(number_format($producto->precio, 2)); ?></td>
                                <td><?php echo e($producto->deleted_at?->format('d/m/Y H:i')); ?></td>
                                <td>
                                    <div class="flex gap-2">
                                        <form action="<?php echo e(route('productos.restore', $producto->id)); ?>" method="POST" onsubmit="return confirm('¿Restaurar este producto? Volverá a aparecer en el catálogo activo.');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="rounded-md border border-teal-200 px-2.5 py-1 text-xs font-semibold text-teal-700 hover:bg-teal-50">Restaurar</button>
                                        </form>
                                        <form action="<?php echo e(route('productos.forceDestroy', $producto->id)); ?>" method="POST" onsubmit="return confirm('¿Eliminar este producto de forma DEFINITIVA? Esta acción no se puede deshacer y borrará también su imagen.');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="rounded-md border border-red-200 px-2.5 py-1 text-xs font-semibold text-red-600 hover:bg-red-50">Eliminar definitivo</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6" class="py-8 text-center text-slate-400">La papelera está vacía.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Xampp\htdocs\Farmacia\resources\views/productos/papelera.blade.php ENDPATH**/ ?>