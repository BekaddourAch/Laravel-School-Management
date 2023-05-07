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
        Schema::create('planing', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('jour');
            $table->time('start');
            $table->time('end');
            $table->bigInteger('id_salle')->unsigned();
            $table->bigInteger('creator_Id')->unsigned();
            $table->timestamps();
        });
        Schema::table('planing', function (Blueprint $table) {
            $table->foreign('id_salle')->references('id')->on('salles')->onDelete('cascade');
            $table->foreign('creator_Id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planing');
    }
};