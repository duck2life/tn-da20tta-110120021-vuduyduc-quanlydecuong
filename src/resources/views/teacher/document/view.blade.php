    @section('content')  
    @extends('layouts.app')
    <!DOCTYPE html>  
    <html lang="en">  
    <head>  
    <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>View </title>  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
        <style>  
            textarea  {  
                display: block;  
                overflow: hidden;  
                resize: none;  
                width: 100%; /* Optional: Set width */    
            }

            .myEditor{
                width: 150%; /* Ensures the editor keeps the full container width */  
                height: 1000px; /* Increases the height of the editor */             
            } 

            .form-control[readonly] {  
                background-color: white; /* Change this to match your desired background color */  
                opacity: 1; /* Make sure the text color is not faded */  
            }  
            
            .btn-custom {  
                padding: 12px 20px; /* Adjust padding */  
                font-size: 18px; /* Adjust font size */  
            }
        </style>  

        <script type="text/javascript">  
            function resizeTextarea(textarea) {  
                textarea.style.height = 'auto'; // Reset height to auto to recalculate  
                textarea.style.height = (textarea.scrollHeight) + 'px'; // Set height to scrollHeight  
            }  

            $(document).ready(function() {  
                // Resize on page load for each textarea  
                $('textarea').each(function() {  
                    resizeTextarea(this);  
                });  

                // Resize on input for each textarea  
                $('textarea').on('input', function () {  
                    resizeTextarea(this);  
                });  
            });  
        </script> 

    </head> 

    <body>
    <div class="content-wrapper">

<section class="content-header">  
    <div class="container-fluid">  
        <div class="row mb-2">  
            <div class="col-sm-6">  
                <h1>View Document</h1>  
            </div>  
            <div class="col-sm-6 text-right">  
                <a href="{{ url('teacher/document/print/' . $getData->id) }}" class="btn btn-primary btn-lg float-right">Print</a>  
            </div>  
        </div>  
    </div>  
</section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          @include('_message')

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View</h3>
              </div>

                <form action="{{ url('teacher/document/edit/' . $getData->id) }}" method="POST">  
                {{ csrf_field() }}

                <div class="form-group row justify-content-center">   
                    <div class="col-sm-12 text-center">  
                        <h3 style="font-weight: bold;">ĐỀ CƯƠNG HỌC PHẦN</h3>  
                        <h1 style="font-weight: bold; font-size: 30px;">  
                            <input type="text" class="form-control" name="doc_name" value="{{ old('doc_name', $getData->doc_name) }}" placeholder="Enter Label name" style="display: inline-block; width: 50%; border: none; background: transparent; font-weight: bold; font-size: 32px; text-align: center;" readonly>   
                        </h1>  
                        <h3 style="font-weight: bold; font-size: 24px; text-align: right;">  
                            MSHP: <input type="number" class="form-control" name="mhp" value="{{ old('mhp', $getData->mhp) }}" placeholder="Enter MHP" style="display: inline-block; width: 50%; border: none; background: transparent; font-weight: bold; font-size: 24px;" readonly>  
                        </h3>  
                    </div>  
                </div>  


                <br>

                <div class="col-sm-6">  
                    <label style="font-weight: bold;">1. Thông tin chung</label>  
                </div>  

                <div class="card-body">  
                    <table class="table table-bordered">  
                        <tbody>  
                            <tr class="equal-width" text-center style="font-weight: bold; border: 2px solid black;">  
                                <td style="border: 2px solid black;"><label for="LHP">Loại học phần</label></td>   
                                <td style="border: 2px solid black;"><label for="STC">Số tín chỉ</label></td>  
                                <td style="border: 2px solid black;"><label for="SGDG">Số giờ dự giảng</label></td>  
                                <td style="border: 2px solid black;"><label for="GTH">Giờ tự học và giờ học khác</label></td>  
                            </tr>   

                            <tr class="equal-width" style="border: 2px solid black;">  
                                
                            <td class="equal-width" style="border: 2px solid black;">  
                                <div style="display: flex; justify-content: space-between; align-items: center;">  
                                    <div>  
                                        <label>Cơ sở:</label>  
                                        <br>  
                                        <label>Chuyên ngành:</label>  
                                    </div>  
                                    <div>  
                                        <?php   
                                            // Check the course_type string  
                                            $courseType = trim($getInfo->course_type);  
                                            $isCoSoChecked = (strpos($courseType, 'on,') !== false);  
                                            $isChuyenNganhChecked = (strpos($courseType, ', on') !== false);  
                                        ?>  
                                        <input type="checkbox" id="co_so" name="co_so" value="on" style="margin-right: 5px; background: white; opacity: 1;" {{ $isCoSoChecked ? 'checked' : '' }} disabled>  
                                        <label for="co_so"></label>   
                                        <br><br>  
                                        <input type="checkbox" id="chuyen_nganh" name="chuyen_nganh" value="on" style="margin-right: 5px; background: white; opacity: 1;" {{ $isChuyenNganhChecked ? 'checked' : '' }} disabled>  
                                        <label for="chuyen_nganh"></label>  
                                    </div>  
                                </div>  
                            </td>              
                                
                                <td class="equal-width" style="border: 2px solid black;">   
                                    <div>  
                                        <label>Lý thuyết:</label>  
                                        <?php   
                                            // Assuming $getInfo->credit_hours holds the value "5,3"  
                                            $creditHours = isset($getInfo->credit) ? $getInfo->credit : '';  
                                            if (strpos($creditHours, ',') !== false) {  
                                                list($theoryHours, $practicalHours) = explode(',', $creditHours);  
                                            } else {  
                                                $theoryHours = $creditHours; // Assign the whole value if no comma  
                                                $practicalHours = 0; // Default practical hours  
                                            }  
                                        ?>  
                                        <input class="col-md-4" type="number" class="form-control" id="credit" name="credit_theory_hours" value="{{ old('credit_theory_hours', trim($theoryHours)) }}" min="1" readonly>  
                                        <br>  
                                        <label>Thực hành:</label>   
                                        <input class="col-md-4" type="number" class="form-control" id="credit" name="credit_practical_hours" value="{{ old('credit_practical_hours', trim($practicalHours)) }}" min="1" readonly>  
                                    </div>   
                                </td>  

                                <td class="equal-width" style="border: 2px solid black;">  
                                    <div>  
                                        <label>Lý thuyết:</label>  
                                        <?php   
                                            // Assuming $getInfo->teaching_hours holds the value "5,3"  
                                            $teachingHours = isset($getInfo->teaching_hours) ? $getInfo->teaching_hours : '';  
                                            if (strpos($teachingHours, ',') !== false) {  
                                                list($teachingTheoryHours, $teachingPracticalHours) = explode(',', $teachingHours);  
                                            } else {  
                                                $teachingTheoryHours = $teachingHours; // Assign the whole value if no comma  
                                                $teachingPracticalHours = 0; // Default practical hours  
                                            }  
                                        ?>  
                                        <input class="col-md-4" type="number" class="form-control" id="teaching_hours" name="teaching_hours_theory_hours" value="{{ old('teaching_hours_theory_hours', trim($teachingTheoryHours)) }}" min="1" readonly>  
                                        <br>  
                                        <label>Thực hành:</label>   
                                        <input class="col-md-4" type="number" class="form-control" id="teaching_hours" name="teaching_hours_practical_hours" value="{{ old('teaching_hours_practical_hours', trim($teachingPracticalHours)) }}" min="1" readonly>  
                                    </div>  
                                </td>  

                                <td class="equal-width" style="border: 2px solid black;">  
                                    <div>  
                                        <input class="col-md-4" type="number" class="form-control" name="self_study" value="{{ old('self_study', $getInfo->self_study) }}" min="1" readonly>  
                                    </div>   
                                </td>  
                            </tr>  
                        </tbody>  
                    </table>  
                </div>

                <div class="col-sm-6">
                    <label style="font-weight: bold;">Đối tượng học: </label>
                </div>

            <div class="card-body">
                  <div class="form-group">
                    <label>Trình độ: </label>
                    <input class="col-md-1" type="text" class="form-control" name="degree" value="{{ old('degree', $getSub->degree ?? '') }}" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label>Ngành:</label>
                    <input class="col-md-2" type="text" class="form-control" name="branch" value="{{ old('branch', $getSub->branch ?? '') }}" readonly>
                  </div>

                  <div class="form-group">
                    <label>Chuyên ngành:
                    <input class="col-md-6" type="text" class="form-control" name="major" value="{{ old('major', $getSub->major ?? '') }}" readonly>(nếu có)
                    </label>
                  </div>

                <div class="form-group">   
                    <label>Năm thứ:</label>  
                    <select class="col-md-1 form-control custom-select" name="year" disabled>  
                        <option value="1" {{ old('year', $getData->year) == 1 ? 'selected' : '' }}>1</option>  
                        <option value="2" {{ old('year', $getData->year) == 2 ? 'selected' : '' }}>2</option>  
                        <option value="3" {{ old('year', $getData->year) == 3 ? 'selected' : '' }}>3</option>  
                        <option value="4" {{ old('year', $getData->year) == 4 ? 'selected' : '' }}>4</option>  
                    </select>  

                    <label>Học kỳ:</label>  
                    <select class="col-md-1 form-control custom-select" name="semester" disabled>  
                        <option value="1" {{ old('semester', $getData->semester) == 1 ? 'selected' : '' }}>1</option>  
                        <option value="2" {{ old('semester', $getData->semester) == 2 ? 'selected' : '' }}>2</option>  
                    </select>  
                </div>  

                <style>  
                    /* Remove gray background from checkboxes */  
                    input[type="checkbox"]:disabled {  
                        background-color: transparent; /* Resets the background color */  
                        cursor: not-allowed; /* Changes cursor to indicate inability to click */  
                    }  

                    /* Remove gray background from disabled select elements */  
                    .custom-select:disabled {  
                        background-color: white; /* Sets background color like normal */  
                        color: black; /* Text color when disabled */  
                        cursor: not-allowed; /* Changes cursor to indicate inability to interact */  
                    }  
                </style> 
            </div>

            
                <div class="col-sm-6">
                    <label style="font-weight: bold;">Điều kiện tham gia học phần:</label>
                </div>

                <div class="card-body">  
                    <table class="table table-bordered">  
                        <tbody>  
                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HPTQ">Học phần tiên quyết</label></td>   
                                <td style="width: 80%; border: 2px solid black;"><input class="col-md-8 form-control" type="text" name="prerequisite" readonly value="{{ old('prerequisite', $getRequi->prerequisite ?? '') }}"></td>   
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HPSH">Học phần song hành</label></td>  
                                <td style="width: 80%; border: 2px solid black;"><input class="col-md-8 form-control" type="text" name="corequisite" readonly value="{{ old('corequisite', $getRequi->corequisite ?? '') }}"></td>    
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="CYCK">Các yêu cầu khác</label></td>   
                                <td style="border: 2px solid black;">
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="other_requirements" readonly>{{ old('other_requirements', $getRequi->other_requirements ?? '') }}</textarea>  
                                    </div>   
                                </td>                          
                            </tr>   

                        </tbody>  
                    </table>  
                </div>

                <br>
                <div class="col-sm-6">
                    <label style="font-weight: bold;">2. Nguồn học liệu(Learning resources): </label>
                </div>

                <div class="card-body">  
                    <table class="table table-bordered">  
                        <tbody>  
                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="GT">Giáo trình/ Tài liệu học tập chính</label></td>   
                                <td>
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="primary_reference" readonly>{{ old('primary_reference', $getRefe->primary_reference ?? '') }}</textarea>  
                                    </div>   
                                </td>   
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="TLTK">Tài liệu tham khảo thêm</label></td>  
                                <td>
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="additional_reference" readonly>{{ old('additional_reference', $getRefe->additional_reference ?? '') }}</textarea>  
                                    </div>   
                                </td>    
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HLK">Các loại học liệu khác</label></td>   
                                <td>
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="other_reference" readonly>{{ old('other_reference', $getRefe->other_reference ?? '') }}</textarea>  
                                    </div>   

                                </td>
                            </tr>   
                        </tbody>  
                    </table>  
                </div>
                



                <br>
                <div class="col mt-12"> 
                    <label class="form-label" style="font-weight: bold;">3. Mô tả học phần</label>  
                </div>  

                <div class="col-sm-10 editor-container">  
                    <textarea id="myEditor" class="form-control" name="description" readonly style="overflow: hidden" onkeyup="this.style.height='24px'; this.style.height = this.scrollHeight + 12 + 'px';">{{ old('description', $getData->description) }}</textarea>  
                </div>   

                <script>  
                    tinymce.init({  
                        selector: 'myEditor',  
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                        menubar: true,  
                    });  
                </script> 














                <br>  
                <div class="col-sm-12">  
                    <label style="font-weight: bold;">4. Chuẩn đầu ra của học phần</label>  
                </div>  

                <div class="card-body">  
                    <table margin="center" class="table table-bordered" id="dynamicTable" style="border: 2px solid black;">  
                        <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                            <td style="width: 5%; border: 2px solid black;"></td>  
                            <td style="width: 30%; border: 2px solid black;">Chuẩn đầu ra của học phần</td>  
                            <td style="width: 7%; border: 2px solid black;">Đáp ứng CĐR của CTĐT</td>  
                            <td style="width: 10%; border: 2px solid black;">Trình độ năng lực</td>  
                            <td style="width: 7%; border: 2px solid black;">TUA</td>  
                        </tr>   

                        <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                            <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                ◆ Về kiến thức  
                            </td>  
                        </tr>  

                        @if(isset($finalStt))  
                            @php  
                                $finalSttArray = explode('|', $finalStt);  
                                $finalLearningOutcomesArray = explode('|', $finalLearningOutcomes);  
                                $finalOutcomesArray = explode('|', $finalOutcomes);  
                                $finalCompetencyLevelsArray = explode('|', $finalCompetencyLevels);  
                                $finalTuaArray = explode('|', $finalTua);  
                            @endphp  


                            @php  
                                // Adjust the index for attitude section  
                                $knowledgeIndex = 1; // Start from 1 for the attitude section  
                                $knowledgeSttArray = explode('/', trim($finalSttArray[0] ?? '')); // Get the third part for attitude
                                $knowledgeLOArray = explode('/', trim($finalLearningOutcomesArray[0] ?? '')); // Get the third part for attitude
                                $knowledgeOArray = explode('/', trim($finalOutcomesArray[0] ?? '')); // Get the third part for attitude
                                $knowledgeCLArray = explode('/', trim($finalCompetencyLevelsArray[0] ?? '')); // Get the third part for attitude
                                $knowledgeTUAArray = explode('/', trim($finalTuaArray[0] ?? '')); // Get the third part for attitude
                            @endphp  

                            @foreach($knowledgeSttArray as $key => $sttValue)                     
                                    <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][stt]" readonly>{{ trim($sttValue) }}</textarea>   
                                            </div>  
                                        </td>   
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][learning_outcomes]"readonly> {{ trim($knowledgeLOArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>  
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][outcomes]" readonly>{{ trim($knowledgeOArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>   
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][competency_level]" readonly>{{ trim($knowledgeCLArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>  
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][tua]" readonly>{{ trim($knowledgeTUAArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>   
                                    </tr>   
                                @endforeach  
                        @endif  


                        <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                            <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                ◆ Về kỹ năng  
                            </td>  
                        </tr>   

                        @if(isset($finalStt))   
                            @php  
                                // Adjust the index for skills section  
                                $skillsIndex = 1; // Start from 1 for the skills section  
                                $skillsSttArray = explode('/', trim($finalSttArray[1] ?? '')); // Get the second part for skills
                                $skillLOArray = explode('/', trim($finalLearningOutcomesArray[1] ?? '')); // Get the third part for attitude
                                $skillOArray = explode('/', trim($finalOutcomesArray[1] ?? '')); // Get the third part for attitude
                                $skillCLArray = explode('/', trim($finalCompetencyLevelsArray[1] ?? '')); // Get the third part for attitude
                                $skillTUAArray = explode('/', trim($finalTuaArray[1] ?? '')); // Get the third part for attitude  
                            @endphp  

                            @foreach($skillsSttArray as $key => $sttValue)  
                                <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][stt]" readonly>{{ trim($sttValue) }}</textarea>   
                                        </div>  
                                    </td>   
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][learning_outcomes]" readonly>{{ trim($skillLOArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][outcomes]" readonly>{{ trim($skillOArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][competency_level]" readonly>{{ trim($skillCLArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][tua]" readonly>{{ trim($skillTUAArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                </tr>   
                            @endforeach  
                        @endif  
                        
                        <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                            <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                ◆ Về thái độ  
                            </td>  
                        </tr>  

                        @if(isset($finalStt))   
                            @php  
                                // Adjust the index for attitude section  
                                $attitudeIndex = 1; // Start from 1 for the attitude section  
                                $attitudeSttArray = explode('/', trim($finalSttArray[2] ?? '')); // Get the third part for attitude
                                $attitudelearningOutcomesValues = explode('/', trim($finalLearningOutcomesArray[2] ?? '')); // Get the third part for attitude
                                $attitudeoutcomesValues = explode('/', trim($finalOutcomesArray[2] ?? '')); // Get the third part for attitude
                                $attitudecompetencyLevelsValues = explode('/', trim($finalCompetencyLevelsArray[2] ?? '')); // Get the third part for attitude 
                                $attitudetuaValues = explode('/', trim($finalTuaArray[2] ?? '')); // Get the third part for attitude
                            @endphp  

                            @foreach($attitudeSttArray as $key => $sttValue)  
                                <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][stt]" readonly>{{ trim($sttValue) }}</textarea>   
                                        </div>  
                                    </td>   
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][learning_outcomes]" readonly>{{ trim($attitudelearningOutcomesValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][outcomes]" readonly>{{ trim($attitudeoutcomesValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][competency_level]" readonly>{{ trim($attitudecompetencyLevelsValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][tua]" readonly>{{ trim($attitudetuaValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                </tr>   
                            @endforeach  
                        @endif                          
                        
                    </table>  
                </div>

              
















            <br>
                <div class="col-sm-12">  
                    <label style="font-weight: bold;">5. Nội dung của học phần</label>  
                </div>  

                <div>  
                    <table margin="center" class="table table-bordered" id="fifthTable" style="border: 2px solid black;">   
                        <thead>  
                            <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                                <td rowspan="2" style="width: 5%; border: 2px solid black;">TT</td>  
                                <td rowspan="2" style="width: 20%; border: 2px solid black;">Nội dung</td>  
                                <td rowspan="2" style="width: 10%; border: 2px solid black;">CĐR của học phần</td>  
                                <td colspan="2" style="width: 5%; border: 2px solid black;">Số giờ</td>  
                                <td rowspan="2" style="width: 3%; border: 2px solid black;">Giờ tự học và giờ học khác</td>  
                                <td rowspan="2" style="width: 5%; border: 2px solid black;">Ghi chú</td>  
                            </tr>  
                            <tr style="font-weight: bold; text-align: center;">  
                                <td style="border: 2px solid black;">LT</td>  
                                <td style="border: 2px solid black;">TH</td>  
                            </tr>   
                        </thead>  
                        <tbody>  


                            @if(isset($contents) && count($contents) > 0)  
                                @foreach($contents as $index => $content)  
                                    <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                                        <td style="text-align: center; border: 2px solid black;">{{ $index + 1 }}</td>   
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="rows[{{ $index }}][content]" readonly>{{ $content }}</textarea>  
                                            </div>  
                                        </td>   
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="rows[{{ $index }}][cdr]" readonly>{{ $cdrs[$index] ?? '' }}</textarea>  
                                            </div>  
                                        </td>  
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <input type="number" class="form-control" name="rows[{{ $index }}][lt]" value="{{ $lts[$index] ?? 0 }}" min="0" readonly/>  
                                        </td>   
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <input type="number" class="form-control" name="rows[{{ $index }}][th]" value="{{ $ths[$index] ?? 0 }}" min="0" readonly/>  
                                        </td>  
                                        <td style="border: 2px solid black;">  
                                            <input type="number" class="form-control" name="rows[{{ $index }}][self_study_hour]" value="{{ $selfStudyHours[$index] ?? 0 }}" min="0" style="height: 50px;" readonly/>  
                                        </td>  
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="rows[{{ $index }}][note]" style="height: 50px;" readonly>{{ $notes[$index] ?? '' }}</textarea>  
                                            </div>  
                                        </td>  
                                    </tr>  
                                @endforeach  
                            @endif                         
                        </tbody>  
                    </table>
                </div>  

       
            



                <br>
                <div class="col mt-12">
                    <label style="font-weight: bold;">6. Phương pháp dạy và học(Teaching and learning methods):</label>
                <div class="col-sm-10 editor-container">  
                    <textarea id="myEditor" class="form-control" name="method" readonly>{{ old('method', $getData->method) }}</textarea>  
                </div>   

                <script>  
                    tinymce.init({  
                        selector: '#myEditor',  
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                        menubar: true,  
                    });  
                </script>
                </div>




                
                <br>
                <div class="col-sm-11">
                    <label style="font-weight: bold;">7. Đánh giá học phần(Course assessment):</label>
                </div>
                <div class="card-body">  
                    <table class="table table-bordered">  
                        <tbody>  
                            <tr style="font-weight: bold;">  
                                <td style="width: 10%; text-align: center; border-top: 2px solid white; 
                                    border-left: 2px solid white; border-right: 2px solid black; border-bottom: 2px solid black; padding: 5px;">
                                </td>                                
                                <td style="width: 20%; text-align: center; border: 2px solid black;"><label>Hình thức đánh giá/thời gian</label></td>  
                                <td style="width: 20%; text-align: center; border: 2px solid black;"><label>Nội dung đánh giá</label></td>   
                                <td style="width: 20%; text-align: center; border: 2px solid black;"><label>CĐR của học phần</label></td>   
                                <td style="width: 20%; text-align: center; border: 2px solid black;"><label>Tiêu chí đánh giá</label></td>   
                                <td style="width: 10%; text-align: center; border: 2px solid black;"><label>Tỷ lệ %</label></td>   
                            </tr>  

                           <tr style="font-weight: bold;">   
                                <td style="width: 10%; text-align: center; vertical-align: middle; border: 2px solid black;" rowspan="2">
                                    <label>Đánh giá quá trình</label>
                                </td>  


                                <?php   
                                    $typeduration = isset($getEva->type_duration) ? $getEva->type_duration : '';   
                                    if (strpos($typeduration, ';') !== false) {  
                                        list($type_duration1, $type_duration2, $type_duration3) = explode(';', $typeduration);  
                                    } else {  
                                        $type_duration1 = $typeduration !== '' ? $typeduration : '';   
                                        $type_duration2 = '';  
                                        $type_duration3 = '';  
                                    }  

                                    // Remove unwanted characters (like quotes)  
                                    $type_duration1 = str_replace('"', '', trim($type_duration1));  
                                    $type_duration2 = str_replace('"', '', trim($type_duration2));  
                                    $type_duration3 = str_replace('"', '', trim($type_duration3));  
                                ?>  



                                <?php   
                                    $contentreview = isset($getEva->content_review) ? $getEva->content_review : '';   
                                    if (strpos($contentreview, ';') !== false) {  
                                        list($content_review1, $content_review2, $content_review3) = explode(';', $contentreview);  
                                    } else {  
                                        $content_review1 = $contentreview !== '' ? $contentreview : '';   
                                        $content_review2 = '';  
                                        $content_review3 = '';  
                                    }  

                                    // Remove unwanted characters (like quotes)  
                                    $content_review1 = str_replace('"', '', trim($content_review1));  
                                    $content_review2 = str_replace('"', '', trim($content_review2));  
                                    $content_review3 = str_replace('"', '', trim($content_review3));  
                                ?> 
                                

                                <?php   
                                    $cdrreview = isset($getEva->cdr_review) ? $getEva->cdr_review : '';   
                                    if (strpos($cdrreview, ';') !== false) {  
                                        list($cdr_review1, $cdr_review2, $cdr_review3) = explode(';', $cdrreview);  
                                    } else {  
                                        $cdr_review1 = $cdrreview !== '' ? $cdrreview : '';   
                                        $cdr_review2 = '';  
                                        $cdr_review3 = '';  
                                    }  

                                    // Remove unwanted characters (like quotes)  
                                    $cdr_review1 = str_replace('"', '', trim($cdr_review1));  
                                    $cdr_review2 = str_replace('"', '', trim($cdr_review2));  
                                    $cdr_review3 = str_replace('"', '', trim($cdr_review3));  
                                ?>




                                <?php   
                                    $Main_criteria = isset($getEva->criteria) ? $getEva->criteria : '';   
                                    if (strpos($Main_criteria, ';') !== false) {  
                                        list($criteria1, $criteria2, $criteria3) = explode(';', $Main_criteria);  
                                    } else {  
                                        $criteria1 = $Main_criteria !== '' ? $Main_criteria : '';   
                                        $criteria2 = '';  
                                        $criteria3 = '';  
                                    }  

                                    // Remove unwanted characters (like quotes)  
                                    $criteria1 = str_replace('"', '', trim($criteria1));  
                                    $criteria2 = str_replace('"', '', trim($criteria2));  
                                    $criteria3 = str_replace('"', '', trim($criteria3));  
                                ?>  
                                

                                <?php   
                                    $Main_percentage = isset($getEva->percentage) ? $getEva->percentage : '';   
                                    if (strpos($Main_percentage, ';') !== false) {  
                                        list($percentage1, $percentage2, $percentage3) = explode(';', $Main_percentage);  
                                    } else {  
                                        $percentage1 = $Main_percentage !== '' ? $Main_percentage : '';   
                                        $percentage2 = '';  
                                        $percentage3 = '';  
                                    }  

                                    // Remove unwanted characters (like quotes)  
                                    $percentage1 = str_replace('"', '', trim($percentage1));  
                                    $percentage2 = str_replace('"', '', trim($percentage2));  
                                    $percentage3 = str_replace('"', '', trim($percentage3));  
                                ?>  


                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration1" readonly>{{ old('type_duration1', trim($type_duration1)) }}</textarea>                                      
                                    </div>   
                                </td>   






                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review1" class="form-control" name="content_review1" readonly>{{ old('content_review1', trim($content_review1)) }}</textarea>  
                                    </div>     
                                </td>  





                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review1" class="form-control" name="cdr_review1" readonly>{{ old('cdr_review1', $cdr_review1) }}</textarea>  
                                    </div>   
                                </td>  








                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria1" class="form-control" name="criteria1" readonly>{{ old('criteria1', trim($criteria1)) }}</textarea>  
                                    </div>   
                                </td>
                                
                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage1" class="form-control" name="percentage1" readonly>{{ old('percentage1', trim($percentage1)) }}</textarea>  
                                    </div>    
                                </td>
                            </tr>  

                            <tr>  

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration2" readonly>{{ old('type_duration2', trim($type_duration2)) }}</textarea>  
                                    </div>   
                                </td>  





                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review2" class="form-control" name="content_review2" readonly>{{ old('content_review2', trim($content_review2)) }}</textarea>  
                                    </div>   
                                </td>  






                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review2" class="form-control" name="cdr_review2" readonly>{{ old('cdr_review2', $cdr_review2) }}</textarea>  
                                    </div>    
                                </td>  







                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria2" class="form-control" name="criteria2" readonly>{{ old('criteria2', trim($criteria2)) }}</textarea>  
                                    </div>   
                                </td>
                                
                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage2" class="form-control" name="percentage2" readonly>{{ old('percentage2', trim($percentage2)) }}</textarea>  
                                    </div>     
                                </td>                                
                            </tr>


                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 10%; text-align: center; vertical-align: middle; border: 2px solid black;">
                                    <label for="CYCK">Đánh giá kết thúc học phần</label>
                                </td> 

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration3" readonly>{{ old('type_duration3', trim($type_duration3)) }}</textarea>  
                                    </div>   
                                </td>  


                                

                                

                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review3" class="form-control" name="content_review3" readonly>{{ old('content_review3', trim($content_review3)) }}</textarea>  
                                    </div>   
                                </td>
                                





                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review3" class="form-control" name="cdr_review3" readonly>{{ old('cdr_review3', $cdr_review3) }}</textarea>  
                                    </div>   
                                </td>





                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria3" class="form-control" name="criteria3" readonly>{{ old('criteria3', trim($criteria3)) }}</textarea>  
                                    </div>   
                                </td>

                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage3" class="form-control" name="percentage3" readonly>{{ old('percentage3', trim($percentage3)) }}</textarea>  
                                    </div>   
                                </td>
                            </tr>
                            
                            <script>  
                                tinymce.init({  
                                    selector: 'textarea.form-control',  
                                    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                    menubar: true,  
                                });  
                            </script> 
                            
                        </tbody>  
                    </table>  
                </div>





                <br>
                <div class="col-sm-12">
                    <label style="font-weight: bold;">8. Các quy định (Course requirements and expectation):</label>
                </div>

                <div class="col-sm-12">
                    <label style="font-weight: bold;">8.1 Quy định về tham dự lớp học</label>
                </div>
                <div class="col-sm-10 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="attendance" readonly>{{ old('attendance', $getRegulation->attendance ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 

                <div class="col-sm-12">
                    <label style="font-weight: bold;">8.2  Quy định về các hành vi trong lớp học</label>
                </div>
                <div class="col-sm-10 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="behavior" readonly>{{ old('behavior', $getRegulation->behavior ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 

                <div class="col-sm-12">
                    <label style="font-weight: bold;">8.3  Quy định về học vụ</label>
                </div>
                <div class="col-sm-10 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="academic" readonly>{{ old('academic', $getRegulation->academic ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>
                                    


                <br>
                <div class="col-sm-12">  
                    <label style="font-weight: bold;">9. Dự kiến danh sách các cán bộ tham gia giảng dạy</label>  
                </div>  
                <div class="col-sm-10 editor-container">   
                    <textarea id="myEditor" class="form-control" name="participant" readonly>{{ old('participant', $getData->participant) }}</textarea>  
                </div>   

                <script>  
                    tinymce.init({  
                        selector: '#myEditor',  
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                        menubar: true,  
                    });  
                </script>
                                    




              </form>

            </div>

            </div>
            
          </div>

        </div>
      </div>
    </section>
    
</body>

    @endsection
</html>


