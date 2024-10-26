<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    public function up(): void  
    {  
        Schema::create('documents', function (Blueprint $table) {  
            $table->id(); // Auto-incrementing ID  
            $table->string('doc_name', 255); // Document name  
            $table->integer('mhp'); // Assuming this is an integer  

            $table->bigInteger('information_id'); // Foreign key without constraint  
            $table->bigInteger('subject_id'); // Foreign key without constraint  

            $table->integer('year'); // Year  
            $table->integer('semester'); // Semester  

            $table->bigInteger('requirement_id'); // Foreign key without constraint  
            $table->bigInteger('reference_id'); // Foreign key without constraint  

            $table->longText('description'); // Description  

            $table->bigInteger('output_id'); // Foreign key without constraint  
            $table->bigInteger('content_id'); // Foreign key without constraint, nullable  
            $table->longText('method'); // Method  

            $table->bigInteger('evaluation_id'); // Foreign key without constraint  
            $table->bigInteger('regulation_id'); // Foreign key without constraint  

            $table->longText('participant'); // Foreign key without constraint  
            $table->timestamps(); // Created at and updated at  
  
            $table->tinyInteger('is_delete')->default(0); // Soft delete flag  
            $table->bigInteger('doc_id')->nullable(); // Nullable document ID  
            $table->bigInteger('changes')->nullable(); // Nullable changes  
            $table->tinyInteger('version')->default(1); // Default version  
        });  
    }  

    public function down(): void  
    {  
        Schema::dropIfExists('documents');  
    }  
};