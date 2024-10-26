    @extends('layouts.app')
    @section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách giảng viên (Tổng : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add new Teacher</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content-header">  
    <div class="container-fluid">  
        <div class="row">  
            <div class="col-md-12">  
                <div class="card">  

                    <div class="card-header">  
                        <h3 class="card-title font-weight-bold">Tìm kiếm</h3>  
                    </div>  
                    
                    <form method="get" action="">  
                        <div class="card-body">  
                            <div class="row">   
                                <div class="form-group col-md-3">  
                                    <label>Tên</label>  
                                    <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"    
                                    placeholder="Name">  
                                </div>  

                                <div class="form-group col-md-3">  
                                    <label>Email</label>  
                                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}"    
                                    placeholder="Email">   
                                </div>  

                                <div class="form-group col-md-3">  
                                    <label>Ngày tạo</label>  
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}"    
                                    placeholder="Email">   
                                </div> 
                            </div>  

                            <div class="row">   
                                <div class="form-group col-md-3">  
                                    <label>Chuyên ngành</label>  
                                    <select class="form-control" name="division">  
                                        <option value="">Major</option>  
                                        <option value="Công nghệ thông tin" {{ Request::get('division') == 'Công nghệ thông tin' ? 'selected' : '' }}>Công nghệ thông tin</option>  
                                        <option value="Ngoại ngữ" {{ Request::get('division') == 'Ngoại ngữ' ? 'selected' : '' }}>Ngoại ngữ</option>  
                                        <option value="Nông nghiệp - Thủy sản" {{ Request::get('division') == 'Nông nghiệp - Thủy sản' ? 'selected' : '' }}>Nông nghiệp - Thủy sản</option>  
                                    </select>  
                                </div>
                                <div class="form-group col-md-3">  
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">TÌM KIẾM</button>  
                                    <a href="{{ url('admin/teacher/list') }}" class="btn btn-success" style="margin-top: 30px;">LÀM MỚI</a>  
                                </div>  
                            </div>  

                        </div>  
                    </form>  
                </div>  
            </div>  
            <!--/.col (right) -->  
        </div>  
    </div>  
</section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
          @include('_message')


            <div class="card">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Danh sách giảng viên  </h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body p-0">
                
                <table class="table">
                  <thead>
                    <tr>
                      <th>Thứ tự</th>
                      <th>Tên</th>
                      <th>Email</th>
                      <th>Điện thoại</th>
                      <th>Đơn vị</th>
                      <th>Ngày tạo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $index => $value)  
                      <tr>
                        <td>{{ $getRecord->total() - ($getRecord->currentPage() - 1) * $getRecord->perPage() - $index }}</td>  <!-- Adjusted order number calculation -->  
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->division }}</td>
                        <td>{{ date('m-d-Y', strtotime($value->created_at)) }}</td>
                        <td>
                          <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary">TÙY CHỈNH</a>
                          <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger">XÓA</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                <div style="padding: 10px; text-align: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection