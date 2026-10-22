<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminRecordController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\HistorialTransaccionController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioMedicoController;
use App\Http\Controllers\SesionSocialController;
use App\Http\Controllers\UsuarioRolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name('home');

Route::view('/Blog', 'SobreNosotros.blog');
Route::view('/Preguntas', 'SobreNosotros.preguntas');
Route::view('/Contacto', 'SobreNosotros.contacto');
Route::view('/Politicas', 'SobreNosotros.politicas');
Route::view('/Sucursales', 'SobreNosotros.sucursal');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])
    ->whereNumber('producto')
    ->name('productos.show');

Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('login');
    Route::post('/admin/login', [AdminAuthController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');

    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::get('/productos/eliminados', [ProductoController::class, 'papelera'])->name('productos.papelera');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::put('/productos/{producto}/restaurar', [ProductoController::class, 'restore'])->name('productos.restore');
    Route::delete('/productos/{producto}/eliminar-definitivo', [ProductoController::class, 'forceDestroy'])->name('productos.forceDestroy');

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

    Route::resource('admin/roles', RolController::class)->names('admin.roles');
    Route::resource('admin/especialidades', EspecialidadController::class)->names('admin.especialidades');
    Route::resource('admin/servicios-medicos', ServicioMedicoController::class)->names('admin.servicios-medicos');
    Route::resource('admin/logs', LogController::class)->names('admin.logs');

    Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

    $adminModules = [
        'medicos', 'citas', 'expedientes', 'recetas-medicas', 'listas-deseos',
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
});
