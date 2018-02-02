<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('numplutil')->nullable();
            $table->integer('numplnaoutil')->nullable();
            $table->decimal('valplutil',8,2)->nullable();
            $table->decimal('valplnaoutil',8,2)->nullable();

            $table->unsignedInteger('profissional_id');
            $table->foreign('profissional_id')->references('id')->on('profissionals');

            $table->unsignedInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');

            $table->unsignedInteger('setor_id');
            $table->foreign('setor_id')->references('id')->on('setors');

            $table->unsignedInteger('parametro_id');
            $table->foreign('parametro_id')->references('id')->on('parametros');

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
        Schema::dropIfExists('pagamentos');
    }
}
