<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentController;  

class Output extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'stt',
        'learning_outcomes',
        'outcomes',
        'competency_level',
    	'tua',
    ];  

    public function documents()  
    {  
        return $this->hasMany(Document::class, 'output_id');  
    }  

    static public function getOutID($id)
    {
        return self::find($id);
    }

}
