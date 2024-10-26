    @extends('layouts.app')
    @section('content')
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trang chủ</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">  
    <div class="container-fluid">  
        <div class="row">  

            <section class="col-lg-5 connectedSortable">  
                <div class="row" style="display: none;">  
                    <div class="col-4 text-center">  
                        <div id="sparkline-1"></div>  
                    </div>  
                    <div class="col-4 text-center">  
                        <div id="sparkline-2"></div>  
                    </div>  
                    <div class="col-4 text-center">  
                        <div id="sparkline-3"></div>  
                    </div>  
                </div>  

                <!-- Calendar -->  
                <div class="card bg-gradient-success">  
                    <div class="card-header border-0">  
                        <h3 class="card-title">  
                            <i class="far fa-calendar-alt"></i>  
                            Lịch  
                        </h3>  
                        <div class="card-tools">  
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">  
                                <i class="fas fa-minus"></i>  
                            </button>  
                        </div>  
                    </div>  

                    <div class="card-body pt-0">  
                        <div id="calendar" style="width: 100%"></div>  
                    </div>  
                </div>  
            </section>  

            <section class="content-header col-lg-7">  
                <div class="container-fluid">  
                    <div class="row">  
                        <div class="col-md-12">  
                            <div class="card" style="width: 100%; padding: 20px;">  <!-- Increased width and padding -->  

                                <div class="card-header">  
                                    <h3 class="card-title font-weight-bold">Tìm kiếm</h3>  
                                </div>  

                                <form method="get" action="">  
                                    <div class="card-body">  
                                        <div class="row">   
                                            <div class="form-group col-md-4">  <!-- Adjusted column size -->  
                                                <label>Tên đề cương</label>  
                                                <input type="text" class="form-control" name="doc_name" value="{{ Request::get('doc_name') }}" placeholder="Name">  
                                            </div>    

                                            <div class="form-group col-md-4">  <!-- Adjusted column size -->  
                                                <label>Năm học</label>  
                                                <select class="form-control" name="year">  
                                                    <option value="">Select Year</option>  
                                                    <option value="1" {{ Request::get('year') == 1 ? 'selected' : '' }}>1</option>  
                                                    <option value="2" {{ Request::get('year') == 2 ? 'selected' : '' }}>2</option>  
                                                    <option value="3" {{ Request::get('year') == 3 ? 'selected' : '' }}>3</option>  
                                                    <option value="4" {{ Request::get('year') == 4 ? 'selected' : '' }}>4</option>  
                                                </select>  
                                            </div>  

                                            <div class="form-group col-md-4">  <!-- Adjusted column size -->  
                                                <label>Học kỳ</label>  
                                                <select class="form-control" name="semester">  
                                                    <option value="">Select Semester</option>  
                                                    <option value="1" {{ Request::get('semester') == 1 ? 'selected' : '' }}>1</option>  
                                                    <option value="2" {{ Request::get('semester') == 2 ? 'selected' : '' }}>2</option>  
                                                </select>  
                                            </div>   
                                        </div>  

                                        <div class="row">   
                                            <div class="form-group col-md-3">  
                                                <label>Tên nghành</label>  
                                                <select class="form-control" name="branch">  
                                                    <option value="">Select major</option>  
                                                    <option value="Công nghệ thông tin" {{ Request::get('branch') == 'Công nghệ thông tin' ? 'selected' : '' }}>Công nghệ thông tin</option>  
                                                    <option value="Ngoại ngữ" {{ Request::get('branch') == 'Ngoại ngữ' ? 'selected' : '' }}>Ngoại ngữ</option>  
                                                    <option value="Nông nghiệp - Thủy sản" {{ Request::get('branch') == 'Nông nghiệp - Thủy sản' ? 'selected' : '' }}>Nông nghiệp - Thủy sản</option>  
                                                    <option value="Sư Phạm" {{ Request::get('branch') == 'Sư Phạm' ? 'selected' : '' }}>Sư Phạm</option>  
                                                    <option value="Kinh tế - Luật" {{ Request::get('branch') == 'Kinh tế - Luật' ? 'selected' : '' }}>Kinh tế - Luật</option>  
                                                    <option value="Du lịch" {{ Request::get('branch') == 'Du lịch' ? 'selected' : '' }}>Du lịch</option>  

                                                </select>  
                                            </div>
                                            
                                            <div class="form-group col-md-3">  
                                                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">TÌM KIẾM</button>  
                                                <a href="{{ url('admin/dashbroad') }}" class="btn btn-success" style="margin-top: 30px;">LÀM MỚI</a>  
                                            </div> 
                                        </div>

                                    </div>  
                                </form>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </section>  

        </div>  
    </div>  
</section>

    

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
              @include('_message')


                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title font-weight-bold">Danh sách đề cương</h3>
                  </div>

                <div class="card-body p-0">  
                    <table class="table">  
                        <thead>  
                            <tr>  
                                <th>Thứ tự</th>  
                                <th>Tên đề cương</th>  
                                <th>Năm học</th>  
                                <th>Học kỳ</th>  
                                <th>Ngành</th>  
                                <th></th> 
                            </tr>  
                        </thead>  
                        <tbody>  
                                @foreach ($getData as $index => $value)  
                                <tr>  
                                    <td>{{ $getData->total() - ($getData->currentPage() - 1) * $getData->perPage() - $index }}</td>  <!-- Adjusted order number calculation -->  
                                    <td>{{ $value->doc_name }}</td>  
                                    <td>{{ $value->year }}</td>  
                                    <td>{{ $value->semester }}</td>  
                                    <td>{{ $value->subjects ? $value->subjects->branch : 'N/A' }}</td> <!-- Display branch from subject -->  
                                    <td>  
                                        <a href="{{ url('admin/document/view/'.$value->id) }}" class="btn btn-info">XEM</a>                                   
                                        <a href="{{ url('admin/document/edit/'.$value->id) }}" class="btn btn-primary">TÙY CHỈNH</a> 
                                        <a href="{{ url('admin/document/delete/'.$value->id) }}" class="btn btn-danger">XÓA</a>  
                                        <a href="{{ url('admin/document/print/'. $value->id) }}" class="btn btn-default">IN</a>  
                                    </td>  
                                </tr>  
                            @endforeach  
                        </tbody>  
                    </table>  
                </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
          </div>
        </section>
    <!-- /.content -->
  </div>

  @endsection