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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->float('cantidad');
            $table->text('descripcion');

            $table->unsignedBigInteger('gerente_id');
            $table->unsignedBigInteger('evento_id');

            $table->foreign('gerente_id')->references('id')->on('gerentes')->onDelete('CASCADE');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
