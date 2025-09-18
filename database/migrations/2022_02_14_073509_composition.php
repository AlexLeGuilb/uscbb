<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compositions', function (Blueprint $table) {
            $table->bigInteger('idJoueur')->unsigned();
            $table->string('idEquipe', 5);
            $table->primary(['idJoueur', 'idEquipe']);

            $table->foreign('idJoueur')->references('id')->on('users');
            $table->foreign('idEquipe')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compositions');
    }
};
