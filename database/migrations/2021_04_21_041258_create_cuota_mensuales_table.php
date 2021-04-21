<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotaMensualesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuota_mensuales', function (Blueprint $table) {
            $table->id();
            $table->float('valor_mensualidad');
            $table->float('costo_comida');
            $table->foreignId('niño_id')->constrained('ninos');
            $table->foreignId('pagador_id')->constrained('pagadores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuota_mensuales');
    }
}
