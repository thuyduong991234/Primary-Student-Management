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
          <!--Start area button-->
          <div style="height: 50px;">
            <div style="float: left;">
              <h5 style="color: black"> 4.4 Quản lý hoàn thành chương trình tiểu học</h5>
            </div>

            <div style="float: right;">
             <button type="button" name="btnCapNhat" class="btn btn-dark" style="background-color: black;">Cập nhật</button>
             <button type="button" name="btnXuatExcel" class="btn btn-dark" style="background-color: black">Xuất Excel</button>
           </div>
         </div>
         <div class="row" style="margin-bottom: 10px">
         <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
          <span style="color: black">Lớp:</span>
          <select class="form-control" style="width: 10rem; margin-left: 5px" name="Lop">
            @foreach($data_lophoc as $LH)
            @if($lop)
            @if($lop == $LH->malophoc)
            <option id="{{$LH->malophoc}}" selected>{{$LH->tenlophoc}}</option>
            @else
            <option id="{{$LH->malophoc}}">{{$LH->tenlophoc}}</option>
            @endif
            @else
            <option id="{{$LH->malophoc}}">{{$LH->tenlophoc}}</option>
            @endif

            @endforeach
          </select>
        </div>
      </div>
      <!--End area button-->

      <!--table danh sach khen thuong-->
      <div class="table-responsive">
        <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
          <thead style="background-color: black; color: white;">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Mã học sinh</th>
              <th scope="col">Họ và tên</th>
              <th scope="col">Ngày sinh</th>
              <th scope="col">Giới tính</th>
              <th scope="col" style="text-align: center;">
                <span>Hoàn thành chương trình tiểu học</span>
                <br>
                <input align="center" type="checkbox" name="checkbox_all" style="width: 20px; height: 20px; margin-top: 5px">
              </th>
            </tr>
          </thead>
          <tbody style="background-color: white; color: black; overflow: auto;">
            @foreach($data_hocsinh as $HS)
            <tr style="text-align: center;">
            <th scope="row">{{$loop->iteration}}</th>
            <td scope="row" style="white-space: nowrap;">{{$HS->mahocsinh}}</td>
            <td scope="row" style="white-space: nowrap;">{{$HS->tenhocsinh}}</td>
            <td scope="row" style="white-space: nowrap;">{{$HS->ngaysinh}}</td>
            <td scope="row">{{$HS->gioitinh}}</td>
            
            @if($HS->hoanthanhcttieuhoc == 1)
            <td scope="row">
              <input align="center" type="checkbox" mahs="{{$HS->mahocsinh}}" name="checkbox_one" id="{{$HS->hoanthanhcttieuhoc}}" style="width: 20px; height: 20px; margin-top: 5px" checked>
            </td>
            @else
            <td>
              <input align="center" type="checkbox" mahs="{{$HS->mahocsinh}}" name="checkbox_one" id="{{$HS->hoanthanhcttieuhoc}}" style="width: 20px; height: 20px; margin-top: 5px"> 
            </td>
            @endif
          </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--end table-->

    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->
<div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="capnhat_thanhcong">
  <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
    <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
  </div>
</div>
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
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

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<script src="js/hoanthanhtieuhoc.js"></script>

</body>

</html>





















