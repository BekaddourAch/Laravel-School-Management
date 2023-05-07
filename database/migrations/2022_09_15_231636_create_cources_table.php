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
        Schema::create('cources', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->integer("prix");
            $table->integer("duree"); 
            $table->bigInteger("formationId")->unsigned(); 
            $table->bigInteger("creatorId")->unsigned(); 
        });
        Schema::table('cources', function (Blueprint $table) {
            $table->foreign('formationId')->references('id')->on('formations')->onDelete('cascade');
        });
        Schema::table('cources', function (Blueprint $table) {
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
        Schema::dropIfExists('cources');
    }
};
