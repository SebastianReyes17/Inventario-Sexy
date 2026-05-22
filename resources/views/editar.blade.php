<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-6">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Editar Producto</h1>

        <form action="{{ route('productos.actualizar', $producto) }}" method="POST" class="space-y-4">
            @csrf 
            @method('PUT') <!-- Importante para indicarle a Laravel que es actualización -->
            
            <div>
                <label class="block mb-1">Nombre</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" class="w-full border p-2 rounded" required>
            </div>
            
            <div>
                <label class="block mb-1">Cantidad</label>
                <input type="number" name="cantidad" value="{{ $producto->cantidad }}" class="w-full border p-2 rounded" required>
            </div>
            
            <div>
                <label class="block mb-1">Precio</label>
                <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">Guardar Cambios</button>
                <a href="{{ route('inicio') }}" class="bg-gray-400 text-white px-4 py-2 rounded text-center w-full">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>