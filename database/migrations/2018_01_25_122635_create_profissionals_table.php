<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

   
    public function up()
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nome',100);
            $table->string('cargo',100);
            $table->string('especialidade',100);
            $table->string('cpf',30);           
            $table->string('registro',20);        
            $table->string('tel',15)->nullable();
            $table->string('cel',15)->nullable();
            $table->date('dtcadastro');

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
        Schema::dropIfExists('profissionals');
    }
}
