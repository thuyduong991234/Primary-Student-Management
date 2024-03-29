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
              <h5>5.1.1 Thống kê đánh giá định kỳ môn học</h5>
            </div>

            <div style="float: right;">
             <button type="button" name="btnXuatexcel" class="btn btn-dark" style="background-color: black">Xuất Excel</button>
           </div>
         </div>
         <div class="row justify-content-end" style="float: left; margin-bottom: 10px">
          <div class="col-md-auto" style="align-items: center; display: flex;">
            <div><span style="color: #293c74; font-weight: bold; margin-right: 15px">Khối:</span></div>
            <select class="form-control" style="width: 10rem; float: right;" name="Khoi">
              <option id="khoichontatca" selected ="{{$khoi == 'Tất cả' ? false : true}}">Tất cả</option>
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
              <option id="lopchontatca" selected="{{$lop == 'lopchontatca' ? false : true}}">Tất cả</option>
              @foreach($listlophoc as $LH)
              @if($lop != 'lopchontatca')
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
    <!--table thong ke muc dat duoc-->
    <div class="table-responsive" name="srollablew" style="height: 520px;">
      <table class="table table-bordered table-striped" id="table_thongkemucdatduoc">
        <thead style="background-color: #293c74; color: white;">
          <tr>
            <th rowspan="2">STT</th>
            <th rowspan="2">Lớp</th>
            <th rowspan="2">Sỉ số</th>
            <th rowspan="2">Mức đạt được</th>
            @foreach($listmonhoc as $MH)
            <th colspan="2">{{$MH->tenmonhoc}}</th>
            @endforeach
          </tr>
          <tr>
            @foreach($listmonhoc as $MH)
            <th>SL</th>
            <th>TL</th>
            @endforeach
          </tr>
        </thead>
        <tbody style="background-color: white; color: black; overflow: auto;">
        @if($khoi != 'Tất cả' && $khoi)
        @php
        $sisokhoi=0;
        $t_khoi = array_fill(0, count($listmonhoc), 0);
        $h_khoi = array_fill(0, count($listmonhoc), 0);
        $c_khoi = array_fill(0, count($listmonhoc), 0);
        @endphp
        @if($lop != 'lopchontatca' && $lop)
                @foreach($data_lophoc as $LH)
        @if($LH->khoi == $khoi && $LH->malophoc == $lop)
        @php
        $t = array_fill(0, count($listmonhoc), 0);
        $h = array_fill(0, count($listmonhoc), 0);
        $c = array_fill(0, count($listmonhoc), 0);
        @endphp
        <tr>
          <th rowspan="3">{{$loop->iteration}}</th>
          <th rowspan="3">{{$LH->tenlophoc}}</th>
          <th rowspan="3">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>T</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop0 = $loop->iteration - 1 @endphp
          @foreach($list_T as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->mamonhoc == $MH->mamonhoc)
            @php $t[$loop0] = $t[$loop0] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$t[$loop0]}}</th>
          <th>{{intval($t[$loop0] * 100 / $LH->siso)}}</th>
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>H</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop1 = $loop->iteration - 1 @endphp
          @foreach($list_H as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->mamonhoc == $MH->mamonhoc)
            @php $h[$loop1] = $h[$loop1] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$h[$loop1]}}</th>
          <th>{{intval($h[$loop1] * 100 / $LH->siso)}}</th>
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>C</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration - 1 @endphp
          @foreach($list_C as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $c[$loop2] = $c[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$c[$loop2]}}</th>
          <th>{{intval($c[$loop2] * 100 / $LH->siso)}}</th>
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        @endif
        @endforeach
        
        @else
        @foreach($data_lophoc as $LH)
        @if($LH->khoi == $khoi)
        @php
        $t = array_fill(0, count($listmonhoc), 0);
        $h = array_fill(0, count($listmonhoc), 0);
        $c = array_fill(0, count($listmonhoc), 0);
        @endphp
        <tr>
          <th rowspan="3">{{$loop->iteration}}</th>
          <th rowspan="3">{{$LH->tenlophoc}}</th>
          <th rowspan="3">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>T</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop0 = $loop->iteration - 1 @endphp
          @foreach($list_T as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->mamonhoc == $MH->mamonhoc)
            @php $t[$loop0] = $t[$loop0] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$t[$loop0]}}</th>
          <th>{{intval($t[$loop0] * 100 / $LH->siso)}}</th>
          @php $t_khoi[$loop->iteration - 1] = $t_khoi[$loop->iteration - 1] + $t[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>H</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop1 = $loop->iteration - 1 @endphp
          @foreach($list_H as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->mamonhoc == $MH->mamonhoc)
            @php $h[$loop1] = $h[$loop1] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$h[$loop1]}}</th>
          <th>{{intval($h[$loop1] * 100 / $LH->siso)}}</th>
          @php $h_khoi[$loop->iteration - 1] = $h_khoi[$loop->iteration - 1] + $h[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>C</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration - 1 @endphp
          @foreach($list_C as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $c[$loop2] = $c[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$c[$loop2]}}</th>
          <th>{{intval($c[$loop2] * 100 / $LH->siso)}}</th>
          @php $c_khoi[$loop->iteration - 1] = $c_khoi[$loop->iteration - 1] + $c[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        @endif
        @endforeach
        <tr>
          <th rowspan="3" style="color: blue">Khối</th>
          <th rowspan="3" style="color: blue">Khối {{$khoi}}</th>
          <th rowspan="3" style="color: blue">{{$sisokhoi}}</th>
          <th  style="color: blue">T</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$t_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($t_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">H</th>
         @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$h_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($h_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">C</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$c_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($c_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        @endif

        @else

        @php
        $sisotruong=0;
        $t_truong = array_fill(0, count($listmonhoc), 0);
        $h_truong = array_fill(0, count($listmonhoc), 0);
        $c_truong = array_fill(0, count($listmonhoc), 0);
        @endphp
        @for ($i = 1; $i <= 5; $i++)
        @php
        $sisokhoi=0;
        $t_khoi = array_fill(0, count($listmonhoc), 0);
        $h_khoi = array_fill(0, count($listmonhoc), 0);
        $c_khoi = array_fill(0, count($listmonhoc), 0);
        @endphp
        @foreach($data_lophoc as $LH)
        @if($LH->khoi == $i)
        @php
        $t = array_fill(0, count($listmonhoc), 0);
        $h = array_fill(0, count($listmonhoc), 0);
        $c = array_fill(0, count($listmonhoc), 0);
        @endphp
        <tr>
          <th rowspan="3">{{$loop->iteration}}</th>
          <th rowspan="3">{{$LH->tenlophoc}}</th>
          <th rowspan="3">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>T</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop0 = $loop->iteration - 1 @endphp
          @foreach($list_T as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->mamonhoc == $MH->mamonhoc)
            @php $t[$loop0] = $t[$loop0] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$t[$loop0]}}</th>
          <th>{{intval($t[$loop0] * 100 / $LH->siso)}}</th>
          @php $t_khoi[$loop->iteration - 1] = $t_khoi[$loop->iteration - 1] + $t[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>H</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop1 = $loop->iteration- 1 @endphp
          @foreach($list_H as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->mamonhoc == $MH->mamonhoc)
            @php $h[$loop1] = $h[$loop1] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$h[$loop1]}}</th>
          <th>{{intval($h[$loop1] * 100 / $LH->siso)}}</th>
          @php $h_khoi[$loop->iteration- 1] = $h_khoi[$loop->iteration- 1] + $h[$loop->iteration- 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>C</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration- 1 @endphp
          @foreach($list_C as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $c[$loop2] = $c[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$c[$loop2]}}</th>
          <th>{{intval($c[$loop2] * 100 / $LH->siso)}}</th>
          @php $c_khoi[$loop->iteration- 1] = $c_khoi[$loop->iteration- 1] + $c[$loop->iteration- 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        @endif
        @endforeach
        <tr>
          <th rowspan="3" style="color: blue">Khối</th>
          <th rowspan="3" style="color: blue">Khối {{$i}}</th>
          <th rowspan="3" style="color: blue">{{$sisokhoi}}</th>
          @php $sisotruong = $sisotruong + $sisokhoi @endphp
          <th  style="color: blue">T</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$t_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($t_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $t_truong[$loop->iteration- 1] += $t_khoi[$loop->iteration- 1] @endphp
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">H</th>
         @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$h_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($h_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $h_truong[$loop->iteration- 1] += $h_khoi[$loop->iteration- 1] @endphp
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">C</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$c_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($c_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $c_truong[$loop->iteration- 1] += $c_khoi[$loop->iteration- 1] @endphp
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        @endfor
        <tr>
          <th rowspan="3" style="color: red">Trường</th>
          <th rowspan="3" style="color: red">Tổng số</th>
          <th rowspan="3" style="color: red">{{$sisotruong}}</th>
          <th style="color: red">T</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$t_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($t_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: red">H</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$h_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($h_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: red">C</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$c_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($c_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endforeach
          @endif
        </tr>
        @endif
        </tbody>
      </table>
    </div>
    
    <!--end table-->

  </div>
</div>
<!-- /.container-fluid -->
</div>
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

<script src="js/thongkemdd.js"></script>

</body>

</html>