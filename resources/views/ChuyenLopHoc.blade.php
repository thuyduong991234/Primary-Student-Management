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
            <div class="row">
              <div class="col" style="float: left;">
                <h5>4.2.1 Chuyển lớp cho học sinh</h5>
              </div>

              <div class = "col" style="float: right;">
                <div class="row justify-content-end">
                  <div class="col-md-auto" style="align-items: center; display: flex;">
                    <div><span style="color: #293c74; font-weight: bold; margin-right: 15px">Khối:</span></div>
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
                    <div><span style="color: #293c74; font-weight: bold; margin-right: 15px">Lớp:</span></div>
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
                  
                  <div class="col-2" style="margin-right: 10px;">
                    <button type="button" name="btnCapNhat" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: black; float: right;">Cập nhật</button>
                  </div>


                </div>

              </div>
            </div>
          </div>
        </div>

      
      <!--End area button-->
      <script type="text/javascript">
      </script>
      <!--table hồ sơ giáo viên-->
      <div class="table-responsive">
        <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_chuyenlophoc">
          <thead style="background-color: #293c74; color: white;">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Mã học sinh</th>
              <th scope="col">Tên học sinh</th>
              <th scope="col">Ngày sinh</th>
              <th scope="col">Lớp chuyển sang</th>
            </tr>
          </thead>
          <tbody style="background-color: white; color: black; overflow: auto;">
            @foreach($data as $HS)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td scope="row">{{$HS->mahocsinh}}</td>
              <td scope="row">{{$HS->tenhocsinh}}</td>
              <td scope="row">{{$HS->ngaysinh}}</td>
              <td align="center">
               <select class="form-control" style="width: 10rem" name="Lop_con">
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
              </td>
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
      </div>
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

<script src="js/chuyenlop.js"></script>

</body>

</html>