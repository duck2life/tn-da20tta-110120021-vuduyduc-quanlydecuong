    @extends('layouts.app')
    @section('content')  
    <!DOCTYPE html>  
    <html lang="en">  
    <head>  
    <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>WYSIWYG Editor</title>  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
        <style>  
            #myEditor {  
                width: 105%; /* Ensures the editor keeps the full container width */  
                height: 100px; /* Increases the height of the editor */  
            }
            .myEditor{
                width: 150%; /* Ensures the editor keeps the full container width */  
                height: 1000px; /* Increases the height of the editor */             
            }  
            .form-label {  
                margin-bottom: 0.5rem; /* Adjusts margin for better alignment */  
                display: block; /* Ensures labels are block elements */  
            }
            .equal-width {  
                text-align: center;  
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
            <h1>Add new Document</h1>
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
                <h3 class="card-title">Add</h3>
              </div>

              <form action="{{ url('teacher/document/add') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group row justify-content-center">   
                    <div class="col-sm-12 text-center">  
                        <h3 style="font-weight: bold;">ĐỀ CƯƠNG HỌC PHẦN</h3>  
                        <h3 style="font-weight: bold;">  
                            <input type="text" class="form-control" name="doc_name" placeholder="Enter Label name" style="display: inline-block; width: 50%;"> 
                        </h3>  
                        <h3 style="font-weight: bold;">  
                            MSHP: <input type="number" class="form-control" name="mhp"  placeholder="Enter MHP" style="display: inline-block; width: 50%;">  
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
                                <td style="border: 2px solid black;"><label for="LHP">Loai học phần</label></td>   
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
                                            <input type="checkbox" id="course_type" name="co_so" style="margin-right: 5px;"
                                            ><label for="co-so"></label>   
                                            <br><br>  
                                            <input type="checkbox" id="course_type" name="chuyen_nganh" style="margin-right: 5px;">
                                            <label for="chuyen-nganh"></label>  
                                        </div>  
                                    </div>  
                                </td>   

                                <script>  
                                    document.getElementById('saveButton').addEventListener('click', function() {  
                                        const courseTypes = [];  
                                        
                                        if (document.getElementById('co_so').checked) {  
                                            courseTypes.push('co-so');  
                                        }  
                                        if (document.getElementById('chuyen_nganh').checked) {  
                                            courseTypes.push('chuyen-nganh');  
                                        }  

                                        if (courseTypes.length === 0) {  
                                            alert('Please select at least one option: Cơ sở or Chuyên ngành.');  
                                            return; 
                                        }  

                                        fetch('/course-type', {  
                                            method: 'POST',  
                                            headers: {  
                                                'Content-Type': 'application/json',  
                                            },  
                                            body: JSON.stringify({ course_type: courseTypes }),  
                                        })  
                                        .then(response => response.json())  
                                        .then(data => {  
                                            console.log('Success:', data);  
                                        })  
                                        .catch((error) => {  
                                            console.error('Error:', error);  
                                        });  
                                    });  
                                </script> 



                                <td class="equal-width" style="border: 2px solid black;">   
                                    <div>  
                                        <label>Lý thuyết:</label>  
                                        <input class="col-md-4" type="number" class="form-control" id="credit" name="credit_theory_hours" min="1" >  
                                        <br>  
                                        <label>Thực hành:</label>   
                                        <input class="col-md-4" type="number" class="form-control" id="credit" name="credit_practical_hours" min="1" >  
                                    </div>   
                                </td>  

                                <td class="equal-width" style="border: 2px solid black;">  
                                    <div>  
                                        <label>Lý thuyết:</label>  
                                        <input class="col-md-4" type="number" class="form-control" id="teaching_hours"  name="teaching_hours_theory_hours" min="1" >  
                                        <br>  
                                        <label>Thực hành:</label>   
                                        <input class="col-md-4" type="number" class="form-control" id="teaching_hours"  name="teaching_hours_practical_hours" min="1" >  
                                    </div>  
                                </td>  

                                <td class="equal-width" style="border: 2px solid black;">  
                                    <div>  
                                        <input class="col-md-4" type="number" class="form-control" name="self_study" min="1" >  
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
                    <input class="col-md-1" type="text" class="form-control" name="degree" >
                  </div>

                    <div class="form-group row">  
                        <label class="col-md-1 col-form-label">Ngành:</label>  
                        <div class="col-md-3">  
                            <select class="form-control" name="branch" >  
                                <option value="Công nghệ thông tin">Công nghệ thông tin</option>  
                                <option value="Nông nghiệp - Thủy sản">Nông nghiệp - Thủy sản</option>  
                                <option value="Ngoại ngữ">Ngoại ngữ</option>  
                                <option value="Sư Phạm">Sư phạm</option>  
                                <option value="Kinh tế - Luật">Kinh tế - Luật</option>  
                                <option value="Du lịch">Du lịch</option>  
                            </select>  
                        </div>  
                    </div>
                    
                  <div class="form-group">
                    <label>Chuyên ngành:
                    <input class="col-md-6" type="text" class="form-control" name="major" >(nếu có)
                    </label>
                  </div>
                  <div class="form-group"> 

                    <label>Năm thứ:</label>  
                    <select class="col-md-1 form-control" name="year" >  
                        <option value="1">1</option>  
                        <option value="2">2</option>  
                        <option value="3">3</option>  
                        <option value="4">4</option>  
                    </select>

                    <label>Học kỳ:</label>  
                    <select class="col-md-1 form-control" name="semester" >  
                        <option value="1">1</option>  
                        <option value="2">2</option>  
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
                                <td style="width: 80%; border: 2px solid black;"><input class="col-md-8 form-control" type="text"  name="prerequisite"></td>   
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="HPSH">Học phần song hành</label></td>  
                                <td style="width: 80%; border: 2px solid black;"><input class="col-md-8 form-control" type="text"  name="corequisite"></td>    
                            </tr>   

                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 20%; text-align: LEFT; border: 2px solid black;"><label for="CYCK">Các yêu cầu khác</label></td>   
                                <td style="border: 2px solid black;">
                                    <div class="col-sm-8 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="other_requirements" ></textarea>  
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
                                    <div class="col-sm-8 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="primary_reference" ></textarea>  
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
                                    <div class="col-sm-8 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="additional_reference" ></textarea>  
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
                                    <div class="col-sm-8 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="other_reference" ></textarea>  
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

                <div class="col-sm-8 editor-container">  
                    <textarea id="myEditor" class="form-control" name="description" ></textarea>  
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
                        <tbody>  
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
                            <tr id="knowledgePlaceholder"></tr>  

                            <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                                <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                    ◆ Về kỹ năng  
                                    <button type="button" onclick="addRowSkills()">Thêm hàng</button>  
                                    <button type="button" onclick="removeRowSkills()">Xóa hàng</button>  
                                </td>  
                            </tr>   
                            <tr id="skillsPlaceholder"></tr>  

                            <tr style="font-weight: bold; text-align: left; border: 2px solid black;">  
                                <td colspan="5" style="border: 2px solid black; text-align: left; padding-left: 10px;">  
                                    ◆ Về thái độ  
                                    <button type="button" onclick="addRowAttitude()">Thêm hàng</button>  
                                    <button type="button" onclick="removeRowAttitude()">Xóa hàng</button>  
                                </td>  
                            </tr>   
                            <tr id="attitudePlaceholder"></tr>  
                        </tbody>  
                    </table>  
                </div>  

                <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.3/tinymce.min.js"></script>  

                <script>  
                    let knowledgeRowCount = 0;   
                    let skillsRowCount = 0;   
                    let attitudeRowCount = 0;   

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
                <table class="table table-bordered" id="fifthTable" style="border: 2px solid black;">  
                    <tbody>  
                        <tr style="font-weight: bold; text-align: center; border: 2px solid black;">  
                            <td rowspan="2" style="width: 5%; border: 2px solid black;">TT</td>  
                            <td rowspan="2" style="width: 30%; border: 2px solid black;">Nội dung</td>  
                            <td rowspan="2" style="width: 10%; border: 2px solid black;">CĐR của học phần</td>  
                            <td colspan="2" style="width: 10%; border: 2px solid black;">Số giờ</td>  
                            <td rowspan="2" style="width: 5%; border: 2px solid black;">Giờ tự học và giờ học khác</td>  
                            <td rowspan="2" style="width: 5%; border: 2px solid black;">Ghi chú</td>  
                        </tr>  
                        <tr style="font-weight: bold; text-align: center;">  
                            <td style="border: 2px solid black;">LT</td>  
                            <td style="border: 2px solid black;">TH</td>  
                        </tr>  
                    </tbody>  
                </table>  
                <button type="button" onclick="addRowFifth()">Thêm hàng</button>  
                <button type="button" onclick="removeRowFifth()">Xóa hàng</button> <!-- New button for removing rows -->  
            </div>  

            <script>  
                let fifthRowCount = {{ $fifthRowCount ?? 0 }}; // Initialize row count for the fifth table  

                function addRowFifth() {  
                    // Get the target table body (fifth table)  
                    var table = document.getElementById("fifthTable").getElementsByTagName('tbody')[0];  

                    // Create a new row  
                    var newRow = table.insertRow();  
                    fifthRowCount++; // Increment row count  

                    // Create and populate cells for the newly added row  
                    var cell1 = newRow.insertCell(0); // TT  
                    var cell2 = newRow.insertCell(1); // Nội dung  
                    var cell3 = newRow.insertCell(2); // CĐR của học phần  
                    var cell4 = newRow.insertCell(3); // LT  
                    var cell5 = newRow.insertCell(4); // TH  
                    var cell6 = newRow.insertCell(5); // Giờ tự học và giờ học khác  
                    var cell7 = newRow.insertCell(6); // Ghi chú  

                    // Set border style for new cells  
                    [cell1, cell2, cell3, cell4, cell5, cell6, cell7].forEach(cell => cell.style.border = "2px solid black");  

                    // Populate cells with effective input elements  
                    cell1.innerText = fifthRowCount; // Auto-fill TT with the row number  
                    cell1.style.textAlign = "center"; // Center the text in cell1  

                    // Add textareas for input fields  
                    cell2.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="rows[${fifthRowCount}][content]"></textarea></div>`; // Nội dung  
                    cell3.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="rows[${fifthRowCount}][cdr]"></textarea></div>`; // CĐR của học phần  
                    cell4.innerHTML = `<input type="number" class="form-control" name="rows[${fifthRowCount}][lt]" min="0" />`; // LT  
                    cell4.style.textAlign = "center"; // Center the content in cell4  
                    cell5.innerHTML = `<input type="number" class="form-control" name="rows[${fifthRowCount}][th]" min="0" />`; // TH  
                    cell5.style.textAlign = "center"; // Center the content in cell5  
                    cell6.innerHTML = `<input type="number" class="form-control" name="rows[${fifthRowCount}][self_study_hour]" min="0" />`; // Giờ tự học  
                    cell7.innerHTML = `<div class="col-sm-8 editor-container"><textarea class="form-control myEditor" name="rows[${fifthRowCount}][note]"></textarea></div>`; // Ghi chú  

                    // Initialize TinyMCE for the added textareas  
                    tinymce.init({  
                        selector: '.myEditor',  
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                        menubar: true,  
                        setup: function (editor) {  
                            editor.on('init', function () {  
                                // Optional: Add additional event listeners or initialization logic  
                            });  
                        }  
                    });  
                } 

                function removeRowFifth() {  
                    // Get the target table body (fifth table)  
                    var table = document.getElementById("fifthTable").getElementsByTagName('tbody')[0];  
                    
                    // Check if there's at least one row to remove  
                    if (fifthRowCount > 0) {  
                        table.deleteRow(table.rows.length - 1); // Remove the last row  
                        fifthRowCount--; // Decrement row count  
                    }  
                }  
            </script>  







            

                <br>
                <div class="col mt-12">
                    <label style="font-weight: bold;">6. Phương pháp dạy và học(Teaching and learning methods):</label>
                 <div class="col-sm-8 editor-container">  
                    <textarea id="myEditor" class="form-control" name="method" ></textarea>  
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

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration1"></textarea>  
                                    </div>   
                                    
                                    <script>  
                                        tinymce.init({  
                                            selector: '#type_duration',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>  

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review" class="form-control" name="content_review1"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#content_review',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>  

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review" class="form-control" name="cdr_review1"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#cdr_review',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>  

                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria" class="form-control" name="criteria1"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#criteria',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>
                                
                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage" class="form-control" name="percentage1"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#percentage',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>
                            </tr>  

                            <tr>  
                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration2"></textarea>  
                                    </div>   
                                
                                    <script>  
                                        tinymce.init({  
                                            selector: '#type_duration',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>  

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review" class="form-control" name="content_review2"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#content_review',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>  

                                <td style="border: 2px solid black;">  
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review" class="form-control" name="cdr_review2"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#cdr_review',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>  

                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria" class="form-control" name="criteria2"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#criteria',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>
                                
                                <td style="border: 2px solid black;">   
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage" class="form-control" name="percentage2"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#percentage',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script>   
                                </td>                                
                            </tr>


                            <tr style="font-weight: bold; border: 2px solid black;">  
                                <td style="width: 10%; text-align: center; vertical-align: middle; border: 2px solid black;">
                                    <label for="CYCK">Đánh giá kết thúc học phần</label>
                                </td>   

                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="type_duration" class="form-control" name="type_duration3"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#type_duration',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
                                </td>

                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="content_review" class="form-control" name="content_review3"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#content_review',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
                                </td>
                                
                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="cdr_review" class="form-control" name="cdr_review3"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#cdr_review',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
                                </td>
                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="criteria" class="form-control" name="criteria3"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#criteria',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 
                                </td>
                                <td style="border: 2px solid black;">
                                    <div class="col-sm-12 editor-container">  
                                        <textarea id="percentage" class="form-control" name="percentage3"></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#percentage',  
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
                <div class="col-sm-12">
                    <label style="font-weight: bold;">8. Các quy định (Course requirements and expectation):</label>
                </div>

                <div class="col-sm-12">
                    <label style="font-weight: bold;">8.1 Quy định về tham dự lớp học</label>
                </div>
                <div class="col-sm-10 editor-container">  
                                        <textarea id="myEditor" class="form-control" name="attendance" ></textarea>  
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
                                        <textarea id="myEditor" class="form-control" name="behavior" ></textarea>  
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
                                        <textarea id="myEditor" class="form-control" name="academic" ></textarea>  
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
                                        <textarea id="myEditor" class="form-control" name="participant" ></textarea>  
                                    </div>   

                                    <script>  
                                        tinymce.init({  
                                            selector: '#myEditor',  
                                            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',  
                                            menubar: true,  
                                        });  
                                    </script> 






                 <div class="card-body">  
                    <table class="table table-bordered" style="border: none; display: none">  
                        <tbody>  
                            <tr style="font-weight: bold;">  
                                <td style="width: 33%; text-align: center; vertical-align: middle; border: none; font-size: 20px;">
                                    <label>TRƯỞNG KHOA<br>(Ký và ghi rõ họ tên)</label>
                                </td>   
                                <td style="width: 33%; text-align: center; vertical-align: middle; border: none; font-size: 20px;">
                                    <label>TRƯỞNG BỘ MÔN<br>(Ký và ghi rõ họ tên)</label>
                                </td>
                                <td style="width: 33%; text-align: center; border: none; font-size: 20px;">
                                    <label>GIẢNG VIÊN<br>BIÊN SOẠN<br>(Ký và ghi rõ họ tên)</label>
                                </td> 
                            </tr>    

                            <tr style="font-weight: bold;">  
                                <td style="height: 130px; border: none;"></td>   
                            </tr> 


                            <tr style="font-weight: bold;"> 
                                <td style="width: 33%; text-align: center; vertical-align: middle; border: none; font-size: 20px;"></td>   
                                <td style="width: 33%; text-align: center; vertical-align: middle; border: none; font-size: 20px;"></td>   
                                <td style="width: 33%; text-align: center; vertical-align: middle; border: none; font-size: 20px;">
                                    <label>GIẢNG VIÊN<br>PHẢN BIỆN<br>(Ký và ghi rõ họ tên)</label>
                                </td>   
                            </tr>
                        </tbody>
                    </table>
                </div>








                <div class="card-footer">
                  <button type="submit" id="saveButton" class="btn btn-primary">Submit</button>
                </div>

              </form>

            </div>

            </div>
            
          </div>

        </div>
      </div>
    </section>

  @endsection
</body>
</html>
