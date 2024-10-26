<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()  
    {  
        Schema::create('information', function (Blueprint $table) {  
            $table->id();  
            $table->string('course_type');  
            $table->string('credit');  
            $table->string('teaching_hours');  
            $table->integer('self_study');  
            $table->timestamps();  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('information');  
    } 
};
