<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>QUẢN LÝ HỌC SINH</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('Templates.Header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h3 mb-0" style="color: #293c74; font-weight: bold;">Năm học</h5>
          </div>

          <div class="row justify-content-md-center">
            <!-- Area Chart -->
            <div class="col-xl-3 col-lg-3">
              <div class="card shadow mb-6" style="margin-bottom: 50px">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3" style="background-color: #293c74">
                  <h6 class="m-0 font-weight-bold align-items-center text-center" style="color: white">Chọn năm học và kỳ làm việc</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="margin: auto; height: 18rem;">
                  <form action="{{route('ChonNamHoc')}}" method="post">
                    @csrf
                 <div style="margin-top: 1rem">
                   <span style="margin-right: 2rem">Năm học:</span>

                    <select style="width: 10rem" name="namhoc">
                    <option>2020 - 2021</option>
                    <option selected>2019 - 2020</option>
                    <option>2018 - 2019</option>
                    <option>2017 - 2018</option>

                  </select>
                 </div>
                    
                  <br>
                  <div style="margin-top: 1rem;">
                    <span style="margin-right: 2.9rem">Học kỳ:</span>
                    <select id="hocki" style="width: 10rem" name="hocki">
                    <option selected>Học kỳ I</option>
                    <option>Học kỳ II</option>
                  </select>
                  </div>
                 
                 <div class="row justify-content-md-center" style="margin-top: 2rem">
                   <input value="Xác nhận" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="width: 100px" >
                 </div>
                 </form>
               
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script type="text/javascript" src="js/namhoc.js"></script>

</body>

</html>





















