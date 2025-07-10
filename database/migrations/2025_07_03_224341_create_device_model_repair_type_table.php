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
    Schema::create('device_model_repair_type', function (Blueprint $table) {
        $table->primary(['device_model_id', 'repair_type_id']);
        $table->foreignId('device_model_id')->constrained()->onDelete('cascade');
        $table->foreignId('repair_type_id')->constrained()->onDelete('cascade');
        $table->decimal('price', 8, 2); // Precio específico para esta combinación
        $table->integer('time_estimate_minutes')->nullable(); // Tiempo estimado
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_model_repair_type');
    }
};
