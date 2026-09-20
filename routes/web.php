<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirigir la raíz directamente al listado de productos
Route::get('/', [ProductoController::class, 'index'])->name('home');

// Sobre nosotros
Route::view('/Blog', 'SobreNosotros.blog');
Route::view('/Preguntas', 'SobreNosotros.preguntas');
Route::view('/Contacto', 'SobreNosotros.contacto');
Route::view('/Politicas', 'SobreNosotros.politicas');
Route::view('/Sucursales', 'SobreNosotros.sucursal');

// --- RUTAS DE PRODUCTOS (CONTROLADOR) ---
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/eliminados', [ProductoController::class, 'papelera'])->name('productos.papelera');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/productos/{producto}/restaurar', [ProductoController::class, 'restore'])->name('productos.restore');
Route::delete('/productos/{producto}/eliminar-definitivo', [ProductoController::class, 'forceDestroy'])->name('productos.forceDestroy');

// Panel administrativo
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

$adminModules = [
    'usuarios', 'roles', 'especialidades', 'sesiones-sociales', 'medicos',
    'citas', 'expedientes', 'servicios-medicos', 'carritos', 'listas-deseos',
    'historial-transacciones', 'logs',
];

foreach ($adminModules as $module) {
    Route::view("/admin/{$module}", 'admin.module', [
        'module' => $module,
        'mode' => 'list',
    ])->name("admin.{$module}.index");

    Route::view("/admin/{$module}/crear", 'admin.module', [
        'module' => $module,
        'mode' => 'create',
    ])->name("admin.{$module}.create");
}
