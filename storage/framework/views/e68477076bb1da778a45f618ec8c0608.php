

<?php $__env->startSection('content'); ?>
    <div class="mx-auto max-w-7xl">
        <?php if(session('success')): ?>
            <div class="mb-4 rounded-lg bg-teal-100 p-4 text-sm font-semibold text-teal-800">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">Historial de Logs</h1>
                <p class="mt-2 max-w-2xl text-slate-500">Registro de auditoría y actividades realizadas en el sistema.</p>
            </div>
        </div>

        <section class="admin-panel rounded-xl p-6">
            <div class="overflow-x-auto">
                <table class="admin-table w-full min-w-[640px] text-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Módulo</th>
                            <th>Acción</th>
                            <th>IP</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="font-semibold text-slate-800"><?php echo e($log->id_log ?? $log->id); ?></td>
                                <td class="font-medium text-slate-900">
                                    <?php echo e($log->usuario->nombre ?? $log->usuario->name ?? 'Sistema'); ?>

                                </td>
                                <td>
                                    <span class="rounded-md bg-teal-50 px-2 py-1 text-xs font-semibold text-teal-700 border border-teal-200">
                                        <?php echo e($log->modulo ?? 'General'); ?>

                                    </span>
                                </td>
                                <td><?php echo e($log->accion); ?></td>
                                <td class="font-mono text-xs text-slate-500"><?php echo e($log->ip ?? '127.0.0.1'); ?></td>
                                <td class="text-slate-500">
                                    <?php echo e($log->fecha ? $log->fecha->format('Y-m-d H:i:s') : 'Sin fecha'); ?>

                                </td>
                                <td>
                                    <form action="<?php echo e(route('admin.logs.destroy', $log->id_log ?? $log->id)); ?>" method="POST" onsubmit="return confirm('¿Eliminar este registro de log?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-800">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-slate-500">No hay registros de auditoría en la base de datos.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gerin\Documents\Farmacia\resources\views/admin/logs/index.blade.php ENDPATH**/ ?>