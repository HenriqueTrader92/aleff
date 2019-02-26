<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_func')->unsigned();
            $table->foreign('id_func')->references('id_func')->on('func_departs')->onDelete('cascade');
            $table->integer('id_depart')->unsigned();
            $table->foreign('id_depart')->references('id_depart')->on('func_departs')->onDelete('cascade');
            //$table->enum('type', ['I', 'O', 'T']);
            $table->double('valor', 10, 2);
            $table->double('total_antes', 10, 2);
            $table->double('total_depois', 10, 2);
            //$table->integer('user_id_transaction')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('movimentacoes');
    }
}
