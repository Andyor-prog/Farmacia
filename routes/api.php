<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Models\UsuarioRol;
use App\Models\HistorialTransaccion;
use App\Models\SesionSocial;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// --- MIS ENDPOINTS API ---

// 1. Productos
Route::get('/productos', fn() => response()->json(Producto::all()));

// 2. Asignación de Roles por Usuario (incluye datos del usuario y rol)
Route::get('/usuario-roles', fn() => response()->json(
    UsuarioRol::with(['usuario', 'rol'])->get()
));

// 3. Historial de Transacciones (incluye datos del usuario y carrito)
Route::get('/historial-transacciones', fn() => response()->json(
    HistorialTransaccion::with(['usuario', 'carrito'])->get()
));

// 4. Sesiones Sociales (incluye datos del usuario vinculado)
Route::get('/sesiones-sociales', fn() => response()->json(
    SesionSocial::with('usuario')->get()
));

// --- RUTA POR DEFECTO ---
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});