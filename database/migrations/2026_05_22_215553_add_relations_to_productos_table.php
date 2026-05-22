<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('productos', function (Blueprint $table) {
        $table->foreignId('categoria_id')->after('id')->nullable()->constrained('categorias')->onDelete('set null');
        $table->foreignId('proveedor_id')->after('categoria_id')->nullable()->constrained('proveedores')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('productos', function (Blueprint $table) {
        $table->dropForeign(['categoria_id']);
        $table->dropColumn('categoria_id');
        $table->dropForeign(['proveedor_id']);
        $table->dropColumn('proveedor_id');
    });
}
};
