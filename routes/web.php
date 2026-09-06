<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

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

// Productos
Route::view('/Productos', 'productos');
Route::view('/producto', 'producto');

// Promociones
Route::view('/Promociones', 'promociones');

// Perfil
Route::view('/Perfil', 'perfil');

// Panel administrativo estatico para la actividad de diseno frontend
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