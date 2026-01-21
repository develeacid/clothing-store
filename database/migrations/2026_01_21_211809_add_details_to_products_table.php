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
        Schema::table('products', function (Blueprint $table) {
            $table->text('materials')->nullable()->after('description')->comment('Composición y materiales');
            $table->text('care_instructions')->nullable()->after('materials')->comment('Instrucciones de cuidado');
            $table->string('origin')->nullable()->after('care_instructions')->comment('País de origen');
            $table->json('features')->nullable()->after('origin')->comment('Lista de características destacadas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
