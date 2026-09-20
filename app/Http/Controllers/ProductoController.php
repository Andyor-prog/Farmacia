<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar listado de productos
    public function index()
    {
        $productos = Producto::latest()->get();
        return view('productos.index', compact('productos'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('productos.create');
    }

    // Guardar el nuevo producto con validaciones e imagen
    public function store(Request $request)
    {
        // 1. Validaciones en Servidor
        $request->validate([
            'nombre'    => 'required|string|min:3|max:100',
            'precio'    => 'required|numeric|min:0.01',
            'stock'     => 'required|integer|min:0',
            'categoria' => 'required|string',
            'imagen'    => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        // 2. Procesar y guardar la imagen directamente
        $path = null;
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
        }

        // 3. Crear el producto en la base de datos
        Producto::create([
            'nombre'    => $request->nombre,
            'precio'    => $request->precio,
            'stock'     => $request->stock,
            'categoria' => $request->categoria,
            'imagen'    => $path,
        ]);

        // 4. Redirección al listado con mensaje de éxito
        return redirect()->route('productos.index')
            ->with('exito', '¡Producto registrado correctamente!');
    }
}