<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use App\Models\DocumentController;  

class Information extends Model  
{  
    use HasFactory;  
    
    protected $fillable = [  
        'course_type',  
        'credit',  // This will store the concatenated credit values  
        'teaching_hours',  // This will store the concatenated teaching hours  
        'self_study',  
    ];  

    public function documents()  
    {  
        return $this->hasMany(Document::class, 'information_id');  
    }  

    static public function getInfoID($id)
    {
        return self::find($id);
    }

        static public function getOldInfoID($id)
    {
        return self::find($id);
    }
}