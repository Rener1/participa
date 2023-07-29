<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('revisor_id')->nullable();
            $table->foreign('revisor_id')->references('id')->on('revisors')->onDelete('cascade');

            $table->unsignedBigInteger('trabalho_id')->nullable();
            $table->foreign('trabalho_id')->references('id')->on('trabalhos')->onDelete('cascade');

            $table->unsignedBigInteger('pergunta_id');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
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
        Schema::dropIfExists('respostas');
    }
}
