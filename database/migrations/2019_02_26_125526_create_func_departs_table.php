<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncDepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_departs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_func')->unsigned();
            $table->foreign('id_func')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->integer('id_depart')->unsigned();
            $table->foreign('id_depart')->references('id')->on('departamentos')->onDelete('cascade');
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
        Schema::dropIfExists('func_departs');
    }
}
