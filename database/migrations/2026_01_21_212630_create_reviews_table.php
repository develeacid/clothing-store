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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->comment('Usuario registrado (opcional)');
            $table->string('guest_name')->nullable()->comment('Nombre para usuarios no registrados');
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->comment('Producto reseñado');
            $table->integer('rating')->comment('Calificación de 1 a 5');
            $table->text('comment')->nullable()->comment('Texto de la reseña');
            $table->boolean('is_approved')->default(false)->comment('Requiere aprobación si es invitado o por defecto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
