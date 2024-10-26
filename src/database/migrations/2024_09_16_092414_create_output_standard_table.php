<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();  
            $table->string('stt');  
            $table->mediumText('learning_outcomes');    
            $table->mediumText('outcomes'); 
            $table->mediumText('competency_level');    
            $table->mediumText('tua'); 
            $table->timestamps(); 			
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};

