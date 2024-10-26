<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()  
    {  
        Schema::create('references', function (Blueprint $table) {  
            $table->id();  
            $table->longText('primary_reference');  
            $table->longText('additional_reference');    
            $table->longText('other_reference'); 
            $table->timestamps(); 
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('references');  
    }  
};
