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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre de la promoción');
            $table->enum('type', ['buy_x_get_y', 'category_discount', 'percentage', 'fixed_amount'])->comment('Tipo de promoción');
            $table->integer('buy_quantity')->nullable()->comment('Cantidad a comprar (ej. 2 en 2x3)');
            $table->integer('get_quantity')->nullable()->comment('Cantidad gratis (ej. 1 en 2x3)');
            $table->decimal('discount_percentage', 5, 2)->nullable()->comment('Descuento porcentual');
            $table->decimal('discount_amount', 10, 2)->nullable()->comment('Descuento monto fijo');
            $table->enum('applies_to', ['products', 'categories'])->comment('Aplica a productos o categorías');
            $table->dateTime('starts_at')->comment('Fecha de inicio');
            $table->dateTime('ends_at')->comment('Fecha de fin');
            $table->boolean('is_active')->default(true)->comment('Promoción activa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
