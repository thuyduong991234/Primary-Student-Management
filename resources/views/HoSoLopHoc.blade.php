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
              <h5 style="color: black">3.1 Quản lý lớp học</h5>
            </div>
            <div style="float: right;">
              <!-- Large modal -->
              <button type="button" name="modalThemLopHoc" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: black">Thêm mới</button>

              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết Hồ sơ lớp học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <!--modal body -->
                  <div class="modal-body">
                    <div class="row">
                      <div class="col"></div>
                      
                      <div class="col-8" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Khối học</span>
                        <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="khoi" disabled="true">
                      </div>
                      
                      <div class="col">
                      </div>

                      <div class="w-100"></div>

                      <div class="col"></div>


                      <div class="col-8" style="margin-bottom: 10px">  
                        <div>
                         <span style="color: black; font-weight: bold">Tên lớp</span>
                         <input required="true" type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="tenlophoc">
                       </div>
                       <div id="noteName" style="display: none; width: 13rem; float: right; margin-right: 10px">
                        <i class="fas fa-exclamation-triangle" style="color: red"></i>
                        <span style="color: red">Vui lòng điền tên lớp.</span>
                      </div>
                    </div>  

                    <div class="col">
                    </div>

                    <div class="w-100"></div>

                    <div class="col"></div>
                    <div class="col-8" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Giáo viên chủ nhiệm</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="gvcn">
                        <script type="text/javascript">
                          var danhsachGoc = {!! json_encode($listgv) !!};
                        </script>
                        @foreach($listgv as $GV)
                        <option magv="{{$GV->magv}}">{{$GV->tengv}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col">
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" name="btnGhiLopHoc">Ghi</button>
                  <button type="button" class="btn btn-primary">Ghi và thêm</button>
                </div>
              </div>
            </div>
            <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="ghilh_thanhcong">
              <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-dark" style="background-color: black">Thêm với Excel</button>
          <button type="button" class="btn btn-dark" name="btnXoa" style="background-color: black">Xóa lớp học</button>
          <button type="button" class="btn btn-dark" style="background-color: black">Xuất Excel</button>
        </div>
      </div>
      <div class="row" style="margin-bottom: 10px">
        <div class="col-md-auto" style="margin-right: 10px">
          <span style="color: black">Khối:</span>
          <select style="width: 10rem" name="Khoi">
            <option selected>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
      <!--End area button-->

      <!--table hồ sơ giáo viên-->
      <div class="table-responsive">
        <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
          <thead style="background-color: black; color: white;">
            <tr>
              <th scope="col">STT</th>
              <th scope="col"><input type="checkbox" name="checkbox_all" style="width: 20px; height: 20px;"></th>
              <th scope="col">Sửa</th>
              <th scope="col">Mã lớp học</th>
              <th scope="col">Tên lớp học</th>
              <th scope="col">Khối</th>
              <th scope="col">Giáo viên chủ nhiệm</th>
            </tr>
          </thead>
          <tbody style="background-color: white; color: black; overflow: auto;">
            @foreach($data as $LH)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td align="center">
                <input type="checkbox" name = "checkbox_one" style="width: 20px; height: 20px;">
              </td>
              <td align="center">
                <i class="fas fa-user-edit" name = "btnEditLH" data-toggle="modal" data-target=".bd-example-modal-lg"></i>
              </td>
              <td>{{$LH -> malophoc}}</td>
              <td>{{$LH -> tenlophoc}}</td>
              <td>{{$LH -> khoi}}</td>
              <td>{{$LH -> tengv}}</td>
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
<div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoalh_thanhcong">
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


  <script src="js/lophoc.js"></script>
</body>

</html>





















