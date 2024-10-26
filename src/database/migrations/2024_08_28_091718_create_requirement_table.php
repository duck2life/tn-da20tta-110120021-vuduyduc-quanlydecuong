<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    public function up()  
    {  
        Schema::create('requirements', function (Blueprint $table) {  
            $table->id();  
            $table->longText('prerequisite');  // Change from string to longText  
            $table->longText('corequisite');    // Change from string to longText  
            $table->longText('other_requirements'); // Change from string to longText  
            $table->timestamps();   
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('requirements');  
    }  
};