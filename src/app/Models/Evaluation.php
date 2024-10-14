<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Evaluation extends Model  
{  
    use HasFactory;  

    protected $fillable = [ 
        'type_duration',
        'content_review',
        'cdr_review',
        'criteria',
        'percentage',

    ];  

    public function documents()  
    {  
        return $this->hasMany(Document::class, 'evaluation_id');  
    }  

    static public function getEvaID($id)
    {
        return self::find($id);
    }
} 