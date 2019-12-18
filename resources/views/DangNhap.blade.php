<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đăng nhập - Quản lý học sinh tiểu học</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #293c74">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background-image: url('https://i.pinimg.com/564x/14/e9/1d/14e91d53f775776bc77d93bb6f4ee488.jpg');background-repeat: no-repeat; background-size: cover;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 mb-4" style="color: #293c74; font-weight: bold;">Đăng nhập hệ thống</h1>
                  </div>
                  <form class="user" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="inputTaiKhoan" name="taikhoan" aria-describedby="emailHelp" placeholder="Tài khoản">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="inputMatKhau" name="matkhau" placeholder="Mật khẩu">
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn btn-primary btn-user btn-block"></input>
                    @if(session('Thất bại'))
                    <div id="noteGioitinh" style="display: block; margin-top: 10px; text-align: center;">
                      <i class="fas fa-exclamation-triangle" style="color: red"></i>
                      <span style="color: red">{{session('Thất bại')}}</span>
                    </div>
                  @endif
                  </form>
                  <hr>
                  <div class="text-center">
                    <p class="small">Đồ án môn Phương pháp phát triển phần mềm hướng đối tượng SE100.K11</p>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
