<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParecersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parecers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('resultado');
            $table->text('justificativa')->nullable();

            $table->unsignedBigInteger('revisorId');
            $table->unsignedBigInteger('trabalhoId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parecers');
    }
}
