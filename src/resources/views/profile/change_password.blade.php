    @extends('layouts.app')
    @section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thay đổi mật khẩu tài khoản</h1>
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
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="old_password" required placeholder="Enter Old Password">
                  </div>

                  <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input type="password" class="form-control" name="new_password" required placeholder="Enter New Password">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

  @endsection