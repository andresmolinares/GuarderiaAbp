<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ninos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_ingreso');
            $table->integer('comidas_realizadas')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->foreignId('persona_id')->constrained('personas');
            $table->foreignId('menu_id')->constrained('menus');
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
        Schema::dropIfExists('ninos');
    }
}
