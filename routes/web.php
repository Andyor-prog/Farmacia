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

// Página principal
Route::view('/Inicio', 'inicio');

// Información del usuario
Route::view('/usuario/contacto', 'informacion.contacto');

// Sobre nosotros
Route::view('/SobreNosotros', 'empresa');
Route::view('/Blog', 'SobreNosotros.blog');
Route::view('/Preguntas', 'SobreNosotros.preguntas');
Route::view('/Contacto', 'SobreNosotros.contacto');
Route::view('/Politicas', 'SobreNosotros.politicas');
Route::view('/Sucursales', 'SobreNosotros.sucursal');

// Información general
Route::view('/Locales', 'informacion.sucursales');

// Servicios y carrito
Route::view('/Servicios', 'servicios');
Route::view('/Pago', 'Carrito.pago');

// Autenticación
Route::view('/LoginHuella', 'login_huella');
Route::view('/Login', 'login');

// Test
Route::view('/test', 'test');

// --- RUTAS DE PRODUCTOS (CONTROLADOR) ---
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

// Promociones
Route::view('/Promociones', 'promociones');

// Perfil
Route::view('/Perfil', 'perfil');

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