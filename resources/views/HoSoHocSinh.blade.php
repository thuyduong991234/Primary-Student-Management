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
              <h5 style="color: black"> 4.1.1 Nhập hồ sơ học sinh </h5>
            </div>
            <div style="float: right;">
              <!-- Large modal -->
              <button type="button" name="modalThemHocSinh" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: black">Thêm mới</button>

              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết Hồ sơ học sinh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <!--modal body -->
                  <div class="modal-body">
                    <div class = "row">
                     <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Khối học</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="khoi" disabled="true">
                    </div>
                    <div class="col"  style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Tỉnh/Thành phố</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="tinh">
                        <option selected>Tỉnh Phú Yên</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="w-100"></div>
                    <div class="col"  style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Lớp học</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="lop" disabled="true">
                    </div>
                    <div class="col"  style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Quận/Huyện</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="huyen">
                        <option selected>Huyện Tuy An</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="w-100"></div>
                    <div class="col"  style="margin-bottom: 10px">  
                      <div>
                         <span style="color: black; font-weight: bold">Họ và tên</span>
                         <input required="true" type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="tenhocsinh">
                      </div>
                      <div id="noteName" style="display: none; width: 13rem; float: right; margin-right: 10px">
                        <i class="fas fa-exclamation-triangle" style="color: red"></i>
                        <span style="color: red">Vui lòng điền họ và tên học sinh.</span>
                      </div>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Xã/Phường</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="xa">
                        <option selected>Xã An Hòa</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="w-100"></div>
                    <div class="col" style="margin-bottom: 10px">
                      <div>
                        <span style="color: black; font-weight: bold">Ngày sinh</span>
                        <input type="date" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="ngaysinh">
                      </div>
                      <div id="noteNgaysinh" style="display: none; width: 13rem; float: right; margin-right: 10px">
                        <i class="fas fa-exclamation-triangle" style="color: red"></i>
                        <span style="color: red">Vui lòng điền ngày sình học sinh.</span>
                      </div>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Nơi sinh</span>
                      <textarea class="form-control" rows="2" name="noisinh" style="width: 13rem; float: right; margin-right: 10px"></textarea>
                    </div>
                    <div class="w-100"></div>
                    <div class="col" style="margin-bottom: 10px">
                      <div>
                        <span style="color: black; font-weight: bold">Giới tính</span>
                        <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="gioitinh">
                          <option selected>Nam</option>
                          <option>Nữ</option>
                        </select>
                      </div>
                      <div id="noteGioitinh" style="display: none; width: 13rem; float: right; margin-right: 10px">
                        <i class="fas fa-exclamation-triangle" style="color: red"></i>
                        <span style="color: red">Vui lòng chọn giới tính học sinh.</span>
                      </div>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Chỗ ở hiện tại</span>
                      <textarea class="form-control" rows="2" name="choohientai" style="width: 13rem; float: right; margin-right: 10px"></textarea>
                    </div>
                    <div class="w-100"></div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Trạng thái học sinh</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="trangthai">
                        <option selected>Đang học</option>
                        <option>Chuyển đến kỳ 1</option>
                        <option>Nghỉ học xin học lại kỳ 1</option>
                        <option>Chuyển đi học kỳ 1</option>
                        <option>Thôi học học kỳ 1</option>
                        <option>Chuyển đến kỳ 2</option>
                        <option>Nghỉ học xin học lại kỳ 2</option>
                        <option>Chuyển đi học kỳ 2</option>
                        <option>Thôi học học kỳ 2</option>
                        <option>Chuyển đến trong hè</option>
                        <option>Chuyển đi trong hè</option>
                        <option>Thôi học trong hè</option>
                      </select>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Số điện thoại</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="sdt">
                    </div>
                    <div class="w-100"></div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Dân tộc</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="dantoc">
                        <option selected>Kinh</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Quốc tịch</span>
                      <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="quoctich">
                        <option selected>Việt Nam</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="w-100"></div>
                    <div class="col"  style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Thứ tự</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="thutu">
                    </div>
                    <div class="col"  style="margin-bottom: 10px"></div>
                    <div class="w-100"></div>
                  </div>
                  <!--nav-->

                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="thongtincanhan-tab" data-toggle="tab" href="#thongtincanhan" role="tab" aria-controls="thongtincanhan" aria-selected="true">I. Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="thongtingiadinh-tab" data-toggle="tab" href="#thongtingiadinh" role="tab" aria-controls="thongtingiadinh" aria-selected="false">II. Thông tin gia đình</a>
                    </li>
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="thongtincanhan" role="tabpanel" aria-labelledby="thongtincanhan-tab">
                      <div class="row" style="margin-top: 20px">
                        <div class="col" style="margin-bottom: 10px">
                          <span style="color: black; font-weight: bold">Khu vực</span>
                          <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="khuvuc">
                            <option>Biên giới - Hải đảo</option>
                            <option>Đô thị</option>
                            <option selected>Đồng bằng</option>
                            <option>Miền núi - vùng sâu</option>
                          </select>
                        </div>
                        <div class="col" style="margin-bottom: 10px">
                          <div class="row">
                            <div class="col-sm-4"><span style="color: black; font-weight: bold">Đối tượng chính sách</span></div>
                            <div class="col-sm-8"> <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="dtcs">
                              <option selected>Thương binh</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="w-100"></div>
                      <div class="col" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Loại khuyết tật</span>
                        <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="loaikhuyettat">
                          <option>Biên giới - Hải đảo</option>
                          <option>Đô thị</option>
                          <option selected>Đồng bằng</option>
                          <option>Miền núi - vùng sâu</option>
                        </select>
                      </div>
                      <div class="col" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Miễn học phí</span>
                        <input type="checkbox" name="mienhocphi" style="width: 20px; height: 20px; margin-left: 55px;">
                      </div>
                      <div class="w-100"></div>
                      <div class="col" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Đội viên</span>
                        <input type="checkbox" name="doivien" style="width: 20px; height: 20px; margin-left: 99px;">
                      </div>
                      <div class="col" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Giảm học phí</span>
                        <input type="checkbox" name="giamhocphi" style="width: 20px; height: 20px; margin-left: 53px;">
                      </div>
                      <div class="w-100"></div>
                      <div class="col" style="margin-bottom: 10px">
                        <span style="color: black; font-weight: bold">Lưu ban năm trước</span>
                        <input type="checkbox" name="luubannamtruoc" style="width: 20px; height: 20px; margin-left: 20px;">
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="thongtingiadinh" role="tabpanel" aria-labelledby="thongtingiadinh-tab">
                    <div class="row" style="margin-top: 20px">
                     <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Họ tên cha</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="hotencha">
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Họ tên mẹ</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="hotenme">
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Họ tên người giám hộ</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="hotenngh">
                    </div>
                    <div class="w-100"></div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Nghề nghiệp cha</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="nghenghiepcha">
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Nghề nghiệp mẹ</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="nghenghiepme">
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Nghề nghiệp người giám hộ</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="nghenghiepngh">
                    </div>
                    <div class="w-100"></div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Năm sinh cha</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="namsinhcha">
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Năm sinh mẹ</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="namsinhme">
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                      <span style="color: black; font-weight: bold">Năm sinh người giám hộ</span>
                      <input type="text" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="namsinhngh">
                    </div>
                    <div class="w-100"></div>
                  </div>
                </div>
              </div>


            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" name="btnGhiHocSinh">Ghi</button>
              <button type="button" class="btn btn-primary">Ghi và thêm</button>
            </div>
          </div>
        </div>
        <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="ghihs_thanhcong">
          <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
            <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-dark" style="background-color: black">Thêm với Excel</button>
      <button type="button" class="btn btn-dark" name="btnXoa" style="background-color: black">Xóa học sinh</button>
      <button type="button" class="btn btn-dark" style="background-color: black">Xuất Excel</button>
    </div>
  </div>
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
      <span style="color: black">Khối:</span>
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
    <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
      <span style="color: black">Trạng thái:</span>
      <select class="form-control" style="width: auto; margin-left: 5px" name="Trangthai">
        @if($trangthai == 'Đang học')
          <option selected>Đang học</option>
        @else
          <option>Đang học</option>
        @endif
        @if($trangthai == 'Chuyển đến kỳ 1')
          <option selected>Chuyển đến kỳ 1</option>
        @else
          <option>Chuyển đến kỳ 1</option>
        @endif
        @if($trangthai == 'Nghỉ học xin học lại kỳ 1')
          <option selected>Nghỉ học xin học lại kỳ 1</option>
        @else
          <option>Nghỉ học xin học lại kỳ 1</option>
        @endif    
        @if($trangthai == 'Chuyển đi kỳ 1')
          <option selected>Chuyển đi kỳ 1</option>
        @else
          <option>Chuyển đi kỳ 1</option>
        @endif       
        @if($trangthai == 'Thôi học kỳ 1')
          <option selected>Thôi học kỳ 1</option>
        @else
          <option>Thôi học kỳ 1</option>
        @endif    
        @if($trangthai == 'Chuyển đến kỳ 2')
          <option selected>Chuyển đến kỳ 2</option>
        @else
          <option>Chuyển đến kỳ 2</option>
        @endif
        @if($trangthai == 'Nghỉ học xin học lại kỳ 2')
          <option selected>Nghỉ học xin học lại kỳ 2</option>
        @else
          <option>Nghỉ học xin học lại kỳ 2</option>
        @endif    
        @if($trangthai == 'Chuyển đi kỳ 2')
          <option selected>Chuyển đi kỳ 2</option>
        @else
          <option>Chuyển đi kỳ 2</option>
        @endif       
        @if($trangthai == 'Thôi học kỳ 2')
          <option selected>Thôi học kỳ 2</option>
        @else
          <option>Thôi học kỳ 1</option>
        @endif

        @if($trangthai == 'Chuyển đến trong hè')
          <option selected>Chuyển đến trong hè</option>
        @else
          <option>Chuyển đến trong hè</option>
        @endif   
        @if($trangthai == 'Chuyển đi trong hè')
          <option selected>Chuyển đi trong hè</option>
        @else
          <option>Chuyển đi trong hè</option>
        @endif       
        @if($trangthai == 'Thôi học trong hè')
          <option selected>Thôi học trong hè</option>
        @else
          <option>Thôi học trong hè</option>
        @endif
      </select>
    </div>
  </div>
  <!--End area button-->

  <!--table hồ sơ học sinh-->
  <div class="table-responsive">
    <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_hocsinh">
      <thead style="background-color: black; color: white;">
        <tr>
          <th scope="col">STT</th>
          <th scope="col"><input type="checkbox" name="checkbox_all" style="width: 20px; height: 20px;"></th>
          <th scope="col">Sửa</th>
          <th scope="col">Mã học sinh</th>
          <th scope="col">Họ và tên</th>
          <th scope="col">Ngày sinh</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Dân tộc</th>
          <th scope="col">Quốc tịch</th>
          <th scope="col">Tỉnh/Thành phố</th>
          <th scope="col">Quận/Huyện</th>
          <th scope="col">Xã</th>
          <th scope="col">Nơi sinh</th>
          <th scope="col">Chỗ ở hiện tại</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Khu vực</th>
          <th scope="col">Loại khuyết tật</th>
          <th scope="col">Đối tượng chính sách</th>
          <th scope="col">Miễn học phí</th>
          <th scope="col">Giảm học phí</th>
          <th scope="col">Đội viên</th>
          <th scope="col">Lưu ban năm trước</th>
          <th scope="col">Họ tên cha</th>
          <th scope="col">Nghề nghiệp cha</th>
          <th scope="col">Năm sinh cha</th>
          <th scope="col">Họ tên mẹ</th>
          <th scope="col">Nghề nghiệp mẹ</th>
          <th scope="col">Năm sinh mẹ</th>
          <th scope="col">Họ tên người giám hộ</th>
          <th scope="col">Nghề nghiệp người giám hộ</th>
          <th scope="col">Năm sinh người giám hộ</th>
        </tr>
      </thead>
      <tbody style="background-color: white; color: black; overflow: auto;">
        @foreach($data as $HS)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td align="center">
            <input type="checkbox" name = "checkbox_one" style="width: 20px; height: 20px;">
          </td>
          <td align="center">
              <i class="fas fa-user-edit" name = "btnEditHS" data-toggle="modal" data-target=".bd-example-modal-lg"></i>
          </td>
          <td>{{$HS -> mahocsinh}}</td>
          <td>{{$HS -> tenhocsinh}}</td>
          <td>{{date("d/m/Y", strtotime($HS -> ngaysinh))}}</td>
          <td>{{$HS -> gioitinh}}</td>
          <td>{{$HS -> trangthaihocsinh}}</td>
          <td>{{$HS -> dantoc}}</td>
          <td>{{$HS -> quoctich}}</td>
          <td>{{$HS -> tinh}}</td>
          <td>{{$HS -> huyen}}</td>
          <td>{{$HS -> xa}}</td>
          <td>{{$HS -> noisinh}}</td>
          <td>{{$HS -> choohientai}}</td>
          <td>{{$HS -> sodt}}</td>
          <td>{{$HS -> khuvuc}}</td>
          <td>{{$HS -> loaikhuyettat}}</td>
          <td>{{$HS -> doituongchinhsach}}</td>
          @if($HS -> mienhocphi == 1)
          <td>x</td>
          @else
          <td></td>
          @endif
          @if($HS -> giamhocphi == 1)
          <td>x</td>
          @else
          <td></td>
          @endif
          @if($HS -> doivien == 1)
          <td>x</td>
          @else
          <td></td>
          @endif
          @if($HS -> luubannamtruoc == 1)
          <td>x</td>
          @else
          <td></td>
          @endif
          <td>{{$HS -> hotencha}}</td>
          <td>{{$HS -> nghenghiepcha}}</td>
          <td>{{$HS -> namsinhcha}}</td>
          <td>{{$HS -> hotenme}}</td>
          <td>{{$HS -> nghenghiepme}}</td>
          <td>{{$HS -> namsinhme}}</td>
          <td>{{$HS -> hotenngh}}</td>
          <td>{{$HS -> nghenghiepngh}}</td>
          <td>{{$HS -> namsinhngh}}</td>
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
<div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
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

<script src="js/hocsinh.js"></script>

</body>

</html>





















