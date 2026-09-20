<?php $__env->startSection('content'); ?>
    <div class="mx-auto max-w-3xl">
        <div class="mb-8">
            <a href="<?php echo e(route('productos.index')); ?>" class="text-sm font-semibold text-teal-700 hover:text-teal-900">← Volver al catálogo</a>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Editar producto</h1>
            <p class="mt-2 text-slate-500">Actualiza la información de "<?php echo e($producto->nombre); ?>".</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <p class="font-semibold">Por favor corrige los siguientes errores:</p>
                <ul class="mt-1 list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <section class="admin-panel rounded-xl p-6 lg:p-8">
            <form action="<?php echo e(route('productos.update', $producto)); ?>" method="POST" enctype="multipart/form-data" class="grid gap-5 md:grid-cols-2">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <label>
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Nombre del producto</span>
                    <input class="admin-field" type="text" name="nombre" value="<?php echo e(old('nombre', $producto->nombre)); ?>" required minlength="3" maxlength="100">
                </label>

                <label>
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Precio ($)</span>
                    <input class="admin-field" type="number" step="0.01" name="precio" value="<?php echo e(old('precio', $producto->precio)); ?>" required min="0.01">
                </label>

                <label>
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Stock</span>
                    <input class="admin-field" type="number" name="stock" value="<?php echo e(old('stock', $producto->stock)); ?>" required min="0">
                </label>

                <label>
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Categoría</span>
                    <select class="admin-field" name="categoria" required>
                        <option value="">-- Selecciona una opción --</option>
                        <?php $__currentLoopData = ['Analgesico' => 'Analgésico', 'Antibiotico' => 'Antibiótico', 'Vitamina' => 'Vitamina']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>" <?php if(old('categoria', $producto->categoria) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </label>

                <label class="md:col-span-2">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Imagen nueva (opcional)</span>
                    <input class="admin-field" type="file" name="imagen" accept="image/jpeg,image/png,image/webp">
                    <?php if($producto->imagen): ?>
                        <div class="mt-3 flex items-center gap-3">
                            <img src="<?php echo e(asset($producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>" class="h-16 w-16 rounded border border-slate-200 object-contain">
                            <span class="text-xs text-slate-500">La imagen actual se conserva si no seleccionas otra.</span>
                        </div>
                    <?php endif; ?>
                </label>

                <div class="flex flex-wrap gap-3 border-t border-slate-200 pt-6 md:col-span-2">
                    <button type="submit" class="rounded-lg bg-teal-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-800">Actualizar producto</button>
                    <a href="<?php echo e(route('productos.index')); ?>" class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-600">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\Xampp\htdocs\Farmacia\resources\views/productos/edit.blade.php ENDPATH**/ ?>