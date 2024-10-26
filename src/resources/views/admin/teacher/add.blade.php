    @extends('layouts.app')
    @section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm giảng viên</h1>
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
                <h3 class="card-title">THÊM</h3>
              </div>
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" required placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="Enter email">
                    <div style="color:red"> {{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="number" class="form-control" name="phone" required placeholder="Enter phone Number">
                  </div>
                  <div class="form-group">
                    <label>Đơn vị</label>
                    <input type="division" class="form-control" name="division" required placeholder="Enber Division">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
              </form>
            </div>
          </div>

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection