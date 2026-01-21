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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre de la categoría (ej. Camisas, Pantalones)');
            $table->string('slug')->unique()->comment('URL amigable única');
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete()->comment('ID de la categoría padre para jerarquías');
            $table->boolean('is_active')->default(true)->comment('Indica si la categoría está visible en la tienda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
