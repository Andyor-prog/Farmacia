<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    // Mostrar el formulario de edición con los datos existentes
    public function edit(int $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')
                ->with('error', 'El producto solicitado no existe.');
        }

        return view('productos.edit', compact('producto'));
    }

    // Guardar el nuevo producto con validaciones e imagen
    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|min:3|max:100',
            'precio'    => 'required|numeric|min:0.01',
            'stock'     => 'required|integer|min:0',
            'categoria' => 'required|string',
            'imagen'    => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $producto = Producto::create([
            'nombre'    => $request->nombre,
            'precio'    => $request->precio,
            'stock'     => $request->stock,
            'categoria' => $request->categoria,
        ]);

        $this->saveImage($request, $producto);

        return redirect()->route('productos.index')
            ->with('exito', '¡Producto registrado correctamente!');
    }

    // Actualizar los datos del producto y reemplazar su imagen si se proporciona
    public function update(Request $request, int $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')
                ->with('error', 'El producto que intentas actualizar no existe.');
        }

        $request->validate([
            'nombre'    => 'sometimes|required|string|min:3|max:100',
            'precio'    => 'sometimes|required|numeric|min:0.01',
            'stock'     => 'sometimes|required|integer|min:0',
            'categoria' => 'sometimes|required|string',
            'imagen'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $producto->update($request->only('nombre', 'precio', 'stock', 'categoria'));

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }

            $this->saveImage($request, $producto);
        }

        return redirect()->route('productos.index')
            ->with('exito', '¡Producto actualizado correctamente!');
    }

    // Eliminar el producto y su imagen asociada
    public function destroy(int $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')
                ->with('error', 'El producto que intentas eliminar no existe.');
        }

        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')
            ->with('exito', '¡Producto eliminado correctamente!');
    }

    private function saveImage(Request $request, Producto $producto): void
    {
        if (!$request->hasFile('imagen')) {
            return;
        }

        $extension = $request->file('imagen')->extension();
        $filename = "Producto_{$producto->id}_1.{$extension}";
        $path = $request->file('imagen')->storeAs('productos', $filename, 'public');

        $producto->update(['imagen' => $path]);
    }
}