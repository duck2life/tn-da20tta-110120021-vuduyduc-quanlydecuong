<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Subject extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'degree',
        'branch',  
        'major',
    ];  

    public function documents()  
    {  
        return $this->hasMany(Document::class, 'subject_id');  
    }  

    static public function getSubID($id)
    {
        return self::find($id);
    }
}