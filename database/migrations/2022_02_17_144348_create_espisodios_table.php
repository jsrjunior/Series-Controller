<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspisodiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espisodios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('temporada_id')->unsigned();;
            $table->foreign('temporada_id')->references('id')->on('temporadas');
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
        Schema::dropIfExists('espisodios');
    }
}
