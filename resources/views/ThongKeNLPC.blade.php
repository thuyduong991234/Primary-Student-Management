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
              <h5 style="color: black">5.1.3 Thống kê đánh giá định kỳ năng lực, phẩm chất</h5>
            </div>

            <div style="float: right;">
             <button type="button" name="btnXuatExcel" class="btn btn-dark" style="background-color: black">Xuất Excel</button>
           </div>
         </div>
         <div class="row justify-content-end" style="float: left; margin-bottom: 10px">
          <div class="col-md-auto" style="align-items: center; display: flex;">
            <div><span style="color: black; margin-right: 15px">Khối:</span></div>
            <select class="form-control" style="width: 10rem; float: right;" name="Khoi">
              @for ($i = 1; $i <= 5; $i++)
              @if($khoi)
              @if($khoi == $i)
              <option selected>{{$i}}</option>
              @else
              <option>{{$i}}</option>
              @endif
              @else
              <option>{{$i}}</option>
              @endif

              @endfor
            </select>
          </div>

          <div class="col-md-auto" style="align-items: center; display: flex;">
            <div><span style="color: black; margin-right: 15px">Lớp:</span></div>
            <select class="form-control" style="width: 10rem" name="Lop">
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
          <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
            <span style="color: black">Thời điểm đánh giá:</span>
            <select class="form-control" style="width: auto; margin-left: 5px" name="Thoidiemdanhgia">
              @if($hocky == 'Học kỳ I')
              @if($thoidiemdanhgia == 'Giữa kỳ 1')
              <option selected>Giữa kỳ 1</option>
              @else
              <option>Giữa kỳ 1</option>
              @endif
              @if($thoidiemdanhgia == 'Cuối kỳ 1')
              <option selected>Cuối kỳ 1</option>
              @else
              <option>Cuối kỳ 1</option>
              @endif
              @elseif($hocky == 'Học kỳ II')
               @if($thoidiemdanhgia == 'Giữa kỳ 2')
              <option selected>Giữa kỳ 2</option>
              @else
              <option>Giữa kỳ 2</option>
              @endif
              @if($thoidiemdanhgia == 'Cuối năm học')
              <option selected>Cuối năm học</option>
              @else
              <option>Cuối năm học</option>
              @endif
              @endif
            </select>
          </div>
        </div>
      </div>
    </div>

    <!--End area button-->
    <script type="text/javascript">
    </script>
    <!--table thong ke muc dat duoc-->
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table_thongkemucdatduoc">
        <thead style="background-color: black; color: white;">
          <tr>
            <th rowspan="2">STT</th>
            <th rowspan="2">Lớp</th>
            <th rowspan="2">Sỉ số</th>
            <th rowspan="2">Mức đạt được</th> 
            <th colspan="2">Tự phục vụ, tự quản</th>
            <th colspan="2">Hợp tác</th>
            <th colspan="2">Tự học và giải quyết vấn đề</th>
            <th colspan="2">Chăm học, chăm làm</th>
            <th colspan="2">Tự tin, trách nhiệm</th>
            <th colspan="2">Trung thực, kỉ luật</th>
            <th colspan="2">Đoàn kết, yêu thương</th>
          </tr>
          <tr>
            <th>SL</th>
            <th>TL</th>
            <th>SL</th>
            <th>TL</th>
            <th>SL</th>
            <th>TL</th>
            <th>SL</th>
            <th>TL</th>
            <th>SL</th>
            <th>TL</th>
            <th>SL</th>
            <th>TL</th>
            <th>SL</th>
            <th>TL</th>
          </tr>
        </thead>
        <tbody style="background-color: white; color: black; overflow: auto;">
 
        </tbody>
      </table>
    </div>
    
    <!--end table-->

  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<div class="card bg-danger text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="xuatloi">
  <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
    <i class="fas fa-exclamation-circle fa-2x" style="color: white; margin-right: 5px"></i>
    <span name = "textloi"></span>
  </div>
</div>
<div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="capnhat_thanhcong">
  <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
    <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
  </div>
</div>
</div>
<!-- End of Content Wrapper -->
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

<script src="js/kqht.js"></script>

</body>

</html>