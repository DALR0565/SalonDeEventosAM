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
        Schema::create('paquete_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paquete_id');
            $table->unsignedBigInteger('servicio_id')->nullable();

            $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('CASCADE');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquete_servicio');
    }
};
