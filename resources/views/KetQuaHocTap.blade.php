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
              <h5>4.3 Nhập kết quả học tập học sinh</h5>
            </div>

            <div style="float: right;">
              <button type="button" name="modalThemVoiExcel" class="btn btn-dark" data-toggle="modal" data-target=".them-excel" style="background-color: black">Thêm với Excel</button>



              <div class="modal fade them-excel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <form action="{{route('nhapexcelKQHT')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                     <div class="modal-header">
                      <h5 class="modal-title" id="Title">Cập nhật kết quả học tập với Excel</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <!--modal body -->
                    <div class="modal-body">
                      <div class="input-group mb-3">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput" name = "ThemEx" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="myInput">Chọn file</label>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="btnUpload">Tải lên</button>
                    </div>
                  </div>
                </div>
                <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="ghihs_thanhcong">
                  <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                    <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
                  </div>
                </div>
              </form>
            </div>
            <button type="button" name="btnCapNhat" class="btn btn-dark" style="background-color: black;">Cập nhật</button>
            <button type="button" name="btnXuatexcel" class="btn btn-dark" style="background-color: black">Xuất Excel</button>
          </div>
        </div>
        <div class="row justify-content-end" style="float: left; margin-bottom: 10px">
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
          <div class="col-md-auto" style="margin-right: 10px; display: flex; align-items: center">
            <span style="color: #293c74; font-weight: bold;">Thời điểm đánh giá:</span>
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


    <!--End area button-->
    <script type="text/javascript">
    </script>
    <!--table hồ sơ giáo viên-->
    @php
    $count = 0;
    @endphp
    @foreach($listmonhoc as $MH)
    @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
    @php
    $count = $count+2;
    @endphp 
    @else
    @php
    $count = $count+1;
    @endphp 
    @endif
    @endforeach
    @if($thoidiemdanhgia == 'Cuối năm học')
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table_ketquahoctap">
        <thead style="background-color: #293c74; color: white;">
          <tr>
            <th rowspan="3">STT</th>
            <th rowspan="3">Họ và tên</th>
            <th rowspan="3">Ngày sinh</th>
            <th rowspan="3">Giới tính</th>
            <th colspan="{{$count}}">Môn học và hoạt động giáo dục</th>
            <th colspan="3">Năng lực</th>
            <th colspan="4">Phẩm chất</th>
            <th rowspan="3">Ghi chú</th>
            <th rowspan="3">Lên lớp</th>
            <th rowspan="3">Hoàn thành chương trình lớp học</th>
            <th rowspan="3">Khen thưởng</th>
            
          </tr>
          <tr>
            @foreach($listmonhoc as $MH)
            @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
            <th colspan="2">{{$MH->tenmonhoc}}</th>
            @else
            <th>{{$MH->tenmonhoc}}</th>
            @endif
            @endforeach
            <th rowspan="2">Tự phục vụ, tự quản</th>
            <th rowspan="2">Hợp tác</th>
            <th rowspan="2">Tự học và giải quyết vấn đề</th>
            <th rowspan="2">Chăm học, chăm làm</th>
            <th rowspan="2">Tự tin, trách nhiệm</th>
            <th rowspan="2">Trung thực, kỉ luật</th>
            <th rowspan="2">Đoàn kết, yêu thương</th>
          </tr>
          <tr>
            @foreach($listmonhoc as $MH)
            @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
            <th>Điểm KTĐK</th>
            <th>Mức đạt được</th>
            @else
            <th>Mức đạt được</th>
            @endif
            @endforeach
          </tr>
        </thead>
        <tbody style="background-color: white; color: black; overflow: auto;">
          @foreach($data_hocsinh as $HS)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td scope="row" style="white-space: nowrap;" mahocsinh="$HS->mahocsinh">{{$HS->tenhocsinh}}</td>
            <td scope="row" style="white-space: nowrap;">{{$HS->ngaysinh}}</td>
            <td scope="row">{{$HS->gioitinh}}</td>

            @foreach($listmonhoc as $MH)
            @php
            $flag = true;
            @endphp
            @foreach($data_kqht as $KQHT)
            @if($KQHT->mamonhoc == $MH->mamonhoc && $KQHT->mahocsinh == $HS->mahocsinh)
            @php
            $flag = false;
            @endphp
            @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
            <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-diemkt" scope="row" contenteditable="true">{{$KQHT->diemkt}}</td>
            <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQHT->mucdatduoc}}</td>
            @else
            <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQHT->mucdatduoc}}</td>
            @endif
            @endif
            @endforeach
            @if($flag == true)
            @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
            <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-diemkt" scope="row" contenteditable="true"></td>
            <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
            @else
            <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
            @endif
            @endif
            @endforeach  
            

            <!--nlpc khoi >=4-->

            @if(count($data_kqnlpc)!= 0)
            @php
            $flag = true;
            @endphp
            @foreach($data_kqnlpc as $KQNLPC)
            @if($KQNLPC->mahocsinh == $HS->mahocsinh)
            @php
            $flag = false;
            @endphp 
            @if($KQNLPC->tendanhgia == 'Tự phục vụ, tự quản' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Hợp tác' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Tự học và giải quyết vấn đề' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Chăm học, chăm làm' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Tự tin, trách nhiệm' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Trung thực, kỉ luật' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Đoàn kết, yêu thương' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
            @elseif($KQNLPC->tendanhgia == 'Ghi chú' && $KQNLPC->mahocsinh == $HS->mahocsinh)
            <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}
              @endif
              @endif
              @endforeach
              @if($flag == true)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự phục vụ, tự quản-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Hợp tác-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự học và giải quyết vấn đề-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Chăm học, chăm làm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự tin, trách nhiệm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Trung thực, kỉ luật-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Đoàn kết, yêu thương-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Ghi chú-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              @endif
              @else
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự phục vụ, tự quản-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Hợp tác-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự học và giải quyết vấn đề-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Chăm học, chăm làm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự tin, trách nhiệm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Trung thực, kỉ luật-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Đoàn kết, yêu thương-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-Ghi chú-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              @endif
              <td align="center">
                @if($HS->lenlop == 1)
                <input type="checkbox" name = "checkbox_one" thongtin = "{{$HS->mahocsinh}}-{{$HS->mactlophoc}}" style="width: 20px; height: 20px;" checked>
                @else
                <input type="checkbox" name = "checkbox_one" thongtin = "{{$HS->mahocsinh}}-{{$HS->mactlophoc}}" style="width: 20px; height: 20px;"> 
                @endif
              </td>
              <td align="center">
                @if($HS->hoanthanhctlh == 1)
                <input type="checkbox" name = "checkbox_one1" thongtin = "{{$HS->mahocsinh}}-{{$HS->mactlophoc}}" style="width: 20px; height: 20px;" checked>
                @else
                <input type="checkbox" name = "checkbox_one1" thongtin = "{{$HS->mahocsinh}}-{{$HS->mactlophoc}}" style="width: 20px; height: 20px;"> 
                @endif
              </td>
              <td align="center">
                @if($HS->khenthuong == 1)
                <input type="checkbox" name = "checkbox_one2" thongtin = "{{$HS->mahocsinh}}-{{$HS->mactlophoc}}" style="width: 20px; height: 20px;" checked>
                @else
                <input type="checkbox" name = "checkbox_one2" thongtin = "{{$HS->mahocsinh}}-{{$HS->mactlophoc}}" style="width: 20px; height: 20px;"> 
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @elseif($khoi >=4 || $thoidiemdanhgia == 'Cuối kỳ 1')
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table_ketquahoctap">
          <thead style="background-color: #293c74; color: white;">
            <tr>
              <th rowspan="3">STT</th>
              <th rowspan="3">Họ và tên</th>
              <th rowspan="3">Ngày sinh</th>
              <th rowspan="3">Giới tính</th>
              <th colspan="{{$count}}">Môn học và hoạt động giáo dục</th>
              <th colspan="3">Năng lực</th>
              <th colspan="4">Phẩm chất</th>
              <th rowspan="3">Ghi chú</th>
            </tr>
            <tr>
              @foreach($listmonhoc as $MH)
              @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
              <th colspan="2">{{$MH->tenmonhoc}}</th>
              @else
              <th>{{$MH->tenmonhoc}}</th>
              @endif
              @endforeach
              <th rowspan="2">Tự phục vụ, tự quản</th>
              <th rowspan="2">Hợp tác</th>
              <th rowspan="2">Tự học và giải quyết vấn đề</th>
              <th rowspan="2">Chăm học, chăm làm</th>
              <th rowspan="2">Tự tin, trách nhiệm</th>
              <th rowspan="2">Trung thực, kỉ luật</th>
              <th rowspan="2">Đoàn kết, yêu thương</th>
            </tr>
            <tr>
              @foreach($listmonhoc as $MH)
              @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
              <th>Điểm KTĐK</th>
              <th>Mức đạt được</th>
              @else
              <th>Mức đạt được</th>
              @endif
              @endforeach
            </tr>
          </thead>
          <tbody style="background-color: white; color: black; overflow: auto;">
            @foreach($data_hocsinh as $HS)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td scope="row" style="white-space: nowrap;">{{$HS->tenhocsinh}}</td>
              <td scope="row" style="white-space: nowrap;">{{$HS->ngaysinh}}</td>
              <td scope="row">{{$HS->gioitinh}}</td>

              @foreach($listmonhoc as $MH)
              @php
              $flag = true;
              @endphp
              @foreach($data_kqht as $KQHT)
              @if($KQHT->mamonhoc == $MH->mamonhoc && $KQHT->mahocsinh == $HS->mahocsinh)
              @php
              $flag = false;
              @endphp
              @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
              <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-diemkt" scope="row" contenteditable="true">{{$KQHT->diemkt}}</td>
              <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQHT->mucdatduoc}}</td>
              @else
              <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQHT->mucdatduoc}}</td>
              @endif
              @endif
              @endforeach
              @if($flag == true)
              @if($MH->tenmonhoc == 'Toán' || $MH->tenmonhoc == 'Tiếng Việt'|| $MH->tenmonhoc == 'Ngoại ngữ'|| $MH->tenmonhoc == 'Tin học'|| $MH->tenmonhoc == 'Tiếng dân tộc' || $MH->tenmonhoc == 'Khoa học'|| $MH->tenmonhoc == 'Lịch sử và Địa lí')
              <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-diemkt" scope="row" contenteditable="true"></td>
              <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              @else
              <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
              @endif
              @endif
              @endforeach  


              <!--nlpc khoi >=4-->

              @if(count($data_kqnlpc)!= 0)
              @php
              $flag = true;
              @endphp
              @foreach($data_kqnlpc as $KQNLPC)
              @if($KQNLPC->mahocsinh == $HS->mahocsinh)
              @php
              $flag = false;
              @endphp 
              @if($KQNLPC->tendanhgia == 'Tự phục vụ, tự quản' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Hợp tác' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Tự học và giải quyết vấn đề' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Chăm học, chăm làm' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Tự tin, trách nhiệm' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Trung thực, kỉ luật' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Đoàn kết, yêu thương' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
              @elseif($KQNLPC->tendanhgia == 'Ghi chú' && $KQNLPC->mahocsinh == $HS->mahocsinh)
              <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}
                @endif
                @endif
                @endforeach
                @if($flag == true)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự phục vụ, tự quản-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Hợp tác-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự học và giải quyết vấn đề-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Chăm học, chăm làm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự tin, trách nhiệm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Trung thực, kỉ luật-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Đoàn kết, yêu thương-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Ghi chú-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                @endif
                @else
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự phục vụ, tự quản-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Hợp tác-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự học và giải quyết vấn đề-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Chăm học, chăm làm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự tin, trách nhiệm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Trung thực, kỉ luật-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Đoàn kết, yêu thương-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-Ghi chú-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table_ketquahoctap">
            <thead style="background-color: #293c74; color: white;">
              <tr>
                <th rowspan="2">STT</th>
                <th rowspan="2">Họ và tên</th>
                <th rowspan="2">Ngày sinh</th>
                <th rowspan="2">Giới tính</th>
                <th colspan="{{count($listmonhoc)}}">Môn học và hoạt động giáo dục</th>
                <th colspan="3">Năng lực</th>
                <th colspan="4">Phẩm chất</th>
                <th rowspan="2">Ghi chú</th>
              </tr>
              <tr>
                @foreach($listmonhoc as $MH)
                <th>{{$MH->tenmonhoc}}</th>
                @endforeach
                <th>Tự phục vụ, tự quản</th>
                <th>Hợp tác</th>
                <th>Tự học và giải quyết vấn đề</th>
                <th>Chăm học, chăm làm</th>
                <th>Tự tin, trách nhiệm</th>
                <th>Trung thực, kỉ luật</th>
                <th>Đoàn kết, yêu thương</th>
              </tr>
            </thead>
            <tbody style="background-color: white; color: black; overflow: auto;">
              @foreach($data_hocsinh as $HS)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td scope="row" style="white-space: nowrap;">{{$HS->tenhocsinh}}</td>
                <td scope="row" style="white-space: nowrap;">{{$HS->ngaysinh}}</td>
                <td scope="row">{{$HS->gioitinh}}</td>

                @foreach($listmonhoc as $MH)
                @php
                $flag = true;
                @endphp

                @foreach($data_kqht as $KQHT)
                @if($KQHT->mamonhoc == $MH->mamonhoc && $KQHT->mahocsinh == $HS->mahocsinh)
                @php
                $flag = false;
                @endphp
                <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQHT->mucdatduoc}}</td>
                @endif
                @endforeach
                @if($flag == true)
                <td name="giatri" giatri="{{$HS->mahocsinh}}-{{$MH->mamonhoc}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                @endif
                @endforeach           

                <!--nlpc-->

                @if(count($data_kqnlpc)!= 0)
                @php
                $flag = true;
                @endphp
                @foreach($data_kqnlpc as $KQNLPC)
                @if($KQNLPC->mahocsinh == $HS->mahocsinh)
                @php
                $flag = false;
                @endphp 
                @if($KQNLPC->tendanhgia == 'Tự phục vụ, tự quản' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Hợp tác' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Tự học và giải quyết vấn đề' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Chăm học, chăm làm' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Tự tin, trách nhiệm' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Trung thực, kỉ luật' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Đoàn kết, yêu thương' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}</td>
                @elseif($KQNLPC->tendanhgia == 'Ghi chú' && $KQNLPC->mahocsinh == $HS->mahocsinh)
                <td name="nlpc" giatri="{{$HS->mahocsinh}}-{{$KQNLPC->tendanhgia}}-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true">{{$KQNLPC->mucdatduoc}}
                  @endif
                  @endif
                  @endforeach
                  @if($flag == true)
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự phục vụ, tự quản-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Hợp tác-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự học và giải quyết vấn đề-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Chăm học, chăm làm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự tin, trách nhiệm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Trung thực, kỉ luật-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Đoàn kết, yêu thương-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Ghi chú-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  @endif
                  @else
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự phục vụ, tự quản-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Hợp tác-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự học và giải quyết vấn đề-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Chăm học, chăm làm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Tự tin, trách nhiệm-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Trung thực, kỉ luật-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Đoàn kết, yêu thương-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  <td name="nlpc" giatri="{{$HS->mahocsinh}}-Ghi chú-{{$HS->mactlophoc}}-mucdatduoc" scope="row" contenteditable="true"></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
          <!--end table-->

        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
          <div class="card bg-danger text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="xuatloi1">
      <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
        <i class="fas fa-exclamation-circle fa-2x" style="color: white; margin-right: 5px"></i>
        <span name = "textloi1"></span>
      </div>
    </div>
    <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="capnhat_thanhcong">
      <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
        <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
      </div>
    </div>
  </div>
  <!-- End of Content Wrapper -->
  @if(session('Thành công'))
  <div class="card bg-success text-white shadow" style="display: block; position: fixed; bottom: 10px; left: 10px; border: none" id="thanhcong">
    <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
      <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>{{session('Thành công')}}
    </div>
  </div>
  @elseif (session('Thất bại'))
  <div class="card bg-danger text-white shadow" style="display: block; position: fixed; bottom: 10px; left: 10px; border: none" id="thatbai">
    <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
      <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>{{session('Thất bại')}}
    </div>
  </div>
  @endif
</div>
<!-- End of Page Wrapper -->
    </div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


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

<script src="js/kqht.js"></script>

</body>

</html>