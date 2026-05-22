<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Le decimos a Laravel que la tabla se llama "productos" 
    // y qué campos puede llenar el usuario.
    protected $table = 'productos';
    protected $fillable = ['nombre', 'cantidad', 'precio'];
}