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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha');
            $table->time('hora_de_inicio');
            $table->time('hora_de_cierre');
            $table->integer('numero_de_invitados');
            $table->enum('confirmacion',['Confirmado','Pendiente'])->default('Pendiente');
            $table->text('detalles');
            $table->unsignedBigInteger("paquete_id");
            $table->unsignedBigInteger("usuario_id");

            $table->foreign("paquete_id")
                    ->on("paquetes")
                    ->references("id")->onDelete('CASCADE');

            $table->foreign("usuario_id")
                    ->on("usuarios")
                    ->references("id")->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
