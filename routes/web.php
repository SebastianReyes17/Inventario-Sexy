<?php

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    $productos = Producto::all();
    return view('inventario', compact('productos'));
})->name('inicio');

// Guardar
Route::post('/productos', function (Request $request) {
    // Validamos que los datos lleguen bien
    $datos = $request->validate([
        'nombre' => 'required',
        'cantidad' => 'required|integer',
        'precio' => 'required|numeric',
    ]);
    
    Producto::create($datos);
    return redirect()->route('inicio');
})->name('productos.guardar');

// Editar (Mostrar formulario)
Route::get('/productos/{producto}/editar', function (Producto $producto) {
    return view('editar', compact('producto'));
})->name('productos.editar');

// Actualizar
Route::put('/productos/{producto}', function (Request $request, Producto $producto) {
    $datos = $request->validate([
        'nombre' => 'required',
        'cantidad' => 'required|integer',
        'precio' => 'required|numeric',
    ]);
    
    $producto->update($datos);
    return redirect()->route('inicio');
})->name('productos.actualizar');

// Eliminar
Route::delete('/productos/{producto}', function (Producto $producto) {
    $producto->delete();
    return redirect()->route('inicio');
})->name('productos.eliminar');
