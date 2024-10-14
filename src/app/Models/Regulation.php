<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Regulation extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'attendance',
        'behavior',  
        'academic',
    ]; 

     public function documents()  
    {  
        return $this->hasMany(Document::class, 'regulation_id');  
    }  

    static public function getRegulationID($id)
    {
        return self::find($id);
    }
} 
