    @section('content')  
    @extends('layouts.app')
    <!DOCTYPE html>  
    <html lang="en">  
    <head>  
    <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>Edit </title>  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
        <style>  
            #myEditor {  
                width: 110%; /* Ensures the editor keeps the full container width */  
                height: 200px; /* Increases the height of the editor */  
            }
            .myEditor{
                width: 150%; /* Ensures the editor keeps the full container width */  
                height: 1000px; /* Increases the height of the editor */             
            } 
            textarea {  
                overflow: hidden;  
                height: auto; /* Allow height to be auto initially */  
            }  
            textarea  {  
                display: block;  
                overflow: hidden;  
                resize: none;  
                width: 100%; /* Optional: Set width */    
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
            <h1>Edit Document</h1>
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
                <h3 class="card-title">Edit</h3>
              </div>

                <form action="{{ url('admin/document/edit/' . $getData->id) }}" method="POST">  
                {{ csrf_field() }}

                <div class="form-group row justify-content-center">   
                    <div class="col-sm-12 text-center">  
                        <h3 style="font-weight: bold;">ĐỀ CƯƠNG HỌC PHẦN</h3>  
                        <h3 style="font-weight: bold;">  
                            <input type="text" class="form-control" name="doc_name" value="{{ old('doc_name', $getData->doc_name) }}" placeholder="Enter Label name" style="display: inline-block; width: 50%;"> 
                        </h3>  
                        <h3 style="font-weight: bold;">  
                            MSHP: <input type="number" class="form-control" name="mhp" value="{{ old('mhp', $getData->mhp) }}"  placeholder="Enter MHP" style="display: inline-block; width: 50%;">  
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
                                            <input type="checkbox" id="co_so" name="co_so" value="on" style="margin-right: 5px;" {{ $isCoSoChecked ? 'checked' : '' }}>  
                                            <label for="co_so"></label>   
                                            <br><br>  
                                            <input type="checkbox" id="chuyen_nganh" name="chuyen_nganh" value="on" style="margin-right: 5px;" {{ $isChuyenNganhChecked ? 'checked' : '' }}>  
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
                                        <input class="col-md-4" type="number" class="form-control" id="credit" name="credit_theory_hours" value="{{ old('credit_theory_hours', trim($theoryHours)) }}" min="1">  
                                        <br>  
                                        <label>Thực hành:</label>   
                                        <input class="col-md-4" type="number" class="form-control" id="credit" name="credit_practical_hours" value="{{ old('credit_practical_hours', trim($practicalHours)) }}" min="1">  
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
                                        <input class="col-md-4" type="number" class="form-control" id="teaching_hours" name="teaching_hours_theory_hours" value="{{ old('teaching_hours_theory_hours', trim($teachingTheoryHours)) }}" min="1">  
                                        <br>  
                                        <label>Thực hành:</label>   
                                        <input class="col-md-4" type="number" class="form-control" id="teaching_hours" name="teaching_hours_practical_hours" value="{{ old('teaching_hours_practical_hours', trim($teachingPracticalHours)) }}" min="1">  
                                    </div>  
                                </td>  

                                <td class="equal-width" style="border: 2px solid black;">  
                                    <div>  
                                        <input class="col-md-4" type="number" class="form-control" name="self_study" value="{{ old('self_study', $getInfo->self_study) }}" min="1">  
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
                    <input class="col-md-1" type="text" class="form-control" name="degree" value="{{ old('degree', $getSub->degree ?? '') }}">
                  </div>
                  

                <div class="form-group row">  
                    <label class="col-md-1 col-form-label">Ngành:</label>  
                    <div class="col-md-3">  
                        <select class="form-control custom-select" name="branch">  
                            <option value="Công nghệ thông tin" {{ old('branch', $getSub->branch) == 'Công nghệ thông tin' ? 'selected' : '' }}>Công nghệ thông tin</option>  
                            <option value="Nông nghiệp - Thủy sản" {{ old('branch', $getSub->branch) == 'Nông nghiệp - Thủy sản' ? 'selected' : '' }}>Nông nghiệp - Thủy sản</option>  
                            <option value="Ngoại ngữ" {{ old('branch', $getSub->branch) == 'Ngoại ngữ' ? 'selected' : '' }}>Ngoại ngữ</option>  
                            <option value="Sư Phạm" {{ old('branch', $getSub->branch) == 'Sư Phạm' ? 'selected' : '' }}>Sư phạm</option>  
                            <option value="Kinh tế - Luật" {{ old('branch', $getSub->branch) == 'Kinh tế - Luật' ? 'selected' : '' }}>Kinh tế - Luật</option>  
                            <option value="Du lịch" {{ old('branch', $getSub->branch) == 'Du lịch' ? 'selected' : '' }}>Du lịch</option>  
                        </select>  
                    </div>  
                </div>
                
                  <div class="form-group">
                    <label>Chuyên ngành:
                    <input class="col-md-6" type="text" class="form-control" name="major" value="{{ old('major', $getSub->major ?? '') }}">(nếu có)
                    </label>
                  </div>


                  <div class="form-group"> 
                    <label>Năm thứ:</label>  
                    <select class="col-md-1 form-control custom-select" name="year">  
                        <option value="1" {{ old('year', $getData->year) == 1 ? 'selected' : '' }}>1</option>  
                        <option value="2" {{ old('year', $getData->year) == 2 ? 'selected' : '' }}>2</option>  
                        <option value="3" {{ old('year', $getData->year) == 3 ? 'selected' : '' }}>3</option>  
                        <option value="4" {{ old('year', $getData->year) == 4 ? 'selected' : '' }}>4</option>  
                    </select>  

                    <label>Học kỳ:</label>  
                    <select class="col-md-1 form-control custom-select" name="semester">  
                        <option value="1" {{ old('semester', $getData->semester) == 1 ? 'selected' : '' }}>1</option>  
                        <option value="2" {{ old('semester', $getData->semester) == 2 ? 'selected' : '' }}>2</option>  
                    </select>
                  </div>

                </div>

            
                <div class="col-sm-6">
                    <label style="font-weight: bold;">Điều kiện tham gia học phần:</label>
                </div>

                <div class="card-body">  
                    <table class="table table-bordered">  
                        <tbody>  
                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HPTQ">Học phần tiên quyết</label></td>   
                                <td style="width: 80%; border: 2px solid black;"><input class="col-md-8 form-control" type="text" name="prerequisite" value="{{ old('prerequisite', $getRequi->prerequisite ?? '') }}"></td>   
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HPSH">Học phần song hành</label></td>  
                                <td style="width: 80%; border: 2px solid black;"><input class="col-md-8 form-control" type="text" name="corequisite" value="{{ old('corequisite', $getRequi->corequisite ?? '') }}"></td>    
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="CYCK">Các yêu cầu khác</label></td>   
                                <td style="border: 2px solid black;">
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="other_requirements" style="overflow: hidden" onkeyup="this.style.height='24px'; this.style.height = this.scrollHeight + 12 + 'px';">{{ old('other_requirements', $getRequi->other_requirements ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: 'myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
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
                                        <textarea id="myEditor" class="form-control" name="primary_reference" style="overflow: hidden" onkeyup="this.style.height='24px'; this.style.height = this.scrollHeight + 12 + 'px';">{{ old('primary_reference', $getRefe->primary_reference ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
                                </td>   
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="TLTK">Tài liệu tham khảo thêm</label></td>  
                                <td>
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="additional_reference" style="overflow: hidden" onkeyup="this.style.height='24px'; this.style.height = this.scrollHeight + 12 + 'px';">{{ old('additional_reference', $getRefe->additional_reference ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
                                </td>    
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HLK">Các loại học liệu khác</label></td>   
                                <td>
                                    <div class="col-sm-11 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="other_reference" style="overflow: hidden" onkeyup="this.style.height='24px'; this.style.height = this.scrollHeight + 12 + 'px';">{{ old('other_reference', $getRefe->other_reference ?? '') }}</textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
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
                    <textarea id="myEditor" class="form-control" name="description" style="overflow: hidden" onkeyup="this.style.height='24px'; this.style.height = this.scrollHeight + 12 + 'px';">{{ old('description', $getData->description) }}</textarea>  
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
                                <button type="button" onclick="addRowKnowledge()">Thêm hàng</button>  
                                <button type="button" onclick="removeRowKnowledge()">Xóa hàng</button>  
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
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][stt]">{{ trim($sttValue) }}</textarea>   
                                            </div>  
                                        </td>   
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][learning_outcomes]">{{ trim($knowledgeLOArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>  
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][outcomes]">{{ trim($knowledgeOArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>   
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][competency_level]">{{ trim($knowledgeCLArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>  
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="knowledge[{{ $knowledgeIndex }}][tua]">{{ trim($knowledgeTUAArray[$key] ?? '') }}</textarea>  
                                            </div>  
                                        </td>   
                                    </tr>   
                                @endforeach  
                        @endif  
                        <tr id="knowledgePlaceholder"></tr>  



                        <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                            <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                ◆ Về kỹ năng  
                                <button type="button" onclick="addRowSkills()">Thêm hàng</button>  
                                <button type="button" onclick="removeRowSkills()">Xóa hàng</button>  
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
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][stt]">{{ trim($sttValue) }}</textarea>   
                                        </div>  
                                    </td>   
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][learning_outcomes]">{{ trim($skillLOArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][outcomes]">{{ trim($skillOArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][competency_level]">{{ trim($skillCLArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="skill[{{ $skillsIndex }}][tua]">{{ trim($skillTUAArray[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                </tr>   
                            @endforeach  
                        @endif  
                        <tr id="skillsPlaceholder"></tr>   



                        
                        <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                            <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                ◆ Về thái độ  
                                <button type="button" onclick="addRowAttitude()">Thêm hàng</button>  
                                <button type="button" onclick="removeRowAttitude()">Xóa hàng</button>  
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
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][stt]">{{ trim($sttValue) }}</textarea>   
                                        </div>  
                                    </td>   
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][learning_outcomes]">{{ trim($attitudelearningOutcomesValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][outcomes]">{{ trim($attitudeoutcomesValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                    <td style="text-align: center; border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][competency_level]">{{ trim($attitudecompetencyLevelsValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>  
                                    <td style="border: 2px solid black;">  
                                        <div class="col-sm-8 editor-container">  
                                            <textarea class="form-control myEditor" name="attitude[{{ $attitudeIndex }}][tua]">{{ trim($attitudetuaValues[$key] ?? '') }}</textarea>  
                                        </div>  
                                    </td>   
                                </tr>   
                            @endforeach  
                        @endif  
                        <tr id="attitudePlaceholder"></tr>  
                        
                        
                    </table>  
                </div>  

                <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.3/tinymce.min.js"></script>  
                <script>  
 
                    let knowledgeRowCount = {{ isset($knowledgeIndex) ? count($knowledgeSttArray) : 0 }}; // Initialize row count for the fifth table  
                    let skillsRowCount = {{ isset($skillsIndex) ? count($skillsSttArray) : 0 }}; // Initialize row count for the fifth table  
                    let attitudeRowCount = {{ isset($attitudeIndex) ? count($attitudeSttArray) : 0 }}; // Initialize row count for the fifth table  

                    function initializeTinyMCE() {  
                        tinymce.init({  
                            selector: '.myEditor',  
                            menubar: false,  
                            toolbar: 'undo redo | bold italic | bullist numlist | link image',  
                            plugins: 'lists link image',  
                            setup: function(editor) {  
                                editor.on('init', function() {  
                                    editor.setContent(''); // Clear default content  
                                });  
                            }  
                        });  
                    }  

                    function addRowKnowledge() {  
                        var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];  
                        var placeholder = document.getElementById("knowledgePlaceholder");  

                        var newRow = table.insertRow(placeholder.rowIndex);  
                        knowledgeRowCount++;  
                        
                        var cell1 = newRow.insertCell(0);  
                        var cell2 = newRow.insertCell(1);  
                        var cell3 = newRow.insertCell(2);  
                        var cell4 = newRow.insertCell(3);  
                        var cell5 = newRow.insertCell(4);  

                        [cell1, cell2, cell3, cell4, cell5].forEach(cell => cell.style.border = "2px solid black");  

                        cell1.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="knowledge[${knowledgeRowCount}][stt]"></textarea></div>`;  
                        cell2.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="knowledge[${knowledgeRowCount}][learning_outcomes]"></textarea></div>`;  
                        cell3.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="knowledge[${knowledgeRowCount}][outcomes]"></textarea></div>`;  
                        cell4.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="knowledge[${knowledgeRowCount}][competency_level]"></textarea></div>`;  
                        cell5.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="knowledge[${knowledgeRowCount}][tua]"></textarea></div>`;  

                        initializeTinyMCE();  
                    }  

                    function removeRowKnowledge() {  
                        var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];  
                        var placeholder = document.getElementById("knowledgePlaceholder");  

                        if (knowledgeRowCount > 0) {  
                            const rowToRemove = placeholder.rowIndex - 1;  
                            table.deleteRow(rowToRemove);  
                            knowledgeRowCount--;  
                        }  
                    }  

                    function addRowSkills() {  
                        var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];  
                        var placeholder = document.getElementById("skillsPlaceholder");  

                        var newRow = table.insertRow(placeholder.rowIndex);  
                        skillsRowCount++;  
                        
                        var cell1 = newRow.insertCell(0);  
                        var cell2 = newRow.insertCell(1);  
                        var cell3 = newRow.insertCell(2);  
                        var cell4 = newRow.insertCell(3);  
                        var cell5 = newRow.insertCell(4);  

                        [cell1, cell2, cell3, cell4, cell5].forEach(cell => cell.style.border = "2px solid black");  

                        cell1.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="skill[${skillsRowCount}][stt]"></textarea></div>`;  
                        cell2.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="skill[${skillsRowCount}][learning_outcomes]"></textarea></div>`;  
                        cell3.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="skill[${skillsRowCount}][outcomes]"></textarea></div>`;  
                        cell4.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="skill[${skillsRowCount}][competency_level]"></textarea></div>`;  
                        cell5.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="skill[${skillsRowCount}][tua]"></textarea></div>`;  

                        initializeTinyMCE();  
                    }  

                    function removeRowSkills() {  
                        var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];  
                        var placeholder = document.getElementById("skillsPlaceholder");  

                        if (skillsRowCount > 0) {  
                            const rowToRemove = placeholder.rowIndex - 1;  
                            table.deleteRow(rowToRemove);  
                            skillsRowCount--;  
                        }  
                    }  

                    function addRowAttitude() {  
                        var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];  
                        var placeholder = document.getElementById("attitudePlaceholder");  

                        var newRow = table.insertRow(placeholder.rowIndex);  
                        attitudeRowCount++;  
                        
                        var cell1 = newRow.insertCell(0);  
                        var cell2 = newRow.insertCell(1);  
                        var cell3 = newRow.insertCell(2);  
                        var cell4 = newRow.insertCell(3);  
                        var cell5 = newRow.insertCell(4);  

                        [cell1, cell2, cell3, cell4, cell5].forEach(cell => cell.style.border = "2px solid black");  

                        cell1.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="attitude[${attitudeRowCount}][stt]"></textarea></div>`;  
                        cell2.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="attitude[${attitudeRowCount}][learning_outcomes]"></textarea></div>`;  
                        cell3.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="attitude[${attitudeRowCount}][outcomes]"></textarea></div>`;  
                        cell4.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="attitude[${attitudeRowCount}][competency_level]"></textarea></div>`;  
                        cell5.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="attitude[${attitudeRowCount}][tua]"></textarea></div>`;  

                        initializeTinyMCE();  
                    }  

                    function removeRowAttitude() {  
                        var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];  
                        var placeholder = document.getElementById("attitudePlaceholder");  

                        if (attitudeRowCount > 0) {  
                            const rowToRemove = placeholder.rowIndex - 1;  
                            table.deleteRow(rowToRemove);  
                            attitudeRowCount--;  
                        }  
                    }  
                </script>    

                





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
                                                <textarea class="form-control myEditor" name="rows[{{ $index }}][content]">{{ $content }}</textarea>  
                                            </div>  
                                        </td>   
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="rows[{{ $index }}][cdr]">{{ $cdrs[$index] ?? '' }}</textarea>  
                                            </div>  
                                        </td>  
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <input type="number" class="form-control" name="rows[{{ $index }}][lt]" value="{{ $lts[$index] ?? 0 }}" min="0" />  
                                        </td>   
                                        <td style="text-align: center; border: 2px solid black;">  
                                            <input type="number" class="form-control" name="rows[{{ $index }}][th]" value="{{ $ths[$index] ?? 0 }}" min="0" />  
                                        </td>  
                                        <td style="border: 2px solid black;">  
                                            <input type="number" class="form-control" name="rows[{{ $index }}][self_study_hour]" value="{{ $selfStudyHours[$index] ?? 0 }}" min="0" style="height: 50px;" />  
                                        </td>  
                                        <td style="border: 2px solid black;">  
                                            <div class="col-sm-8 editor-container">  
                                                <textarea class="form-control myEditor" name="rows[{{ $index }}][note]" style="height: 50px;">{{ $notes[$index] ?? '' }}</textarea>  
                                            </div>  
                                        </td>  
                                    </tr>  
                                @endforeach  
                            @endif  
                        </tbody>       
                    </table>  

                    <div style="margin-top: 10px;">  
                        <button type="button" onclick="addRowFifth()">Thêm hàng</button>  
                        <button type="button" onclick="removeRowFifth()">Xóa hàng</button>   
                    </div>  
                </div>  

                <script>  
                    let fifthRowCount = {{ isset($contents) ? count($contents) : 0 }}; // Initialize row count for the fifth table  

                    function addRowFifth() {  
                        var table = document.getElementById("fifthTable").getElementsByTagName('tbody')[0];  
                        var newRow = table.insertRow();  
                        fifthRowCount++;  

                        var cell1 = newRow.insertCell(0); // TT  
                        var cell2 = newRow.insertCell(1); // Nội dung  
                        var cell3 = newRow.insertCell(2); // CĐR của học phần  
                        var cell5 = newRow.insertCell(3); // LT  
                        var cell6 = newRow.insertCell(4); // TH  
                        var cell7 = newRow.insertCell(5); // Giờ tự học  
                        var cell8 = newRow.insertCell(6); // Ghi chú  

                        [cell1, cell2, cell3, cell5, cell6, cell7, cell8].forEach(cell => cell.style.border = "2px solid black");  

                        cell1.innerText = fifthRowCount;  
                        cell1.style.textAlign = "center";  

                        cell2.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="rows[${fifthRowCount}][content]" style="height: 50px;"></textarea></div>`;  
                        cell3.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="rows[${fifthRowCount}][cdr]" style="height: 50px;"></textarea></div>`;  
                        cell5.innerHTML = `<input type="number" class="form-control" name="rows[${fifthRowCount}][lt]" min="0" />`;  
                        cell6.innerHTML = `<input type="number" class="form-control" name="rows[${fifthRowCount}][th]" min="0" />`;  
                        cell7.innerHTML = `<input type="number" class="form-control" name="rows[${fifthRowCount}][self_study_hour]" min="0" style="height: 50px;" />`;  
                        cell8.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="rows[${fifthRowCount}][note]" style="height: 50px;"></textarea></div>`;  

                        tinymce.init({  
                            selector: '.myEditor',  
                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                            menubar: true,  
                        });  
                    }  

                    function removeRowFifth() {  
                        var table = document.getElementById("fifthTable").getElementsByTagName('tbody')[0];  
                        if (fifthRowCount > 0) {  
                            table.deleteRow(table.rows.length - 1); // Remove the last row  
                            fifthRowCount--; // Decrement the row count  
                        }  
                    }  
                </script>





                <br>
                <div class="col mt-12">
                    <label style="font-weight: bold;">6. Phương pháp dạy và học(Teaching and learning methods):</label>
                <div class="col-sm-10 editor-container">  
                    <textarea id="myEditor" class="form-control" name="method">{{ old('method', $getData->method) }}</textarea>  
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
                                        <textarea id="type_duration" class="form-control" name="type_duration1">{{ old('type_duration1', trim($type_duration1)) }}</textarea>                                      
                                    </div>   
                                </td>   






                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review1" class="form-control" name="content_review1">{{ old('content_review1', trim($content_review1)) }}</textarea>  
                                    </div>     
                                </td>  





                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review1" class="form-control" name="cdr_review1">{{ old('cdr_review1', $cdr_review1) }}</textarea>  
                                    </div>   
                                </td>  








                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria1" class="form-control" name="criteria1">{{ old('criteria1', trim($criteria1)) }}</textarea>  
                                    </div>   
                                </td>
                                
                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage1" class="form-control" name="percentage1">{{ old('percentage1', trim($percentage1)) }}</textarea>  
                                    </div>    
                                </td>
                            </tr>  

                            <tr>  

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration2">{{ old('type_duration2', trim($type_duration2)) }}</textarea>  
                                    </div>   
                                </td>  





                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review2" class="form-control" name="content_review2">{{ old('content_review2', trim($content_review2)) }}</textarea>  
                                    </div>   
                                </td>  






                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review2" class="form-control" name="cdr_review2">{{ old('cdr_review2', $cdr_review2) }}</textarea>  
                                    </div>    
                                </td>  







                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria2" class="form-control" name="criteria2">{{ old('criteria2', trim($criteria2)) }}</textarea>  
                                    </div>   
                                </td>
                                
                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage2" class="form-control" name="percentage2">{{ old('percentage2', trim($percentage2)) }}</textarea>  
                                    </div>     
                                </td>                                
                            </tr>


                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 10%; text-align: center; vertical-align: middle; border: 2px solid black;">
                                    <label for="CYCK">Đánh giá kết thúc học phần</label>
                                </td> 

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration3">{{ old('type_duration3', trim($type_duration3)) }}</textarea>  
                                    </div>   
                                </td>  


                                

                                

                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review3" class="form-control" name="content_review3">{{ old('content_review3', trim($content_review3)) }}</textarea>  
                                    </div>   
                                </td>
                                





                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review3" class="form-control" name="cdr_review3">{{ old('cdr_review3', $cdr_review3) }}</textarea>  
                                    </div>   
                                </td>





                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria3" class="form-control" name="criteria3">{{ old('criteria3', trim($criteria3)) }}</textarea>  
                                    </div>   
                                </td>

                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage3" class="form-control" name="percentage3">{{ old('percentage3', trim($percentage3)) }}</textarea>  
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
                                        <textarea id="myEditor" class="form-control" name="attendance">{{ old('attendance', $getRegulation->attendance ?? '') }}</textarea>  
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
                                        <textarea id="myEditor" class="form-control" name="behavior">{{ old('behavior', $getRegulation->behavior ?? '') }}</textarea>  
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
                                        <textarea id="myEditor" class="form-control" name="academic">{{ old('academic', $getRegulation->academic ?? '') }}</textarea>  
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
                    <textarea id="myEditor" class="form-control" name="participant">{{ old('participant', $getData->participant) }}</textarea>  
                </div>   

                <script>  
                    tinymce.init({  
                        selector: '#myEditor',  
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                        menubar: true,  
                    });  
                </script>
                                    


                <div class="card-footer">
                  <button type="submit" id="saveButton" class="btn btn-primary">Update</button>
                </div>

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


