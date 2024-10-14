    @extends('layouts.app')
    @section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tùy chỉnh thông tin giảng viên</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tùy chỉnh</h3>
              </div>
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>tên</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" 
                    required placeholder="Enter email">
                        <div style="color:red"> {{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group" style="display: none">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="phone" class="form-control" name="phone" value="{{ $getRecord->phone }}" required placeholder="Enter phone Number">
                  </div>
                  <div class="form-group">
                    <label>Đơn vị</label>
                    <input type="division" class="form-control" name="division" value="{{ $getRecord->division }}" required placeholder="Enber Division">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection