<!DOCTYPE html>  
<html lang="en">  
<head>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>TVU | Log in</title>  

  <!-- Google Font: Source Sans Pro -->  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">  
  <!-- Font Awesome -->  
  <link rel="stylesheet" href="{{ URL('public/plugins/fontawesome-free/css/all.min.css') }}">  
  <!-- icheck bootstrap -->  
  <link rel="stylesheet" href="{{ URL('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">  
  <!-- Theme style -->  
  <link rel="stylesheet" href="{{ URL('public/dist/css/adminlte.min.css') }}">  
</head>  
<body class="hold-transition login-page">  
<div class="login-box">  
  <div class="card card-outline card-primary">  
    <div class="card-header text-center">  
      <a href="#" class="h1"><b>TVU</b></a>  
    </div>  
    <div class="card-body">  
      <p class="login-box-msg">Log in to access the website</p>  

      @include('_message')  
      
      <form action="{{ url('login') }}" method="post">  
        {{ csrf_field() }}  
        <div class="input-group mb-3">  
          <input type="email" class="form-control" required name='email' placeholder="Email">  
          <div class="input-group-append">  
            <div class="input-group-text">  
              <span class="fas fa-envelope"></span>  
            </div>  
          </div>  
        </div>  
        <div class="input-group mb-3">  
          <input type="password" class="form-control" name="password" placeholder="Password">  
          <div class="input-group-append">  
            <div class="input-group-text">  
              <span class="fas fa-lock"></span>  
            </div>  
          </div>  
        </div>  
        <div class="row">  
          <div class="col-8">  
            <div class="icheck-primary">  
              <input type="checkbox" id="remember" name="remember">  
              <label for="remember">  
                Remember Me  
              </label>  
            </div>  
          </div>  
          <div class="col-4">  
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>  
          </div>  
        </div>  
      </form>  

      <p class="mb-1">  
        <a href="#" onclick="loginAsGuest()">LOGIN AS GUEST</a>  
      </p>  

      <p class="mb-1">  
        <a href="{{ url('forgot-password') }}">Forgot password</a>  
      </p>  

    </div>  
  </div>  
</div>  

<!-- jQuery -->  
<script src="{{ URL('public/plugins/jquery/jquery.min.js') }}"></script>  
<!-- Bootstrap 4 -->  
<script src="{{ URL('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>  
<!-- AdminLTE App -->  
<script src="{{ URL('public/dist/js/adminlte.min.js') }}"></script>  

<script>  
    function loginAsGuest() {  
        document.querySelector('input[name="email"]').value = 'guest@guest.com';  
        document.querySelector('input[name="password"]').value = '123456';  
    }  
</script>  

</body>  
</html>