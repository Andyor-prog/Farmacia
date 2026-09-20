<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos - Farmacia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container my-5 bg-white p-4 rounded shadow-sm">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Catálogo de Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-success">+ Nuevo Producto</a>
    </div>

    @if (session('exito'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($productos as $producto)
            <div class="col">
                <div class="card h-100 shadow-sm text-center p-3">
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                             class="card-img-top mx-auto"
                             alt="{{ $producto->nombre }}"
                             style="max-height: 180px; object-fit: contain;">
                    @else
                        <div class="text-muted py-5">Sin imagen</div>
                    @endif

                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                            <span class="badge bg-primary mb-2">{{ $producto->categoria }}</span>
                            <p class="card-text text-success fw-bold fs-5">${{ number_format($producto->precio, 2) }}</p>
                        </div>
                        <small class="text-muted">Stock: {{ $producto->stock }}</small>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm w-100">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="w-100" onsubmit="return confirm('¿Deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">No hay productos registrados aún.</p>
                <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear el primer producto</a>
            </div>
        @endforelse
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>