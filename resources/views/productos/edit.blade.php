<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h2 class="mb-4 text-center fw-bold">Editar Producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required minlength="3" maxlength="100">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Precio ($)</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" required min="0.01">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" required min="0">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Categoría</label>
                <select name="categoria" class="form-select" required>
                    <option value="">-- Seleccione una opción --</option>
                    @foreach (['Analgesico' => 'Analgésico', 'Antibiotico' => 'Antibiótico', 'Vitamina' => 'Vitamina'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('categoria', $producto->categoria) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Imagen nueva (opcional)</label>
                <input type="file" name="imagen" class="form-control" accept="image/jpeg,image/png,image/webp">
                @if ($producto->imagen)
                    <small class="text-muted d-block mt-2">La imagen actual se conserva si no seleccionas otra.</small>
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumbnail mt-2" style="max-height: 120px;">
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100 fw-bold">Actualizar Producto</button>
                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary w-100">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>