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
        Schema::create('benevs', function (Blueprint $table) {
            $table->id();
            $table->string('lieu', 70);
            $table->date('date');
            $table->time('heure');
            $table->bigInteger('idRole')->unsigned();
            $table->bigInteger('idBene')->unsigned();
            $table->bigInteger('idEme')->unsigned();

            $table->foreign('idRole')->references('id')->on('roles');
            $table->foreign('idBene')->references('id')->on('users');
            $table->foreign('idEme')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benevs');
    }
};
