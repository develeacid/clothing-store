<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->comment('Categoría principal del producto');
            $table->string('name')->comment('Nombre comercial del producto');
            $table->string('slug')->unique()->comment('URL amigable del producto');
            $table->text('description')->nullable()->comment('Descripción detallada');
            $table->enum('gender', ['men', 'women', 'unisex', 'kids'])->comment('Género objetivo: men, women, unisex, kids');
            $table->enum('type', ['upper', 'lower', 'accessory', 'shoes'])->comment('Tipo de prenda: upper, lower, etc.');
            $table->decimal('base_price', 10, 2)->comment('Precio base antes de variantes');
            $table->boolean('is_outlet')->default(false)->comment('Bandera para productos de outlet');
            $table->boolean('is_featured')->default(false)->comment('Bandera para productos destacados');
            $table->boolean('is_online_exclusive')->default(false)->comment('Bandera para exclusivos en línea');
            $table->boolean('is_active')->default(true)->comment('Disponible para venta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
