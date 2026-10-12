

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Asignación de Roles</h1>
    <a href="<?php echo e(route('admin.usuario-roles.create')); ?>" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700">+ Asignar Rol</a>
</div>

<div class="bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase text-slate-500">
                <th class="p-4">Usuario ID</th>
                <th class="p-4">Rol ID</th>
                <th class="p-4">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            <?php $__empty_1 = true; $__currentLoopData = $usuarioRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="p-4"><?php echo e($item->id_usuario); ?></td>
                <td class="p-4"><?php echo e($item->id_rol); ?></td>
                <td class="p-4">
                    <form action="<?php echo e(route('admin.usuario-roles.destroy', ['id_usuario' => $item->id_usuario, 'id_rol' => $item->id_rol])); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="p-4 text-center text-slate-400">No hay asignaciones registradas.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farmacia-main\resources\views/admin/usuario_roles/index.blade.php ENDPATH**/ ?>