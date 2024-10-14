<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use App\Models\Document;  
use App\Models\Information;  
use App\Models\Subject;  
use App\Models\Requirement;  
use App\Models\Reference;  
use App\Models\Output;  
use App\Models\Content;  
use App\Models\Regulation;  
use App\Models\Evaluation;

use Barryvdh\DomPDF\Facade\Pdf;

class OldDocumentController extends Controller
{

    public function document_old(Request $request, $id)  
    {  
        $doc['getOldData'] = Document::getOldDoc($request, $id); // Pass the ID to the method  
        $doc['header_title'] = "Old Document";  
        return view('admin.document.old.version', $doc);  
    }  



    public function document_old_view($id)  
    {  
        $data['getData'] = Document::with('subjects')->find($id);   
        if (!$data['getData']) {  
            return redirect()->back()->withErrors(['error' => 'Document not found.']);  
        }  

        $data['getInfo'] = Information::getInfoID($data['getData']->information_id);  
        if (!$data['getInfo']) {  
            return redirect()->back()->withErrors(['error' => 'Information not found.']);  
        }  

        $courseTypes = explode(',', $data['getInfo']->course_type);  
        $data['isCoSoChecked'] = in_array('on', $courseTypes) && count($courseTypes) > 0;  
        $data['isChuyenNganhChecked'] = in_array('on', $courseTypes) && count($courseTypes) > 1;  

        $data['getEva'] = Evaluation::getEvaID($data['getData']->evaluation_id);  
        if (!$data['getEva']) {  
            return redirect()->back()->withErrors(['error' => 'Evaluation not found.']);  
        }  

        $data['getCon'] = Content::getConID($data['getData']->content_id);  
        if (!$data['getCon']) {  
            return redirect()->back()->withErrors(['error' => 'Content not found.']);  
        }  


        $output = Output::getOutID($data['getData']->output_id);  
        if (!$output) {  
            return redirect()->back()->withErrors(['error' => 'Output standard not found.']);  
        }  
        $data['finalStt'] = json_decode($output->stt, true);
        $data['finalLearningOutcomes'] = json_decode($output->learning_outcomes, true);
        $data['finalOutcomes'] = json_decode($output->outcomes, true);
        $data['finalCompetencyLevels'] = json_decode($output->competency_level, true);
        $data['finalTua'] = json_decode($output->tua, true);
        


        $content = Content::find($data['getData']->content_id);  
        if (!$content) {  
            return redirect()->back()->withErrors(['error' => 'Content not found.']);  
        }  
        // Decode JSON data into arrays  
        $data['contents'] = json_decode($content->content, true);  
        $data['cdrs'] = json_decode($content->cdr, true);  
        $data['lts'] = json_decode($content->lt, true);  
        $data['ths'] = json_decode($content->th, true);  
        $data['selfStudyHours'] = json_decode($content->self_study_hour, true);  
        $data['notes'] = json_decode($content->note, true);  

        // Fetch related subject and regulation details  
        $data['getSub'] = Subject::getSubID($data['getData']->subject_id);   
        $data['getRequi'] = Requirement::getRequiID($data['getData']->requirement_id);   
        $data['getRefe'] = Reference::getRefeID($data['getData']->reference_id);  
        $data['getRegulation'] = Regulation::getRegulationID($data['getData']->regulation_id);  



        if (!empty($data['getSub'])) {  
            $data['header_title'] = "View Document";  
            return view('admin.document.old.view', $data);  
        } else {  
            abort(404);  
        }  
    }



public function document_compare(Request $request, $id)  
{  
    // Fetch the current document by ID  
    $currentDocument = Document::find($id);  
    
    // Check if the current document exists  
    if (!$currentDocument) {  
        return redirect()->back()->with('error', 'Current document not found.');  
    }  

    // Fetch another document with the same doc_id  
    $comparisonDocument = Document::where('doc_id', $currentDocument->doc_id)  
                                    ->where('id', '!=', $id) // Get another document with the same doc_id  
                                    ->first();  

    // Check if a comparison document was found  
    if (!$comparisonDocument) {  
        return redirect()->back()->with('error', 'No document found for comparison.');  
    }  

    // Prepare data for the view  
    return view('admin.document.old.view', [  
        'currentDocument' => $currentDocument, // Current document to compare  
        'comparisonDocument' => $comparisonDocument, // Document for comparison  
    ]);  
}
}
