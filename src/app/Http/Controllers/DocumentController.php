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

class DocumentController extends Controller
{
    
    public function document_list(Request $request)  
    {  
        // Initialize the query for Document  
        $query = Document::query();  

        // Gather subjects first  
        $doc['getSub'] = Subject::getSubject($request); // Pass the Request object  
        
        // Set the header title  
        $doc['header_title'] = "Document List";  

        // Add filtering for documents: is_delete and version  
        $query->where('is_delete', '=', 0)  
            ->where('version', '=', 1);  

        // Filter by document name if provided  
        if (!empty($request->input('doc_name'))) {  
            $query->where('doc_name', 'like', '%' . $request->input('doc_name') . '%');  
        }  

        // Filter by academic year if provided  
        if (!empty($request->input('year'))) {  
            $query->where('year', '=', $request->input('year'));  
        }  

        // Filter by semester if provided  
        if (!empty($request->input('semester'))) {  
            $query->where('semester', '=', $request->input('semester'));  
        }  

        // Optional filtering by branch based on subjects  
        if ($request->has('branch') && !empty($request->input('branch'))) {  
            $query->whereHas('subjects', function($q) use ($request) {  // Ensure you use the correct relationship name  
                $q->where('branch', $request->input('branch'));  
            });  
        }  

        // Perform pagination  
        $getData = $query->orderBy('id', 'desc')->paginate(5);  

        // Return the view with the filtered data  
        return view('admin.document.list', compact('getData', 'doc'));   
    }


    public function document_dashbroad(Request $request)  
    {  
        // Initialize the query for Document  
        $query = Document::query();  

        // Gather subjects first  
        $doc['getSub'] = Subject::getSubject($request); // Pass the Request object  
        
        // Set the header title  
        $doc['header_title'] = "Dashbroad";  

        // Add filtering for documents: is_delete and version  
        $query->where('is_delete', '=', 0)  
            ->where('version', '=', 1);  

        // Filter by document name if provided  
        if (!empty($request->input('doc_name'))) {  
            $query->where('doc_name', 'like', '%' . $request->input('doc_name') . '%');  
        }  

        // Filter by academic year if provided  
        if (!empty($request->input('year'))) {  
            $query->where('year', '=', $request->input('year'));  
        }  

        // Filter by semester if provided  
        if (!empty($request->input('semester'))) {  
            $query->where('semester', '=', $request->input('semester'));  
        }  

        // Optional filtering by branch based on subjects  
        if ($request->has('branch') && !empty($request->input('branch'))) {  
            $query->whereHas('subjects', function($q) use ($request) {  // Ensure you use the correct relationship name  
                $q->where('branch', $request->input('branch'));  
            });  
        }  

        // Perform pagination  
        $getData = $query->orderBy('id', 'desc')->paginate(5);  

        // Return the view with the filtered data  
        return view('admin.dashbroad', compact('getData', 'doc'));   
    }

    public function document_add()  
    {  
        $doc['header_title'] = "Add New Document";  
        return view('admin.document.add', $doc);  
    } 

    public function index()  
    {  
        $getData = Document::with('subject')->get(); // Eager load the subject relationship  
        return view('your_view_file', compact('getData'));  
    }



  public function document_insert(Request $request)  
{  
    $validated = $request->validate([  
        'doc_name' => 'required',  
        'mhp' => 'required',

            'co_so' => 'nullable|string',  
            'chuyen_nganh' => 'nullable|string',  
            'credit_theory_hours' => 'required|numeric|min:1',  
            'credit_practical_hours' => 'required|numeric|min:1',  
            'teaching_hours_theory_hours' => 'required|numeric|min:1',  
            'teaching_hours_practical_hours' => 'required|numeric|min:1',  
            'self_study' => 'required|numeric|min:1',

            "degree" => 'required',  
            "branch" => 'required',  
            "major" => 'nullable',

        'year' => 'required',  
        'semester' => 'required',

            'prerequisite' => 'required',  
            'corequisite' => 'required',   
            'other_requirements' => 'required',

            'primary_reference' => 'required', 
            'additional_reference' => 'required', 
            'other_reference' => 'required', 

        'description' => 'required',
        
            'knowledge.*.stt' => 'required',  
            'knowledge.*.learning_outcomes' => 'required',  
            'knowledge.*.outcomes' => 'required',  
            'knowledge.*.competency_level' => 'required',  
            'knowledge.*.tua' => 'required',  
            'skill.*.stt' => 'required',  
            'skill.*.learning_outcomes' => 'required',  
            'skill.*.outcomes' => 'required',  
            'skill.*.competency_level' => 'required',  
            'skill.*.tua' => 'required',  
            'attitude.*.stt' => 'required',  
            'attitude.*.learning_outcomes' => 'required',  
            'attitude.*.outcomes' => 'required',  
            'attitude.*.competency_level' => 'required',  
            'attitude.*.tua' => 'required',  

        'rows.*.content' => 'required',  
        'rows.*.cdr' => 'required',  
        'rows.*.lt' => 'required|integer|min:0',  
        'rows.*.th' => 'required|integer|min:0',  
        'rows.*.self_study_hour' => 'required|integer|min:0',  
        'rows.*.note' => 'nullable|string',   

        'method' => 'required',
        
            'type_duration1' => 'required',  
            'type_duration2' => 'required',  
            'type_duration3' => 'required',  
            'content_review1' => 'required',  
            'content_review2' => 'required',  
            'content_review3' => 'required',  
            'cdr_review1' => 'required',  
            'cdr_review2' => 'required',  
            'cdr_review3' => 'required',  
            'criteria1' => 'required',  
            'criteria2' => 'required',  
            'criteria3' => 'required',  
            'percentage1' => 'required',  
            'percentage2' => 'required',  
            'percentage3' => 'required', 
        
            'attendance' => 'required',  
            'behavior' => 'required',  
            'academic' => 'required',  

        'participant' => 'required',  
    ]);  

    try {  
        $course_type = trim(($validated['co_so'] ?? '') . ', ' . ($validated['chuyen_nganh'] ?? ''));  
        $credit = $validated['credit_theory_hours'] . ', ' . $validated['credit_practical_hours'];  
        $teaching_hours = $validated['teaching_hours_theory_hours'] . ', ' . $validated['teaching_hours_practical_hours'];  

        $information = Information::create([  
            'course_type' => $course_type,  
            'credit' => $credit,  
            'teaching_hours' => $teaching_hours,   
            'self_study' => $validated['self_study'],  
        ]);  
        \Log::info("Created information record with ID: " . $information->id);  


        $subject = Subject::create([  
            'degree' => $validated['degree'],  
            'branch' => $validated['branch'],  
            'major' => $validated['major'],   
        ]);  
        \Log::info("Created subject record with ID: " . $subject->id); 



        $requirement = Requirement::create([  
            'prerequisite' => $validated['prerequisite'],  
            'corequisite' => $validated['corequisite'],  
            'other_requirements' => $validated['other_requirements'],   
        ]);  
        \Log::info("Created Requirement record with ID: " . $requirement->id);
        


        $reference = Reference::create([  
            'primary_reference' => $validated['primary_reference'],  
            'additional_reference' => $validated['additional_reference'],  
            'other_reference' => $validated['other_reference'],  
        ]);  
        \Log::info("Created Reference record with ID: " . $reference->id);



        // Ensure we have the keys in the validated array  
        $knowledge = $validated['knowledge'] ?? [];  
        $skill = $validated['skill'] ?? [];  
        $attitude = $validated['attitude'] ?? [];  

        // Initialize arrays for processing knowledge data  
        $knowledgeStt = [];  
        $knowledgeLearningOutcomes = [];  
        $knowledgeOutcomes = [];  
        $knowledgeCompetencyLevels = [];  
        $knowledgeTua = [];  

        // Processing knowledge data  
        foreach ($knowledge as $row) {  
            $knowledgeStt[] = $row['stt'] ?? '';  
            $knowledgeLearningOutcomes[] = $row['learning_outcomes'] ?? '';  
            $knowledgeOutcomes[] = $row['outcomes'] ?? '';  
            $knowledgeCompetencyLevels[] = $row['competency_level'] ?? '';  
            $knowledgeTua[] = $row['tua'] ?? '';  
        }  

        // Initialize arrays for processing skill data  
        $skillSTT = [];  
        $skillLearningOutcomes = [];  
        $skillOutcomes = [];  
        $skillCompetencyLevels = [];  
        $skillTua = [];  

        // Processing skill data  
        foreach ($skill as $row) {  
            $skillSTT[] = $row['stt'] ?? '';  
            $skillLearningOutcomes[] = $row['learning_outcomes'] ?? '';  
            $skillOutcomes[] = $row['outcomes'] ?? '';  
            $skillCompetencyLevels[] = $row['competency_level'] ?? '';  
            $skillTua[] = $row['tua'] ?? '';  
        }   

        // Initialize arrays for processing attitude data  
        $attitudeStt = [];  
        $attitudeLearningOutcomes = [];  
        $attitudeOutcomes = [];  
        $attitudeCompetencyLevels = [];  
        $attitudeTua = [];  

        // Processing attitude data  
        foreach ($attitude as $row) {  
            $attitudeStt[] = $row['stt'] ?? '';  
            $attitudeLearningOutcomes[] = $row['learning_outcomes'] ?? '';  
            $attitudeOutcomes[] = $row['outcomes'] ?? '';  
            $attitudeCompetencyLevels[] = $row['competency_level'] ?? '';  
            $attitudeTua[] = $row['tua'] ?? '';  
        }  

        // Combine data into single strings for each category  
        $finalStt = implode('/ ', $knowledgeStt) . ' |' . implode('/ ', $skillSTT) . ' |' . implode('/ ', $attitudeStt);  
        $finalLearningOutcomes = implode('/ ', $knowledgeLearningOutcomes) . ' |' . implode('/ ', $skillLearningOutcomes) . ' |' . implode('/ ', $attitudeLearningOutcomes);  
        $finalOutcomes = implode('/ ', $knowledgeOutcomes) . ' |' . implode('/ ', $skillOutcomes) . ' |' . implode('/ ', $attitudeOutcomes);  
        $finalCompetencyLevels = implode('/ ', $knowledgeCompetencyLevels) . ' |' . implode('/ ', $skillCompetencyLevels) . ' |' . implode('/ ', $attitudeCompetencyLevels);  
        $finalTua = implode('/ ', $knowledgeTua) . ' |' . implode('/ ', $skillTua) . ' |' . implode('/ ', $attitudeTua);  


        // Create a single output standard record  
        $output = Output::create([  
            'stt' => json_encode($finalStt, JSON_UNESCAPED_UNICODE),  
            'learning_outcomes' => json_encode($finalLearningOutcomes, JSON_UNESCAPED_UNICODE),  
            'outcomes' => json_encode($finalOutcomes, JSON_UNESCAPED_UNICODE),  
            'competency_level' => json_encode($finalCompetencyLevels, JSON_UNESCAPED_UNICODE),  
            'tua' => json_encode($finalTua, JSON_UNESCAPED_UNICODE),  
        ]);  

        // Log creation of the output standard record  
        \Log::info("Created Output  record with ID: " . $output->id); 


        $rows = $validated['rows'] ?? [];  
        // Collect data  
        $contents = [];  
        $cdrs = [];  
        $lts = [];   
        $ths = [];   
        $selfStudyHours = [];   
        $notes = [];  

        foreach ($rows as $row) {  
            $contents[] = $row['content'] ?? '';  
            $cdrs[] = $row['cdr'] ?? '';  
            $lts[] = $row['lt'] ?? 0;   
            $ths[] = $row['th'] ?? 0;   
            $selfStudyHours[] = $row['self_study_hour'] ?? 0;   
            $notes[] = $row['note'] ?? '';  
        }  

        // Store content  
        $content = Content::create([  
            'content' => json_encode($contents, JSON_UNESCAPED_UNICODE),   
            'cdr' => json_encode($cdrs, JSON_UNESCAPED_UNICODE),  
            'lt' => json_encode($lts, JSON_UNESCAPED_UNICODE),   
            'th' => json_encode($ths, JSON_UNESCAPED_UNICODE),  
            'self_study_hour' => json_encode($selfStudyHours, JSON_UNESCAPED_UNICODE),   
            'note' => json_encode($notes, JSON_UNESCAPED_UNICODE),  
        ]);  

        // Log created record  
        \Log::info("Created Content record with ID: " . $content->id);
        


         $type_duration = '"' . $validated['type_duration1'] . '"; "' . $validated['type_duration2'] . '"; "' . $validated['type_duration3'] . '"';  
         $content_review = '"' . $validated['content_review1'] . '"; "' . $validated['content_review2'] . '"; "' . $validated['content_review3'] . '"';    
         $cdr_review = '"' . $validated['cdr_review1'] . '"; "' . $validated['cdr_review2'] . '"; "' . $validated['cdr_review3'] . '"';  
         $criteria = '"' . $validated['criteria1'] . '"; "' . $validated['criteria2'] . '"; "' . $validated['criteria3'] . '"';  
         $percentage = '"' . $validated['percentage1'] . '%"; "' . $validated['percentage2'] . '%"; "' . $validated['percentage3'] . '%"';  
            
        $evaluation = Evaluation::create([  
            'type_duration' => $type_duration,  
            'content_review' => $content_review,  
            'cdr_review' => $cdr_review,  
            'criteria' => $criteria,  
            'percentage' => $percentage,  
        ]);  

         \Log::info("Created Evaluation record with ID: " . $evaluation->id);  

        $regulation = Regulation::create([  
            'attendance' => $validated['attendance'],  
            'behavior' => $validated['behavior'],  
            'academic' => $validated['academic'],  
        ]);  
        \Log::info("Created Regulation record with ID: " . $regulation->id);



        Document::create([  
            'doc_name' => $validated['doc_name'],  
            'mhp' => $validated['mhp'],   
            'year' => $validated['year'],  
            'semester' => $validated['semester'],  
            'description' => $validated['description'],  
            'method' => $validated['method'],  
            'participant' => $validated['participant'], 

            'information_id' => $information->id, // Ensure this field is set  
            'subject_id' => $subject->id, // Ensure this field is set 
            'requirement_id' => $requirement->id,
            'reference_id' => $reference->id,
            'output_id' => $output->id,
            'content_id' => $content->id,
            'evaluation_id' => $evaluation->id,
            'regulation_id' => $regulation->id,
        ]);  
            
        return redirect('admin/document/list')->with('success', "Document successfully added");  
    } catch (\Exception $e) {  
        \Log::error("Error adding document: " . $e->getMessage());  
        \Log::info("Request data: ", $request->all());  
        return redirect()->back()->with('error', "Error adding document: " . $e->getMessage());  
    }  
}






    public function document_edit($id)  
    {  
        
        // Fetch the document  
        $data['getData'] = Document::with('subjects')->find($id);   
        if (!$data['getData']) {  
            return redirect()->back()->withErrors(['error' => 'Document not found.']);  
        }  

        // Fetch related information  
        $data['getInfo'] = Information::getInfoID($data['getData']->information_id);  
        if (!$data['getInfo']) {  
            return redirect()->back()->withErrors(['error' => 'Information not found.']);  
        }  
        
        // Set course types and check flags  
        $courseTypes = explode(',', $data['getInfo']->course_type);  
        $data['isCoSoChecked'] = in_array('on', $courseTypes) && count($courseTypes) > 0;  
        $data['isChuyenNganhChecked'] = in_array('on', $courseTypes) && count($courseTypes) > 1;  

        // Fetch evaluation related data  
        $data['getEva'] = Evaluation::getEvaID($data['getData']->evaluation_id);  
        if (!$data['getEva']) {  
            return redirect()->back()->withErrors(['error' => 'Evaluation not found.']);  
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

        




        // Fetch the content using content_id from the document  
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

        // Render the view with data or abort if no subject found  
        if (!empty($data['getSub'])) {  
            $data['header_title'] = "Edit Document";  
            return view('admin.document.edit', $data);  
        } else {  
            abort(404);  
        }  
    }


        public function document_update($id, Request $request)  
    {  
        \Log::info('Updating document with ID: ' . $id, $request->all());  

        $doc = Document::getDocID($id);  
        // Check if the document exists  
        if (!$doc) {  
            return redirect()->back()->withErrors(['error' => 'Document not found.']);  
        }  
        $oldDocData = [  
            'doc_name' => $doc->doc_name,  
            'mhp' => $doc->mhp,  
            'year' => $doc->year,  
            'semester' => $doc->semester,  
            'description' => $doc->description,  
            'method' => $doc->method,  
            'participant' => $doc->participant,  
            // Add any other fields you need to preserve  
        ];  




        $info = Information::getInfoID($doc->information_id);  
        if (!$info) {  
            return redirect()->back()->withErrors(['error' => 'Information not found.']);  
        }  
        $oldInfoData = [  
            'course_type' => $info->course_type,  
            'credit' => $info->credit,  
            'teaching_hours' => $info->teaching_hours,  
            'self_study' => $info->self_study,  
            // Add any other fields you need to preserve  
        ]; 


        $sub = Subject::getSubID($doc->subject_id);  
        if (!$sub) {  
            return redirect()->back()->withErrors(['error' => 'Subject not found.']);  
        }  
        $oldSubData = [  
            'degree' => $sub->degree,  
            'branch' => $sub->branch,  
            'major' => $sub->major,  
        ]; 




        $requi = Requirement::getRequiID($doc->requirement_id);        
        // Check if the subject exists  
        if (!$requi) {  
            return redirect()->back()->withErrors(['error' => 'Requirement not found.']);  
        }  
        $oldReqData = [  
            'prerequisite' => $requi->prerequisite,  
            'corequisite' => $requi->corequisite,  
            'other_requirements' => $requi->other_requirements,  
        ]; 



        
        $refe = Reference::getRefeID($doc->reference_id);        
        // Check if the subject exists  
        if (!$refe) {  
            return redirect()->back()->withErrors(['error' => 'Reference not found.']);  
        }
        $oldRefeData = [  
            'primary_reference' => $refe->primary_reference,  
            'additional_reference' => $refe->additional_reference,  
            'other_reference' => $refe->other_reference,  
        ]; 





       $out = Output::getOutID($doc->output_id);  
        if (!$out) {  
            return redirect()->back()->withErrors(['error' => 'Output not found.']);  
        }  
        $oldOutputData = [  
            'knowledge.*.stt' => $out->stt, 
            'knowledge.*.learning_outcomes' => $out->learning_outcomes, 
            'knowledge.*.outcomes' => $out->contoutcomesent,   
            'knowledge.*.competency_level' => $out->competency_level,   
            'knowledge.*.tua' => $out->tua,   

            'skill.*.stt' => $out->stt,   
            'skill.*.learning_outcomes' => $out->learning_outcomes,   
            'skill.*.outcomes' => $out->outcomes,   
            'skill.*.competency_level' => $out->competency_level,   
            'skill.*.tua' => $out->tua,   

            'attitude.*.stt' => $out->stt,   
            'attitude.*.learning_outcomes' => $out->learning_outcomes,   
            'attitude.*.outcomes' => $out->outcomes,   
            'attitude.*.competency_level' => $out->competency_level,   
            'attitude.*.tua' => $out->tua,   
        ]; 

        $validated = $request->validate([  
            'knowledge.*.stt' => 'required',  
            'knowledge.*.learning_outcomes' => 'required',  
            'knowledge.*.outcomes' => 'required',  
            'knowledge.*.competency_level' => 'required',  
            'knowledge.*.tua' => 'required',  

            'skill.*.stt' => 'required',  
            'skill.*.learning_outcomes' => 'required',  
            'skill.*.outcomes' => 'required',  
            'skill.*.competency_level' => 'required',  
            'skill.*.tua' => 'required',  

            'attitude.*.stt' => 'required',  
            'attitude.*.learning_outcomes' => 'required',  
            'attitude.*.outcomes' => 'required',  
            'attitude.*.competency_level' => 'required',  
            'attitude.*.tua' => 'required', 
        ]);   

        // Initialize arrays for processing knowledge data  
        $knowledgeStt = [];  
        $knowledgeLearningOutcomes = [];  
        $knowledgeOutcomes = [];  
        $knowledgeCompetencyLevels = [];  
        $knowledgeTua = [];  

        // Processing knowledge data  
        foreach ($validated['knowledge'] as $row1) {  
            $knowledgeStt[] = $row1['stt'] ?? '';  
            $knowledgeLearningOutcomes[] = $row1['learning_outcomes'] ?? '';  
            $knowledgeOutcomes[] = $row1['outcomes'] ?? '';  
            $knowledgeCompetencyLevels[] = $row1['competency_level'] ?? '';  
            $knowledgeTua[] = $row1['tua'] ?? '';  
        }  

        // Initialize arrays for processing skill data  
        $skillSTT = [];  
        $skillLearningOutcomes = [];  
        $skillOutcomes = [];  
        $skillCompetencyLevels = [];  
        $skillTua = [];  

        // Processing skill data  
        foreach ($validated['skill'] as $row2) {  
            $skillSTT[] = $row2['stt'] ?? '';  
            $skillLearningOutcomes[] = $row2['learning_outcomes'] ?? '';  
            $skillOutcomes[] = $row2['outcomes'] ?? '';  
            $skillCompetencyLevels[] = $row2['competency_level'] ?? '';  
            $skillTua[] = $row2['tua'] ?? '';  
        }   

        // Initialize arrays for processing attitude data  
        $attitudeStt = [];  
        $attitudeLearningOutcomes = [];  
        $attitudeOutcomes = [];  
        $attitudeCompetencyLevels = [];  
        $attitudeTua = [];  

        // Processing attitude data  
        foreach ($validated['attitude'] as $row3) {  
            $attitudeStt[] = $row3['stt'] ?? '';  
            $attitudeLearningOutcomes[] = $row3['learning_outcomes'] ?? '';  
            $attitudeOutcomes[] = $row3['outcomes'] ?? '';  
            $attitudeCompetencyLevels[] = $row3['competency_level'] ?? '';  
            $attitudeTua[] = $row3['tua'] ?? '';  
        }  

        // Combine data into single strings for each category  
        $finalStt = implode('/ ', $knowledgeStt) . ' |' . implode('/ ', $skillSTT) . ' |' . implode('/ ', $attitudeStt);  
        $finalLearningOutcomes = implode('/ ', $knowledgeLearningOutcomes) . ' |' . implode('/ ', $skillLearningOutcomes) . ' |' . implode('/ ', $attitudeLearningOutcomes);  
        $finalOutcomes = implode('/ ', $knowledgeOutcomes) . ' |' . implode('/ ', $skillOutcomes) . ' |' . implode('/ ', $attitudeOutcomes);  
        $finalCompetencyLevels = implode('/ ', $knowledgeCompetencyLevels) . ' |' . implode('/ ', $skillCompetencyLevels) . ' |' . implode('/ ', $attitudeCompetencyLevels);  
        $finalTua = implode('/ ', $knowledgeTua) . ' |' . implode('/ ', $skillTua) . ' |' . implode('/ ', $attitudeTua);  

        $out->stt = json_encode($finalStt, JSON_UNESCAPED_UNICODE); 
        $out->learning_outcomes = json_encode($finalLearningOutcomes, JSON_UNESCAPED_UNICODE); 
        $out->outcomes = json_encode($finalOutcomes, JSON_UNESCAPED_UNICODE); 
        $out->competency_level = json_encode($finalCompetencyLevels, JSON_UNESCAPED_UNICODE); 
        $out->tua = json_encode($finalTua, JSON_UNESCAPED_UNICODE); 





        $con = Content::getConID($doc->content_id);  
        if (!$con) {  
            return redirect()->back()->withErrors(['error' => 'Content not found.']);  
        }
        $oldContentData = [  
            'rows.*.content' => $con->content,  
            'rows.*.cdr' => $con->cdr,  
            'rows.*.lt' => $con->lt, 
            'rows.*.th' => $con->th,  
            'rows.*.self_study_hour' => $con->self_study_hour,   
            'rows.*.note' => $con->note,   
        ]; 
  
        // Validate request data  
        $validated = $request->validate([  
            'rows.*.content' => 'required',  
            'rows.*.cdr' => 'required',  
            'rows.*.lt' => 'required',  
            'rows.*.th' => 'required',  
            'rows.*.self_study_hour' => 'required',  
            'rows.*.note' => 'nullable',  
        ]);   
        // Initialize arrays to collect data  
        $contents = [];  
        $cdrs = [];  
        $lts = [];  
        $ths = [];  
        $selfStudyHours = [];  
        $notes = [];  

        // Extract the validated rows data  
        foreach ($validated['rows'] as $row) {  
            $contents[] = $row['content'];  
            $cdrs[] = $row['cdr'];  
            $lts[] = $row['lt'];  
            $ths[] = $row['th'];  
            $selfStudyHours[] = $row['self_study_hour'];  
            $notes[] = $row['note'];  
        } 

        $con->content = json_encode($contents, JSON_UNESCAPED_UNICODE);  
        $con->cdr = json_encode($cdrs, JSON_UNESCAPED_UNICODE);  
        $con->lt = json_encode($lts, JSON_UNESCAPED_UNICODE);  
        $con->th = json_encode($ths, JSON_UNESCAPED_UNICODE);  
        $con->self_study_hour = json_encode($selfStudyHours, JSON_UNESCAPED_UNICODE);  
        $con->note = json_encode($notes, JSON_UNESCAPED_UNICODE); 












        $eva = Evaluation::getEvaID($doc->evaluation_id);  
        if (!$eva) {  
            return redirect()->back()->withErrors(['error' => 'Evaluation not found.']);  
        } 
        $oldEvaData = [  
            'type_duration' => $eva->type_duration,  
            'content_review' => $eva->content_review,  
            'cdr_review' => $eva->cdr_review, 
            'criteria' => $eva->criteria,  
            'percentage' => $eva->percentage,   
        ]; 









        $regulation = Regulation::getRegulationID($doc->regulation_id);        
        // Check if the subject exists  
        if (!$regulation) {  
            return redirect()->back()->withErrors(['error' => 'Regulation not found.']);  
        } 
        $oldRegulationData = [  
            'attendance' => $regulation->attendance,  
            'behavior' => $regulation->behavior,  
            'academic' => $regulation->academic,  
        ]; 









        $courseTypes = [];  
        if ($request->input('co_so')) {  
            $courseTypes[] = 'on,';  // Base  
        }  
        if ($request->input('chuyen_nganh')) {  
            $courseTypes[] = ', on';  // Specialization  
        }  
        $info->course_type = implode(array_filter($courseTypes)); // This will prevent saving empty values  

        // Process credit hours  
        $theoryHours = $request->input('credit_theory_hours', 0);  
        $practicalHours = $request->input('credit_practical_hours', 0);  
        $info->credit = "{$theoryHours},{$practicalHours}";  // Save in the format "theory,practical"  

        // Process teaching hours  
        $teachingTheoryHours = $request->input('teaching_hours_theory_hours', 0);  
        $teachingPracticalHours = $request->input('teaching_hours_practical_hours', 0);  
        $info->teaching_hours = "{$teachingTheoryHours},{$teachingPracticalHours}";  // Save in the format "theory,practical"

        // Process self-study hours  
        $info->self_study = trim($request->input('self_study', 0));     



        // Get inputs from request  
        $type_duration1 = $request->input('type_duration1', '');  // Default to empty string if not provided  
        $type_duration2 = $request->input('type_duration2', '');  // Default to empty string  
        $type_duration3 = $request->input('type_duration3', '');  // Default to empty string  
        $eva->type_duration = "{$type_duration1};{$type_duration2};{$type_duration3}"; // Store in format "value1;value2;value3"  
        // Update the fields with the request data  
        $content_review1 = $request->input('content_review1', ''); 
        $content_review2 = $request->input('content_review2', ''); 
        $content_review3 = $request->input('content_review3', ''); 
        $eva->content_review = "{$content_review1};{$content_review2};{$content_review3}"; // Save reviews in a single string  
        // For the CDR reviews  
        $cdr_review1 = $request->input('cdr_review1', '');
        $cdr_review2 = $request->input('cdr_review2', ''); 
        $cdr_review3 = $request->input('cdr_review3', ''); 
        $eva->cdr_review = "{$cdr_review1};{$cdr_review2};{$cdr_review3}"; // Save CDR reviews in a single string  
        // For the criteria  
        $criteria1 = $request->input('criteria1', 0);  
        $criteria2 = $request->input('criteria2', 0);  
        $criteria3 = $request->input('criteria3', 0);  
        $eva->criteria = "{$criteria1};{$criteria2};{$criteria3}"; // Save criteria in a single string  
        // For percentages, if you want to save them like this  
        $percentage1 = $request->input('percentage1', 0);  
        $percentage2 = $request->input('percentage2', 0);  
        $percentage3 = $request->input('percentage3', 0);  
        $eva->percentage = "{$percentage1};{$percentage2};{$percentage3}"; 
 

        $sub->degree = trim($request->degree);  
        $sub->branch = trim($request->branch);  
        $sub->major = trim($request->major); 

        $requi->prerequisite = trim($request->prerequisite);  
        $requi->corequisite = trim($request->corequisite);  
        $requi->other_requirements = trim($request->other_requirements); 

        $refe->primary_reference = trim($request->primary_reference); 
        $refe->additional_reference = trim($request->additional_reference); 
        $refe->other_reference = trim($request->other_reference); 

        $regulation->attendance = trim($request->attendance); 
        $regulation->behavior = trim($request->behavior); 
        $regulation->academic = trim($request->academic); 


        $previousUpdatedAt = $doc->updated_at; 
        // Update document fields  
        $doc->doc_name = trim($request->doc_name);  
        $doc->mhp = trim($request->mhp);  
        $doc->year = trim($request->year);  
        $doc->semester = trim($request->semester);  
        $doc->description = trim($request->description);  
        $doc->method = trim($request->method);  
        $doc->participant = trim($request->participant);  

        $doc->changes = ($doc->changes ?? 0) + 1; // Increment changes count   

        // Save the document and subject  
        $doc->save();  
        $sub->save();
        $requi->save();  
        $refe->save();  
        $regulation->save();  
        $info->save();  
        $eva->save();  
        $con->save();
        $out->save();

        // Create a copy of the existing information  
        $oldInfo = $info->replicate();   
        // Set the oldInfo values to the old values before modification  
        $oldInfo->course_type = $oldInfoData['course_type'];  
        $oldInfo->credit = $oldInfoData['credit'];  
        $oldInfo->teaching_hours = $oldInfoData['teaching_hours'];  
        $oldInfo->self_study = $oldInfoData['self_study'];  
        // Save the old information with a new entry  
        $oldInfo->save();   



        // Create a copy of the existing information  
        $oldSub = $sub->replicate();   
        // Set the oldInfo values to the old values before modification  
        $oldSub->degree = $oldSubData['degree'];  
        $oldSub->branch = $oldSubData['branch'];  
        $oldSub->major = $oldSubData['major'];  
        $oldSub->save();   


        
        // Create a copy of the existing information  
        $oldReq = $requi->replicate(); 
        // Set the oldInfo values to the old values before modification  
        $oldReq->prerequisite = $oldReqData['prerequisite'];  
        $oldReq->corequisite = $oldReqData['corequisite'];  
        $oldReq->other_requirements = $oldReqData['other_requirements'];  
        $oldReq->save();   



        // Create a copy of the existing information  
        $oldRefe = $refe->replicate(); 
        // Set the oldInfo values to the old values before modification  
        $oldRefe->primary_reference = $oldRefeData['primary_reference'];  
        $oldRefe->additional_reference = $oldRefeData['additional_reference'];  
        $oldRefe->other_reference = $oldRefeData['other_reference'];  
        $oldRefe->save();  




        $oldCon = $con->replicate(); 
        // Set the oldInfo values to the old values before modification  
        $oldCon->content = $oldContentData['rows.*.content'];  
        $oldCon->cdr = $oldContentData['rows.*.cdr'];  
        $oldCon->lt = $oldContentData['rows.*.lt'];  
        $oldCon->th = $oldContentData['rows.*.th'];  
        $oldCon->self_study_hour = $oldContentData['rows.*.self_study_hour']; 
        $oldCon->note = $oldContentData['rows.*.note'];   
        $oldCon->save();  


        $oldOut = $out->replicate(); 
        // Set the oldInfo values to the old values before modification  
        $oldOut->stt = $oldOutputData['knowledge.*.stt'];  
        $oldOut->learning_outcomes = $oldOutputData['knowledge.*.learning_outcomes'];  
        $oldOut->outcomes = $oldOutputData['knowledge.*.outcomes'];  
        $oldOut->competency_level = $oldOutputData['knowledge.*.competency_level']; 
        $oldOut->tua = $oldOutputData['knowledge.*.tua']; 
        
        $oldOut->stt = $oldOutputData['skill.*.stt'];  
        $oldOut->learning_outcomes = $oldOutputData['skill.*.learning_outcomes'];  
        $oldOut->outcomes = $oldOutputData['skill.*.outcomes'];  
        $oldOut->competency_level = $oldOutputData['skill.*.competency_level']; 
        $oldOut->tua = $oldOutputData['skill.*.tua']; 

        $oldOut->stt = $oldOutputData['attitude.*.stt'];  
        $oldOut->learning_outcomes = $oldOutputData['attitude.*.learning_outcomes'];  
        $oldOut->outcomes = $oldOutputData['attitude.*.outcomes'];  
        $oldOut->competency_level = $oldOutputData['attitude.*.competency_level']; 
        $oldOut->tua = $oldOutputData['attitude.*.tua']; 
        $oldOut->save();  


        // Create a copy of the existing information  
        $oldEva = $eva->replicate(); 
        // Set the oldInfo values to the old values before modification  
        $oldEva->type_duration = $oldEvaData['type_duration'];  
        $oldEva->content_review = $oldEvaData['content_review'];  
        $oldEva->cdr_review = $oldEvaData['cdr_review'];  
        $oldEva->criteria = $oldEvaData['criteria'];  
        $oldEva->percentage = $oldEvaData['percentage'];  
        $oldEva->save();  




        // Create a copy of the existing information  
        $oldRegulation = $regulation->replicate(); 
        // Set the oldInfo values to the old values before modification  
        $oldRegulation->attendance = $oldRegulationData['attendance'];  
        $oldRegulation->behavior = $oldRegulationData['behavior'];  
        $oldRegulation->academic = $oldRegulationData['academic'];  
        $oldRegulation->save();  






        // Now create a new version of the document with old data  
        $oldDoc = $doc->replicate(); // Create a copy of the existing document  
        // Set the newDoc values to the old values before modification  
        $oldDoc->doc_name = $oldDocData['doc_name'];  

        // Set the id to the new  ID  
        $oldDoc->information_id = $oldInfo->id;
        $oldDoc->subject_id = $oldSub->id;
        $oldDoc->requirement_id = $oldReq->id;
        $oldDoc->reference_id  = $oldRefe->id;
        $oldDoc->content_id  = $oldCon->id;
        $oldDoc->output_id    = $oldOut->id;
        $oldDoc->evaluation_id  = $oldEva->id;
        $oldDoc->regulation_id   = $oldRegulation->id;

        $oldDoc->doc_id = $doc->id; // Ensure the new document has the same doc_id as the original        
        $oldDoc->version = $doc->version + 1; // Increment the version  
        $oldDoc->is_delete = 0; // Ensure it's not marked as deleted

        $oldDoc->mhp = $oldDocData['mhp'];  
        $oldDoc->year = $oldDocData['year'];  
        $oldDoc->semester = $oldDocData['semester'];  
        $oldDoc->description = $oldDocData['description'];  
        $oldDoc->method = $oldDocData['method'];  
        $oldDoc->participant = $oldDocData['participant']; 
        $oldDoc->created_at = $previousUpdatedAt; 
        // Save the old document  
        $oldDoc->save(); 




        return redirect('admin/document/list')->with('success', "Document successfully updated");  
    }



public function document_delete($id)  
{  
    // Fetch the primary document by its ID  
    $document = Document::getDocID($id);   

    if ($document) {  
        // Get the related IDs from the document  
        $informationId = $document->information_id;  
        $subjectId = $document->subject_id;  
        $requirementId = $document->requirement_id;  
        $referenceId = $document->reference_id;  
        $outputId = $document->output_id;  
        $contentId = $document->content_id;  
        $evaluationId = $document->evaluation_id;  
        $regulationId = $document->regulation_id;  
        $docId = $document->doc_id; // Get the doc_id for related data deletion  
        $version = $document->version; // Assuming your Document model has a version field  

        // Delete related documents that are referencing this document  
        Document::where('information_id', $informationId)->delete();  
        Document::where('subject_id', $subjectId)->delete();  
        Document::where('requirement_id', $requirementId)->delete();  
        Document::where('reference_id', $referenceId)->delete();  
        Document::where('output_id', $outputId)->delete();  
        Document::where('content_id', $contentId)->delete();  
        Document::where('evaluation_id', $evaluationId)->delete();  
        Document::where('regulation_id', $regulationId)->delete();  

        // Delete the corresponding entries in the related tables  
        if ($informationId) Information::where('id', $informationId)->delete();  
        if ($subjectId) Subject::where('id', $subjectId)->delete();  
        if ($requirementId) Requirement::where('id', $requirementId)->delete();  
        if ($referenceId) Reference::where('id', $referenceId)->delete();  
        if ($outputId) Output::where('id', $outputId)->delete();  
        if ($contentId) Content::where('id', $contentId)->delete();  
        if ($evaluationId) Evaluation::where('id', $evaluationId)->delete();  
        if ($regulationId) Regulation::where('id', $regulationId)->delete();  

        // Finally, delete the document itself   
        // Modified deletion code  
        Document::where('doc_id', '=', $id)  
            ->where('version', 2)  
            ->delete();
        
        $document->delete();  
        
        return redirect('admin/document/list')->with('success', "Document and related entries successfully deleted");  
    }          
    return redirect()->back()->with('error', "Document not found");  
}



public function document_view($id)  
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
        return view('admin.document.view', $data);  
    } else {  
        abort(404);  
    }  
}





public function document_print($id)  // Accept the $id parameter  
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
        
        $output = Output::getOutID($data['getData']->output_id);  
        if (!$output) {  
            return redirect()->back()->withErrors(['error' => 'Output standard not found.']);  
        }  
        $data['finalStt'] = json_decode($output->stt, true);
        $data['finalLearningOutcomes'] = json_decode($output->learning_outcomes, true);
        $data['finalOutcomes'] = json_decode($output->outcomes, true);
        $data['finalCompetencyLevels'] = json_decode($output->competency_level, true);
        $data['finalTua'] = json_decode($output->tua, true);
        $data['getCon'] = Content::getConID($data['getData']->content_id);  
        if (!$data['getCon']) {  
            return redirect()->back()->withErrors(['error' => 'Content not found.']);  
        }  

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

        $data['getSub'] = Subject::getSubID($data['getData']->subject_id);   
        $data['getRequi'] = Requirement::getRequiID($data['getData']->requirement_id);   
        $data['getRefe'] = Reference::getRefeID($data['getData']->reference_id);  
        $data['getRegulation'] = Regulation::getRegulationID($data['getData']->regulation_id); 

            return view('admin.document.print', $data);  

}


}
