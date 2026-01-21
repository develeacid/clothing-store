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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->comment('Relación con el producto');
            $table->string('path')->comment('Ruta relativa de la imagen');
            $table->enum('type', ['model', 'flatlay', 'detail'])->comment('Tipo de imagen: modelo, prenda sola, detalle');
            $table->string('caption')->nullable()->comment('Texto opcional (ej. medidas de la modelo)');
            $table->integer('sort_order')->default(0)->comment('Orden de visualización');
            $table->boolean('is_main')->default(false)->comment('Imagen principal del producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
