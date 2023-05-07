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
        Schema::create('has_groups', function (Blueprint $table) {
            $table->id();  
            $table->bigInteger("student_id")->unsigned(); 
            $table->bigInteger("group_id")->unsigned(); 
            $table->string("situation");
            $table->integer("absances");  
            $table->double("prix");
            $table->double("paiement");  
            $table->double("rest");
            $table->double("bonus");  
            $table->bigInteger("Creator_id")->unsigned();  
            
        });
        Schema::table('has_groups', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        Schema::table('has_groups', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
        Schema::table('has_groups', function (Blueprint $table) {
            $table->foreign('Creator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_groups');
    }
};
