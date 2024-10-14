<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()  
    {  
        Schema::create('regulations', function (Blueprint $table) {  
            $table->id();  
            $table->longText('attendance');  
            $table->longText('behavior');    
            $table->longText('academic'); 
            $table->timestamps(); 
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('regulations');  
    }  
};
