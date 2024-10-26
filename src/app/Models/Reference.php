<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Reference extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'primary_reference',
        'additional_reference',  
        'other_reference',
    ];  

    public function documents()  
    {  
        return $this->hasMany(Document::class, 'reference_id');  
    }  

    static public function getRefeID($id)
    {
        return self::find($id);
    }
}