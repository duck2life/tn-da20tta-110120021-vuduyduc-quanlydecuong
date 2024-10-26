<?php

namespace App\Models;  
use Illuminate\Http\Request;  

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

    
    public static function getSubject(Request $request)  
    {  
        $return = self::select('subjects.*')
                  ->whereHas('documents', function ($query) use ($request) {  
                      $query->where('is_delete', '=', 0)  
                            ->where('version', '=', 1);  
                      
                      if (!empty($request->input('doc_name'))) {  
                          $query->where('doc_name', 'like', '%' . $request->input('doc_name') . '%');  
                      }  
                      if (!empty($request->input('year'))) {  
                          $query->where('year', '=', $request->input('year'));  
                      }  
                      if (!empty($request->input('semester'))) {  
                          $query->where('semester', '=', $request->input('semester'));  
                      }  
                  });  
        return $return->get(); 
    }

}