<?php $__env->startSection('content'); ?>
    <div class="mx-auto max-w-4xl">
        <div class="mb-8">
            <a href="<?php echo e(route('productos.index')); ?>" class="text-sm font-semibold text-teal-700 hover:text-teal-900">← Volver al catálogo</a>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900"><?php echo e($producto->nombre); ?></h1>
            <p class="mt-2 text-slate-500">Detalle del producto (solo lectura).</p>
        </div>

        <?php if(session('exito')): ?>
            <div class="mb-6 rounded-lg border border-teal-200 bg-teal-50 px-4 py-3 text-sm font-medium text-teal-800"><?php echo e(session('exito')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <section class="admin-panel grid gap-6 rounded-xl p-6 md:grid-cols-2 lg:p-8">
            <div class="flex items-center justify-center rounded-lg bg-slate-50 p-6">
                <?php if($producto->imagen): ?>
                    <img src="<?php echo e(asset($producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>" class="max-h-64 max-w-full object-contain">
                <?php else: ?>
                    <span class="text-sm text-slate-400">Sin imagen</span>
                <?php endif; ?>
            </div>
            <dl class="divide-y divide-slate-200 text-sm">
                <div class="flex justify-between py-3"><dt class="text-slate-500">ID</dt><dd class="font-semibold text-slate-800">#<?php echo e($producto->id); ?></dd></div>
                <div class="flex justify-between py-3"><dt class="text-slate-500">Categoría</dt><dd><span class="rounded-full bg-teal-50 px-2.5 py-1 text-xs font-semibold text-teal-700"><?php echo e($producto->categoria); ?></span></dd></div>
                <div class="flex justify-between py-3"><dt class="text-slate-500">Precio</dt><dd class="font-semibold text-teal-700">$<?php echo e(number_format($producto->precio, 2)); ?></dd></div>
                <div class="flex justify-between py-3"><dt class="text-slate-500">Stock</dt><dd class="font-semibold text-slate-800"><?php echo e($producto->stock); ?> unidades</dd></div>
                <div class="flex justify-between py-3"><dt class="text-slate-500">Registrado el</dt><dd class="text-slate-800"><?php echo e($producto->created_at?->format('d/m/Y H:i') ?? 'N/D'); ?></dd></div>
                <div class="flex justify-between py-3"><dt class="text-slate-500">Última actualización</dt><dd class="text-slate-800"><?php echo e($producto->updated_at?->format('d/m/Y H:i') ?? 'N/D'); ?></dd></div>
            </dl>
        </section>

        <div class="mt-6 flex flex-wrap gap-3">
            <a href="<?php echo e(route('productos.edit', $producto)); ?>" class="rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-600">Editar</a>
            <form action="<?php echo e(route('productos.destroy', $producto)); ?>" method="POST" onsubmit="return confirm('¿Deseas mover este producto a la papelera? Podrás restaurarlo después.');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="rounded-lg border border-red-200 px-5 py-2.5 text-sm font-semibold text-red-600 hover:bg-red-50">Eliminar</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Xampp\htdocs\Farmacia\resources\views/productos/show.blade.php ENDPATH**/ ?>