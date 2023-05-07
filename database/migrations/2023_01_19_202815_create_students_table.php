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
        Schema::create('students', function (Blueprint $table) {
            $table->id();  
            $table->string("name");
            $table->string("lastname");
            $table->integer("age");  
            $table->string("level");
            $table->date("inscription_Date");
            $table->text("photo");
            $table->string("phone",13);  
            $table->string("phone2",13);
            $table->string("phone3",13);  
            $table->text("observation");
            $table->integer("amiNumber");  
            $table->double("bonus");  
            $table->string("folder",3);  
            $table->string("exam",3);  
            $table->bigInteger("cours_id")->unsigned();  
            $table->bigInteger("creatorId")->unsigned();  
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('cours_id')->references('id')->on('cources')->onDelete('cascade');
        });
        Schema::table('students', function (Blueprint $table) {
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
        Schema::dropIfExists('students');
    }
};
