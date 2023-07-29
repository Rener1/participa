<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoautorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coautors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ordem')->nullable();

            $table->unsignedBigInteger('eventos_id');
            $table->foreign('eventos_id')->references('id')->on('eventos');

            $table->unsignedBigInteger('autorId');
            $table->unsignedBigInteger('trabalhoId')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coautors');
    }
}
