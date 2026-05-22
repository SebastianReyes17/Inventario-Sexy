<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Inventario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Control de Inventario</h1>

        <!-- Formulario -->
        <form action="{{ route('productos.guardar') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del producto" class="border p-2 rounded" required>
            <input type="number" name="cantidad" placeholder="Cantidad" class="border p-2 rounded" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" class="border p-2 rounded" required>
            <button type="submit" class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                + Agregar
            </button>
        </form>

        <!-- Tabla -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-200">
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Stock</th>
                        <th class="p-3 border">Precio</th>
                        <th class="p-3 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 border">{{ $producto->nombre }}</td>
                        <td class="p-3 border text-center">{{ $producto->cantidad }}</td>
                        <td class="p-3 border text-center">$ {{ number_format($producto->precio, 2) }}</td>
                        <td class="p-3 border flex gap-3 justify-center">
                            <a href="{{ route('productos.editar', $producto) }}" class="text-blue-600 hover:underline">
                                Editar
                            </a>

                            <form action="{{ route('productos.eliminar', $producto) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>