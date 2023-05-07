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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("courses_id")->unsigned();  
            $table->bigInteger("enseignant_Id")->unsigned();  
            $table->integer("nbr_seance");
            $table->integer("nbr_Click");
            $table->integer("niveau");
            $table->bigInteger("creatorId")->unsigned();  
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('courses_id')->references('id')->on('cources')->onDelete('cascade');
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('enseignant_Id')->references('id')->on('enseignants')->onDelete('cascade');
        });
        Schema::table('groups', function (Blueprint $table) {
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
        Schema::dropIfExists('groups');
    }
};
