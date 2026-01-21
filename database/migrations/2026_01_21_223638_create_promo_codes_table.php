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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('Código promocional único');
            $table->enum('type', ['percentage', 'fixed_amount'])->comment('Tipo de descuento');
            $table->decimal('value', 10, 2)->comment('Valor del descuento');
            $table->integer('usage_limit')->nullable()->comment('Límite de usos');
            $table->integer('used_count')->default(0)->comment('Veces usado');
            $table->dateTime('starts_at')->comment('Fecha de inicio');
            $table->dateTime('ends_at')->comment('Fecha de fin');
            $table->boolean('is_active')->default(true)->comment('Código activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
