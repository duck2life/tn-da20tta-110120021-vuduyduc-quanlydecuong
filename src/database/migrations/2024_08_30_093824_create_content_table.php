<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();  
            $table->string('tt');  
            $table->mediumText('content');    
            $table->mediumText('cdr'); 
            $table->string('lt');    
            $table->string('th');
            $table->string('self_study_hour'); 
            $table->mediumText('note'); 
 
            $table->timestamps(); 			
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }

};
