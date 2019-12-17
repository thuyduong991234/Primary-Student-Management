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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/namhoc.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="height: 750px">

        <!-- Topbar -->
        @include('Templates.Header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h3 mb-0" style="color: #293c74"> <i style="color: #293c74" class="fas fa-school fa-sm fa-fw mr-2"></i>Trang chủ</h5>
          </div>

           <!-- Collapsable Card Example -->
           <div class="row">
            <div class="col-lg-6">
             <div class="card shadow md-6">
                <!-- Card Header - Accordion -->
                <a style="background-color: #293c74;" href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold" style="color: white">Danh sách các biểu mẫu</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    <a href="https://drive.google.com/open?id=1u4NErCP05ryURrEOAfD2_H2ryobrPhUr">Biểu mẫu Hồ sơ học sinh</a>
                    <br>
                    <a href="https://drive.google.com/open?id=1u0U5ppPwtd4Tn6lnmVJ8i45jnsa_YFeM">Biểu mẫu Kết quả học tập - Giữa kỳ 1, 2 - Lớp 1,2,3</a>
                    <br>
                     <a href="https://drive.google.com/open?id=1Sm8ibzbT8m0AIEwGXMtUNL28I3DYUfC7">Biểu mẫu Kết quả học tập - Giữa kỳ 1, 2 - Lớp 4,5</a>
                    <br>
                    <a href="https://drive.google.com/open?id=1gMJbrEM1OGJx_5Uht9YmVQw0O7La9K93">Biểu mẫu Kết quả học tập - Cuối kỳ 1 - Lớp 1,2,3</a>
                    <br>
                    <a href="https://drive.google.com/open?id=1VDf-Vr8zf540QhEqHTIvnw43qu28mpl0">Biểu mẫu Kết quả học tập - Cuối kỳ 1 - Lớp 4,5</a>
                     <br>
                    <a href="https://drive.google.com/open?id=1tFk661fRs2DhUO3bJgTmrnYiNBzDMdEx">Biểu mẫu Kết quả học tập - Cuối năm học - Lớp 1,2,3</a>
                     <br>
                    <a href="https://drive.google.com/open?id=15vMIZ3RFzlajFGkUrv7RQXivc_Rdal3y">Biểu mẫu Kết quả học tập - Cuối năm học - Lớp 4,5</a>
                  </div>
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
 

</body>

</html>
