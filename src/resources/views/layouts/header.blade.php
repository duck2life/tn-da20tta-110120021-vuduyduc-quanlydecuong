  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="text-align: center">
      <span class="brand-text font-weight-light" style="font-weight: bold !important; font-size: 30px">TVU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('public/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">





        @if(Auth::user()->user_type == 1)
        <li class="nav-item">
          <a href="{{ url('admin/dashbroad') }}" class="nav-link @if (Request::segment(2) == 'dashbroad') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Trang chủ
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/teacher/list') }}" class="nav-link @if (Request::segment(2) == 'teacher') active @endif">
            <i class="nav-icon fas fa-user"></i>  
            <p>
              Giảng viên
            </p>
          </a>
        </li>

        <li class="nav-item">  
            <a class="nav-link @if (Request::is('admin/document*')) active @endif">  
                <i class="nav-icon fas fa-book"></i>  
                <p>  
                    Đề cương  
                    <i class="fas fa-angle-left right"></i>  
                </p>  
            </a>  

            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item" style="margin: right">  
                    <a href="{{ url('admin/document/list') }}" class="nav-link @if (Request::is('admin/document/list')) active @endif">  
                        <i class="far fa-circle nav-icon"></i>  
                        <p>Danh sách đề cương </p>  
                    </a>  
                </li>  
                
                <li class="nav-item">  
                    <a href="{{ url('admin/document/add') }}" class="nav-link @if (Request::is('admin/document/add')) active @endif">  
                        <i class="far fa-circle nav-icon"></i>  
                        <p>Tạo đề cương </p>  
                    </a>  
                </li>  

            </ul>  
        </li>
        


        <li class="nav-item">
          <a href="{{ url('admin/change_password') }}" class="nav-link @if (Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon fas fa-user"></i>  
            <p>Đổi mật khẩu</p>
          </a>
        </li>
        
        @elseif(Auth::user()->user_type == 2)
        <li class="nav-item">
          <a href="{{ url('teacher/dashbroad') }}" class="nav-link @if (Request::segment(2) == 'dashbroad') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Trang chủ  
            </p>
          </a>
        </li>

        <li class="nav-item">  
            <a class="nav-link @if (Request::is('teacher/document*')) active @endif">  
                <i class="nav-icon fas fa-book"></i>  
                <p>  
                    Đề cương  
                    <i class="fas fa-angle-left right"></i>  
                </p>  
            </a>  

            <ul class="nav nav-treeview" style="display: none;">  

                <li class="nav-item">  
                    <a href="{{ url('teacher/document/list') }}" class="nav-link @if (Request::is('teacher/document/list')) active @endif">  
                        <i class="far fa-circle nav-icon"></i>  
                        <p>Danh sách đề cương </p>  
                    </a>  
                </li>  
                
                <li class="nav-item">  
                    <a href="{{ url('teacher/document/add') }}" class="nav-link @if (Request::is('teacher/document/add')) active @endif">  
                        <i class="far fa-circle nav-icon"></i>  
                        <p>Tạo đề cương </p>  
                    </a>  
                </li>  

            </ul>  
        </li>

          <li class="nav-item">
          <a href="{{ url('teacher/change_password') }}" class="nav-link @if (Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon fas fa-user"></i>  
            <p>Đổi mật khẩu</p>
          </a>
        </li>

        @elseif(Auth::user()->user_type == 3)

        <li class="nav-item">  
            <a href="{{ url('guest/dashbroad') }}" class="nav-link @if (Request::segment(3) == 'dashbroad') active @endif">  
                <i class="nav-icon fas fa-tachometer-alt"></i>  
                <p>  
                    Trang chủ  
                </p>  
            </a>  
        </li>  
        @endif
      
        
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link ">
             <i class="nav-icon fas fa-sign-out-alt"></i>  
              <p>
                Đăng xuất
              </p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>

  