<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminRecordController;
use App\Http\Controllers\UsuarioRolController;
use App\Http\Controllers\HistorialTransaccionController;
use App\Http\Controllers\SesionSocialController;

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

// --- RUTAS DE PRODUCTOS ---
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

// --- RUTAS MIS MÓDULOS (CONTROLADORES PROPIOS) ---
Route::get('/admin/usuario-roles', [UsuarioRolController::class, 'index'])->name('admin.usuario-roles.index');
Route::get('/admin/usuario-roles/crear', [UsuarioRolController::class, 'create'])->name('admin.usuario-roles.create');
Route::post('/admin/usuario-roles', [UsuarioRolController::class, 'store'])->name('admin.usuario-roles.store');
Route::delete('/admin/usuario-roles/{id_usuario}/{id_rol}', [UsuarioRolController::class, 'destroy'])->name('admin.usuario-roles.destroy');

Route::get('/admin/historial-transacciones', [HistorialTransaccionController::class, 'index'])->name('admin.historial-transacciones.index');
Route::get('/admin/historial-transacciones/crear', [HistorialTransaccionController::class, 'create'])->name('admin.historial-transacciones.create');
Route::post('/admin/historial-transacciones', [HistorialTransaccionController::class, 'store'])->name('admin.historial-transacciones.store');
Route::delete('/admin/historial-transacciones/{id}', [HistorialTransaccionController::class, 'destroy'])->name('admin.historial-transacciones.destroy');

Route::get('/admin/sesiones-sociales', [SesionSocialController::class, 'index'])->name('admin.sesiones-sociales.index');
Route::get('/admin/sesiones-sociales/crear', [SesionSocialController::class, 'create'])->name('admin.sesiones-sociales.create');
Route::post('/admin/sesiones-sociales', [SesionSocialController::class, 'store'])->name('admin.sesiones-sociales.store');
Route::delete('/admin/sesiones-sociales/{id}', [SesionSocialController::class, 'destroy'])->name('admin.sesiones-sociales.destroy');

// Panel administrativo
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

// Módulos con vistas estáticas/temporales (incluye 'recetas-medicas' y mantiene temporalmente 'listas-deseos')
$adminModules = [
    'roles', 'especialidades', 'medicos', 'citas',
    'expedientes', 'servicios-medicos', 'recetas-medicas', 'listas-deseos', 'logs',
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

// Módulos administrados genéricamente
$managedModules = [
    'usuarios', 'carritos', 'carrito-detalles', 'users',
];

foreach ($managedModules as $module) {
    Route::get("/admin/{$module}", [AdminRecordController::class, 'index'])->name("admin.{$module}.index");
    Route::get("/admin/{$module}/crear", [AdminRecordController::class, 'create'])->name("admin.{$module}.create");
    Route::post("/admin/{$module}", [AdminRecordController::class, 'store'])->name("admin.{$module}.store");
    Route::get("/admin/{$module}/{id}/editar", [AdminRecordController::class, 'edit'])->name("admin.{$module}.edit");
    Route::put("/admin/{$module}/{id}", [AdminRecordController::class, 'update'])->name("admin.{$module}.update");
    Route::delete("/admin/{$module}/{id}", [AdminRecordController::class, 'destroy'])->name("admin.{$module}.destroy");
}