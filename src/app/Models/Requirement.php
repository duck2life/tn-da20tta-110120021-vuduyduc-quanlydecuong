<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Requirement extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'prerequisite',  
        'corequisite',   
        'other_requirements', 
    ];  

    public function documents()  
    {  
        return $this->hasMany(Document::class, 'requirement_id');  
    }  

    static public function getRequiID($id)
    {
        return self::find($id);
    }
}