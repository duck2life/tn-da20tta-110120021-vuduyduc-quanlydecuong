    @extends('layouts.app')
    @section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
                

          <div class="col-sm-6">
            <h1>Tổng các phiên bản cũ của đề cương: {{ $getOldData->total() }}</h1>
          </div>

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
                <h3 class="card-title font-weight-bold">Các đề cương cũ</h3>
              </div>

            <div class="card-body p-0">  
                <table class="table">  
                    <thead>  
                        <tr>  
                            <th>Số lần thay đổi</th>  
                            <th>Tên đề cương</th>  
                            <th>Năm học</th>  
                            <th>Học kỳ</th>  
                            <th>Ngày tạo</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        @foreach ($getOldData as $index => $value)  
                            <tr>  
                                <td>{{ $getOldData->total() - ($getOldData->currentPage() - 1) * $getOldData->perPage() - $index }}</td>  <!-- Adjusted order number calculation -->  
                                <td>{{ $value->doc_name }}</td>  
                                <td>{{ $value->year }}</td>  
                                <td>{{ $value->semester }}</td>   
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}</td> <!-- Format date to show only day, month, and year -->  

                                <td>  
                                    <a href="{{ url('admin/document/old/view/'.$value->id) }}" class="btn btn-info">XEM</a>                                   
                                </td>  
                            </tr>  
                        @endforeach  
                    </tbody>  
                </table>   
                <div style="padding: 10px; text-align: right;">  
                    {!! $getOldData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}  
                </div>   
            </div>
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
      </div>
    </section>
  </div>
  @endsection