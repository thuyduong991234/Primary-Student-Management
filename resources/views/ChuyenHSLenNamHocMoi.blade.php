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
          <div style="height: 50px;">
            <div style="float: left;">
              <h5>6. Chuyển hồ sơ lên năm học mới</h5>
            </div> 
          </div>
          <!--Start tab bar-->

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="lophoc-tab" data-toggle="tab" href="#lophoc" role="tab" aria-controls="lophoc" aria-selected="true">I. Chuyển hồ sơ lớp học</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="hocsinh-tab" data-toggle="tab" href="#hocsinh" role="tab" aria-controls="hocsinh" aria-selected="false">II. Chuyển hồ sơ học sinh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="moi-tab" data-toggle="tab" href="#moi" role="tab" aria-controls="moi" aria-selected="false">III. Kết quả chuyển hồ sơ lên năm học mới</a>
            </li>
          </ul>


          <div style="background-color: white">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="lophoc" role="tabpanel" aria-labelledby="lophoc-tab">
                <div style="height: 50px;">
                  <div style="float: left;  margin-top: 10px; margin-left: 10px">
                    <h8 style="color: black; font-weight: bold;">Danh sách lớp học năm học {{$namhoc}}</h8>
                  </div> 
                  <div style="float: right;  margin-top: 10px; margin-right: 10px">
                    <button type="button" name="btnThucHien_LH" class="btn btn-dark" style="background-color: black;">Thực hiện sao chép lớp học</button>
                  </div> 
                </div>

                <!--table danh sach lop hoc-->
                <div class="table-responsive" style="margin-top: 20px">
                  <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
                    <thead style="background-color: #293c74; color: white;">
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã lớp học</th>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Khối</th>
                      </tr>
                    </thead>
                    <tbody style="background-color: white; color: black; overflow: auto;">
                      @foreach($data_lophoc as $LH)
                      <tr style="text-align: center;">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td scope="row" style="white-space: nowrap;">{{$LH->malophoc}}</td>
                        <td scope="row" style="white-space: nowrap;">{{$LH->tenlophoc}}</td>
                        <td scope="row" style="white-space: nowrap;">{{$LH->khoi}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!--end table-->

              </div>

              <div class="tab-pane fade" id="hocsinh" role="tabpanel" aria-labelledby="hocsinh-tab">
                <div style="height: 50px;">
                  <div style="float: left;  margin-top: 10px; margin-left: 10px">
                    <h8 style="color: black; font-weight: bold;">Thông tin chuyển học sinh năm học {{$namhoc}}</h8>
                  </div> 
                  <div style="float: right;  margin-top: 10px; margin-right: 10px">
                    <button type="button" name="btnThucHien_HS" class="btn btn-dark" style="background-color: black;">Thực hiện sao chép học sinh</button>
                  </div> 
                </div>

                <!--table danh sach lop hoc-->
                <div class="table-responsive" style="margin-top: 20px">
                  <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
                    <thead style="background-color: #293c74; color: white;">
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Lớp học hiện tại</th>
                        <th scope="col">Sỉ số</th>
                        <th scope="col">Lớp học chuyển lên</th>
                        <th scope="col">Lớp học lưu ban</th>
                      </tr>
                    </thead>
                    <tbody style="background-color: white; color: black; overflow: auto;">
                      @foreach($data_lophoc as $LH)
                      <tr style="text-align: center;">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td scope="row" style="white-space: nowrap;">{{$LH->tenlophoc}}</td>

                        @php $flag = 0 @endphp
                        @foreach($listsiso as $siso)
                        @if($siso->malophoc == $LH->malophoc)
                        @php $flag = 1 @endphp
                        <td scope="row" style="white-space: nowrap;">{{$siso->siso}}</td>
                        @endif
                        @endforeach
                        @if($flag == 0)
                          <td scope="row" style="white-space: nowrap;">0</td>
                        @endif

                        <td align="center">
                         <select class="form-control" style="width: 10rem" name="Lop_con" id="lophocchuyenlen">
                          @if($data_lophocnamsau)
                          @php $flag_khoi = 0 @endphp
                          @foreach($data_lophocnamsau as $LHNS)
                          @if(($LH->khoi + 1) == $LHNS->khoi)
                          @php $flag_khoi = 1 @endphp
                          @if(ltrim($LHNS->tenlophoc, $LHNS->tenlophoc[0]) == ltrim($LH->tenlophoc, $LH->tenlophoc[0]))
                          <option id="{{$LH->malophoc}} - {{$LHNS->malophoc}} - lophocchuyenlen" selected>{{$LHNS->tenlophoc}}</option>
                          @else
                          <option id="{{$LH->malophoc}} - {{$LHNS->malophoc}} - lophocchuyenlen">{{$LHNS->tenlophoc}}</option>
                          @endif
                          @endif
                          
                          @endforeach
                          @if($flag_khoi == 0)
                          <option id="khongco" selected>--Chọn lớp--</option>
                          @endif
                          @else
                          <option id="khongco" selected>--Chọn lớp--</option>
                          @endif
                        </select>
                      </td>
                      <td align="center">
                       <select class="form-control" style="width: 10rem" name="Lop_con" id="lophocluuban">
                        @if($data_lophocnamsau)
                          @foreach($data_lophocnamsau as $LHNS)
                          @if(($LH->khoi) == $LHNS->khoi)
                          @if($LHNS->tenlophoc == $LH->tenlophoc)
                          <option id="{{$LH->malophoc}} - {{$LHNS->malophoc}} - lophocluuban" selected>{{$LHNS->tenlophoc}}</option>
                          @else
                          <option id="{{$LH->malophoc}} - {{$LHNS->malophoc}} - lophocluuban">{{$LHNS->tenlophoc}}</option>
                          @endif
                          @endif
                          @endforeach
                          @else
                          <option id="khongco" selected>--Chọn lớp--</option>
                          @endif
                      </select>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!--end table-->
          </div>

          <div class="tab-pane fade" id="moi" role="tabpanel" aria-labelledby="moi-tab">
                <div style="height: 50px;">
                  <div style="float: left;  margin-top: 10px; margin-left: 10px">
                    <h8 style="color: black; font-weight: bold;">Danh sách lớp học năm học {{$namhocmoi}}</h8>
                  </div> 
                </div>

                <!--table danh sach lop hoc-->
                <div class="table-responsive" style="margin-top: 20px">
                  <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
                    <thead style="background-color: #293c74; color: white;">
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã lớp học</th>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Sỉ số</th>
                        <th scope="col">Khối</th>
                      </tr>
                    </thead>
                    <tbody style="background-color: white; color: black; overflow: auto;">
                      @foreach($data_lophocnamsau as $LH)
                      <tr style="text-align: center;">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td scope="row" style="white-space: nowrap;">{{$LH->malophoc}}</td>
                        <td scope="row" style="white-space: nowrap;">{{$LH->tenlophoc}}</td>
                        @php $flag = 0 @endphp
                        @foreach($listsisomoi as $siso)
                        @if($siso->malophoc == $LH->malophoc)
                        @php $flag = 1 @endphp
                        <td scope="row" style="white-space: nowrap;">{{$siso->siso}}</td>
                        @endif
                        @endforeach
                        @if($flag == 0)
                          <td scope="row" style="white-space: nowrap;">0</td>
                        @endif
                        <td scope="row" style="white-space: nowrap;">{{$LH->khoi}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!--end table-->

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

<script src="js/chuyenhoso.js"></script>

</body>

</html>





















