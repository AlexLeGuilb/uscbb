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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35);
            $table->string('firstname', 35);
            $table->string('email', 70)->unique();
            $table->string('phone', 10)->unique();
            $table->string('phonePere', 10)->nullable();
            $table->string('phoneMere', 10)->nullable();
            $table->enum('droit', ['admin', 'presi', 'memb', 'staff', 'joueur', 'guest']);
            $table->string('cate', 5);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('cate')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
