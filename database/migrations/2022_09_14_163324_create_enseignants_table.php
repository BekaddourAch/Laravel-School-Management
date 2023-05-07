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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("specialite");
            $table->string("specialite2");
            $table->string("specialite3");
            $table->string("phone1");
            $table->string("phone2");
            $table->string("phone3");
            $table->string("email");
            $table->string("address");
            $table->bigInteger("creatorId")->unsigned(); 
        });
        Schema::table('enseignants', function (Blueprint $table) {
            $table->foreign('creatorId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignants');
    }
};
