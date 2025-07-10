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
    Schema::create('quotes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('device_model_id')->constrained()->onDelete('cascade');
        $table->foreignId('repair_type_id')->constrained()->onDelete('cascade');
        $table->decimal('price', 8, 2); // El precio que se cotizó en ese momento
        $table->string('status')->default('pending'); // Ej: pending, in_progress, completed
        $table->text('notes')->nullable(); // Notas adicionales del cliente o admin
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
