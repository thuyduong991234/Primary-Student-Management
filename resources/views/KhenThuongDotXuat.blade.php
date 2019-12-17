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
              <h5> 4.3.2 Nhập khen thưởng đột xuất/cấp trên</h5>
            </div>
            <div style="float: right;">
              <!-- Large modal -->
              <button type="button" name="modalThemKTDX" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: black">Thêm mới</button>

              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết Khen thưởng đột xuất</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <!--modal body -->
                  <div class="modal-body">
                     <div class="row">
                      <div class="col"></div>
                      
                      <div class="col-8" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Khối:</span>
                        <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="khoi" disabled="true">
                      </div>
                      
                      <div class="col">
                      </div>

                      <div class="w-100"></div>

                      <div class="col"></div>


                      <div class="col-8" style="margin-bottom: 10px">  
                        <div>
                         <span style="color: black; font-weight: bold;">Lớp:</span>
                         <input required="true" type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="lop" disabled="true">
                       </div>
                    </div>  

                    <div class="col">
                    </div>

                    <div class="w-100"></div>

                    <div class="col"></div>
                    <div class="col-8" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Họ và tên:</span>
                      <span style="color: red; font-weight: bold">(*)</span>
                      <input required="true" type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="hocsinh" disabled="true">
                    </div>
                    <div class="col"></div>

                    <div class="w-100"></div>

                    <div class="col"></div>
                    <div class="col-8" style="margin-bottom: 10px">
                      <div>
                        <span style="color: black; font-weight: bold">Nội dung khen thưởng:</span>
                        <span style="color: red; font-weight: bold">(*)</span>
                      <textarea class="form-control" rows="3" name="noidungkt" style="width: 13rem; float: right; margin-right: 10px"></textarea>
                      </div>
                      <div id="noteNoidung" style="display: none; float: right; margin-right: 10px">
                        <i class="fas fa-exclamation-triangle" style="color: red"></i>
                        <span style="color: red">Vui lòng điền nội dung khen thưởng.</span>
                      </div>
                    </div>

                    <div class="col"></div>
                  </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" name="btnGhiKT">Ghi</button>
            </div>
          </div>
        </div>
        <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="ghikt_thanhcong">
          <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
            <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-dark" name="btnXoa" data-toggle="modal" data-target=".xoa-modal" style="background-color: black">Xóa khen thưởng</button>
      <button type="button" class="btn btn-dark" name="btnXuatexcel" style="background-color: black">Xuất Excel</button>
    </div>
  </div>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
      <span style="color: #293c74; font-weight: bold;">Khối:</span>
      <select class="form-control" style="width: 10rem; margin-left: 5px" name="Khoi">
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
    <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
      <span style="color: #293c74; font-weight: bold;">Lớp:</span>
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
    <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
      <span style="color: #293c74; font-weight: bold; margin-right: 5px">Học sinh:</span>
      <select class="form-control" style="width: 15rem;" name="Hocsinh">
        @foreach($data_hocsinh as $HS)
          @if($mahocsinh)
            @if($mahocsinh == $HS->mahocsinh)
              <option id="{{$HS->mahocsinh}}" selected>{{$HS->tenhocsinh}}</option>
            @else
              <option id="{{$HS->mahocsinh}}">{{$HS->tenhocsinh}}</option>
            @endif
          @else
              <option id="{{$HS->mahocsinh}}">{{$HS->tenhocsinh}}</option>
          @endif
        
        @endforeach
      </select>
    </div>
  </div>
  <!--End area button-->

  <!--table danh sach khen thuong-->
  <div class="table-responsive">
    <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
      <thead style="background-color: #293c74; color: white;">
        <tr>
          <th scope="col">STT</th>
          <th scope="col" class="noExcel"><input type="checkbox" name="checkbox_all" style="width: 20px; height: 20px;"></th>
          <th scope="col" class="noExcel">Sửa</th>
          <th scope="col">Mã học sinh</th>
          <th scope="col">Họ và tên</th>
          <th scope="col">Lớp</th>
          <th scope="col">Nội dung khen thưởng</th>
        </tr>
      </thead>
      <tbody style="background-color: white; color: black; overflow: auto;">
        @foreach($data_khenthuong as $HS)
        <tr>

          <th scope="row">{{$loop->iteration}}</th>
          <td align="center" class="noExcel">
            <input type="checkbox" name = "checkbox_one" maktdx="{{$HS->maktdx}}" style="width: 20px; height: 20px;">
          </td>
          <td align="center" class="noExcel">
              <i class="fas fa-user-edit" style="color: #293c74" name = "btnEditHS" data-toggle="modal" data-target=".bd-example-modal-lg"></i>
          </td>
          <td>{{$HS -> mahocsinh}}</td>
          <td>{{$HS -> tenhocsinh}}</td>
          <td>{{$HS -> tenlophoc}}</td>          
          <td name="noidung">{{$HS-> noidungkt}}</td>
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

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Xoa Modal-->
<div class="modal fade xoa-modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Bạn có chắc muốn xóa không?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
        <a class="btn btn-primary" name="btnXacNhanXoa">Xóa</a>
      </div>
    </div>
  </div>
  <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoaktdx_thanhcong">
  <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
    <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
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

<script src="js/ktdx.js"></script>

</body>

</html>





















