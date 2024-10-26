<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Content extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'content',  
        'cdr',  
        'lt',  
        'th',  
        'self_study_hour',  
        'note',  
    ];  

     public function documents()  
    {  
        return $this->hasMany(Document::class, 'content_id ');  
    }  

    static public function getConID($id)
    {
        return self::find($id);
    }
    
} 