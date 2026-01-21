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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->comment('Producto padre');
            $table->string('sku')->unique()->comment('Código único de inventario (SKU)');
            $table->decimal('price', 10, 2)->nullable()->comment('Precio específico, anula base_price si existe');
            $table->decimal('sale_price', 10, 2)->nullable()->comment('Precio de oferta');
            $table->integer('stock')->default(0)->comment('Cantidad en inventario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
