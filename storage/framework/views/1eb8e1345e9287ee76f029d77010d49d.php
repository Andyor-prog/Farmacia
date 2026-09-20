<?php
    $navigation = [
        ['slug' => 'usuarios', 'label' => 'Usuarios', 'icon' => '◉'],
        ['slug' => 'roles', 'label' => 'Roles', 'icon' => '◇'],
        ['slug' => 'especialidades', 'label' => 'Especialidades', 'icon' => '✦'],
        ['slug' => 'sesiones-sociales', 'label' => 'Sesiones sociales', 'icon' => '↗'],
        ['slug' => 'medicos', 'label' => 'Medicos', 'icon' => '＋'],
        ['slug' => 'citas', 'label' => 'Citas', 'icon' => '◷'],
        ['slug' => 'expedientes', 'label' => 'Expedientes', 'icon' => '▤'],
        ['slug' => 'servicios-medicos', 'label' => 'Servicios medicos', 'icon' => '✚'],
        ['slug' => 'carritos', 'label' => 'Carritos', 'icon' => '▱'],
        ['slug' => 'listas-deseos', 'label' => 'Listas de deseos', 'icon' => '♡'],
        ['slug' => 'historial-transacciones', 'label' => 'Transacciones', 'icon' => '↔'],
        ['slug' => 'logs', 'label' => 'Logs del sistema', 'icon' => '≡'],
    ];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Panel administrativo'); ?> | Farmacia Vital</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="admin-shell">
    <div class="flex min-h-screen flex-col lg:flex-row">
        <aside class="admin-sidebar w-full shrink-0 text-white lg:min-h-screen lg:w-72">
            <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-lg font-bold tracking-wide">FARMACIA <span class="text-orange-300">VITAL</span></a>
                <span class="rounded-full bg-white/10 px-2 py-1 text-[10px] uppercase tracking-widest text-cyan-100">Admin</span>
            </div>
            <nav class="flex gap-1 overflow-x-auto p-4 lg:block lg:space-y-1 lg:overflow-visible">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-nav-link flex shrink-0 items-center gap-3 rounded-lg px-3 py-2.5 text-sm <?php echo e(request()->routeIs('admin.dashboard') ? 'is-active' : ''); ?>">
                    <span class="w-5 text-center">⌂</span> Resumen
                </a>
                <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('admin.' . $item['slug'] . '.index')); ?>" class="admin-nav-link flex shrink-0 items-center gap-3 rounded-lg px-3 py-2.5 text-sm <?php echo e(request()->routeIs('admin.' . $item['slug'] . '.*') ? 'is-active' : ''); ?>">
                        <span class="w-5 text-center text-cyan-200"><?php echo e($item['icon']); ?></span> <?php echo e($item['label']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>
        </aside>
        <main class="min-w-0 flex-1">
            <header class="flex items-center justify-between border-b border-slate-200 bg-white/80 px-5 py-4 backdrop-blur lg:px-10">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[.2em] text-teal-700">Centro de operaciones</p>
                    <p class="mt-1 text-sm text-slate-500">Gestion visual del sistema</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" class="hidden rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-600 sm:block">⌕ Buscar</button>
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-100 font-semibold text-orange-700">AM</div>
                </div>
            </header>
            <div class="p-5 lg:p-10">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>
</body>
</html>
<?php /**PATH A:\Xampp\htdocs\Farmacia\resources\views/layouts/admin.blade.php ENDPATH**/ ?>