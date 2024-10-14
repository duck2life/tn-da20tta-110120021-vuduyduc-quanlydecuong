<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();  
            $table->mediumText('type_duration');  
            $table->mediumText('content_review');    
            $table->mediumText('cdr_review'); 
            $table->mediumText('criteria');    
            $table->mediumText('percentage');
 
 
            $table->timestamps(); 			
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
