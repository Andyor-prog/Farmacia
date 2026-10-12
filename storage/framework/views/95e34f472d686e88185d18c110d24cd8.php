

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-sm border border-slate-200">
    <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-4">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Asignar Rol a Usuario</h1>
            <p class="text-xs text-slate-500">Selecciona el usuario y el rol correspondiente</p>
        </div>
        <a href="<?php echo e(route('admin.usuario-roles.index')); ?>" class="text-sm font-medium text-slate-600 hover:text-slate-900">
            ← Volver al listado
        </a>
    </div>

    <?php if($errors->any()): ?>
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded-md text-sm">
            <ul class="list-disc list-inside">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.usuario-roles.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>

        <div>
            <label for="id_usuario" class="block text-sm font-medium text-slate-700 mb-1">Usuario</label>
            <select name="id_usuario" id="id_usuario" required class="w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm">
                <option value="">-- Seleccionar Usuario --</option>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($usuario->id_usuario ?? $usuario->id); ?>">
                        <?php echo e($usuario->nombre ?? $usuario->name); ?> (<?php echo e($usuario->email); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div>
            <label for="id_rol" class="block text-sm font-medium text-slate-700 mb-1">Rol</label>
            <select name="id_rol" id="id_rol" required class="w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm">
                <option value="">-- Seleccionar Rol --</option>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($rol->id_rol ?? $rol->id); ?>">
                        <?php echo e($rol->nombre ?? $rol->nombre_rol ?? $rol->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="<?php echo e(route('admin.usuario-roles.index')); ?>" class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-teal-600 rounded-md hover:bg-teal-700">
                Guardar Asignación
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/admin/usuario_roles/create.blade.php ENDPATH**/ ?>