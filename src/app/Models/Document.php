<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Http\Request; // Correctly import the Request class  

class Document extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'doc_name',  
        'mhp',  
        'information_id',   
        'subject_id',  
        'year',  
        'semester',  
        'requirement_id',  
        'reference_id',  
        'description', 
        'output_id',  
        'content_id',  
        'method',   
        'evaluation_id',  
        'regulation_id',  
        'participant',  
    ];  

    public function subjects()  
    {  
        return $this->belongsTo(Subject::class, 'subject_id'); // Adjust the foreign key as necessary  
    }  
    
    


    static public function getDocID($id)
    {
        return self::find($id);
    }
    

    
    static public function getDocument(Request $request) // Accept Request as a parameter  
    {  
        $return = self::select('documents.*')  
                      ->where('is_delete', '=', 0)
                      ->where('version', '=', 1);  
        if (!empty($request->input('doc_name'))) {  
            $return = $return->where('doc_name', 'like', '%' . $request->input('doc_name') . '%');  
        }  
        if (!empty($request->input('year'))) {  
            $return = $return->where('year', '=', $request->input('year'));  
        }  
        if (!empty($request->input('semester'))) {  
            $return = $return->where('semester', '=', $request->input('semester'));  
        }  

        $return = $return->orderBy('id', 'desc')  
                         ->paginate(5);  
                         
        return $return;  
    }  




    
    
    static public function getOldDoc(Request $request, $id) // Accept ID as a parameter  
    {  
        $return = self::select('documents.*')  
                    ->where('is_delete', '=', 0)  
                    ->where('version', '=', 2)  
                    ->where('doc_id', '=', $id); // Use the passed ID  

        if (!empty($request->input('doc_name'))) {  
            $return = $return->where('doc_name', 'like', '%' . $request->input('doc_name') . '%');  
        }  
        if (!empty($request->input('year'))) {  
            $return = $return->where('year', '=', $request->input('year'));  
        }  
        if (!empty($request->input('semester'))) {  
            $return = $return->where('semester', '=', $request->input('semester'));  
        }  

        $return = $return->orderBy('changes', 'desc')  
                        ->paginate(5);  
                        
        return $return;  
    } 
}