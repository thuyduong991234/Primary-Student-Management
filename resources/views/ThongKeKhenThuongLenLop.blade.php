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
              <h5>5.3 Thống kê khen thưởng, lên lớp</h5>
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
      </div>

    <!--End area button-->
    <script type="text/javascript">
    </script>
    <!--table thong ke khen thuong-->
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table_thongkekhenthuong">
        <thead style="background-color: #293c74; color: white;">
          <tr>
            <th rowspan="2">STT</th>
            <th rowspan="2">Lớp</th>
            <th rowspan="2">Sỉ số</th>
            <th colspan="2">Khen thưởng cuối năm</th>
            <th colspan="2">Khen thưởng đột xuất</th> 
            <th colspan="2">Lên lớp</th>
            <th colspan="2">Hoàn thành chương trình lớp học</th>
            <th colspan="2">Lưu ban</th>
          </tr>
          <tr>
            <th>SL</th>
            <th>TL (%)</th>
            <th>SL</th>
            <th>TL (%)</th>
            <th>SL</th>
            <th>TL (%)</th>
            <th>SL</th>
            <th>TL (%)</th>
            <th>SL</th>
            <th>TL (%)</th>
          </tr>
        </thead>
        <tbody style="background-color: white; color: black; overflow: auto;">
          @php
          $sisotruong=0; 
          $slktcn_truong = 0; $slktdx_truong = 0; $sllenlop_truong = 0; $slhtctlh_truong = 0; $slluuban_truong = 0;
          @endphp
          @if($khoi != 'Tất cả' && $khoi)  
          @if($lop != 'lopchontatca' && $lop)
          @foreach($data_lophoc as $LH)
          @if($LH->khoi == $khoi && $LH->malophoc == $lop)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th scope="row">{{$LH->tenlophoc}}</th>
            <th scope="row">{{$LH->siso}}</th>
            @php $flag = 0 @endphp 
            @foreach($list_khenthuong as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slkhenthuong}}</th>
            <th scope="row">{{intval(($KT->slkhenthuong*100)/$LH->siso)}}</th>
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_ktdx as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slktdx}}</th>
            <th scope="row">{{intval(($KT->slktdx*100)/$LH->siso)}}</th>
            
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_lenlop as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->sllenlop}}</th>
            <th scope="row">{{intval(($KT->sllenlop*100)/$LH->siso)}}</th>
            
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_hoanthanhctlh as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slhoanthanhctlh}}</th>
            <th scope="row">{{intval(($KT->slhoanthanhctlh*100)/$LH->siso)}}</th>
            
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_luuban as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slluuban}}</th>
            <th scope="row">{{intval(($KT->slluuban*100)/$LH->siso)}}</th>
           
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif
          </tr>
          @endif
          @endforeach


          @else
          @php
          $sisokhoi=0; 
          $slktcn = 0; $slktdx = 0; $sllenlop = 0; $slhtctlh = 0; $slluuban = 0;  
          @endphp
          @foreach($data_lophoc as $LH)
          @if($LH->khoi == $khoi)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th scope="row">{{$LH->tenlophoc}}</th>
            <th scope="row">{{$LH->siso}}</th> 
            @php $flag = 0; $sisokhoi = $sisokhoi + $LH->siso; @endphp
            @foreach($list_khenthuong as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slkhenthuong}}</th>
            <th scope="row">{{intval(($KT->slkhenthuong*100)/$LH->siso)}}</th>
            @php 
            $slktcn = $slktcn + $KT->slkhenthuong;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_ktdx as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slktdx}}</th>
            <th scope="row">{{intval(($KT->slktdx*100)/$LH->siso)}}</th>
            @php 
            $slktdx = $slktdx + $KT->slktdx;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_lenlop as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->sllenlop}}</th>
            <th scope="row">{{intval(($KT->sllenlop*100)/$LH->siso)}}</th>
            @php 
            $sllenlop = $sllenlop + $KT->sllenlop;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_hoanthanhctlh as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slhoanthanhctlh}}</th>
            <th scope="row">{{intval(($KT->slhoanthanhctlh*100)/$LH->siso)}}</th>
            @php 
            $slhtctlh = $slhtctlh + $KT->slhoanthanhctlh;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_luuban as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slluuban}}</th>
            <th scope="row">{{intval(($KT->slluuban*100)/$LH->siso)}}</th>
            @php 
            $slluuban = $slluuban + $KT->slluuban;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif
          </tr>
          @endif
          @endforeach
          <tr>
            <th scope="row" style="color: blue">Khối</th>
            <th scope="row" style="color: blue">Khối {{$khoi}}</th>
            <th scope="row" style="color: blue">{{$sisokhoi}}</th>
            @if($sisokhoi == 0)
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            @else 
            <th scope="row" style="color: blue">{{$slktcn}}</th>
            <th scope="row" style="color: blue">{{intval($slktcn*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$slktdx}}</th>
            <th scope="row" style="color: blue">{{intval($slktdx*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$sllenlop}}</th>
            <th scope="row" style="color: blue">{{intval($sllenlop*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$slhtctlh}}</th>
            <th scope="row" style="color: blue">{{intval($slhtctlh*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$slluuban}}</th>
            <th scope="row" style="color: blue">{{intval($slluuban*100/$sisokhoi)}}</th>
            @endif
          </tr>

          @endif
          @else
          @for ($i = 1; $i <= 5; $i++)
          @php
          $sisokhoi=0; 
          $slktcn = 0; $slktdx = 0; $sllenlop = 0; $slhtctlh = 0; $slluuban = 0;  
          @endphp
          @foreach($data_lophoc as $LH)
          @if($LH->khoi == $i)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th scope="row">{{$LH->tenlophoc}}</th>
            <th scope="row">{{$LH->siso}}</th> 
            @php $flag = 0; $sisokhoi = $sisokhoi + $LH->siso; @endphp
            @foreach($list_khenthuong as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slkhenthuong}}</th>
            <th scope="row">{{intval(($KT->slkhenthuong*100)/$LH->siso)}}</th>
            @php 
            $slktcn = $slktcn + $KT->slkhenthuong;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_ktdx as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slktdx}}</th>
            <th scope="row">{{intval(($KT->slktdx*100)/$LH->siso)}}</th>
            @php 
            $slktdx = $slktdx + $KT->slktdx;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_lenlop as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->sllenlop}}</th>
            <th scope="row">{{intval(($KT->sllenlop*100)/$LH->siso)}}</th>
            @php 
            $sllenlop = $sllenlop + $KT->sllenlop;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_hoanthanhctlh as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slhoanthanhctlh}}</th>
            <th scope="row">{{intval(($KT->slhoanthanhctlh*100)/$LH->siso)}}</th>
            @php 
            $slhtctlh = $slhtctlh + $KT->slhoanthanhctlh;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif

            @php $flag = 0 @endphp
            @foreach($list_luuban as $KT)
            @if($KT->malophoc == $LH->malophoc)
            @php $flag = 1 @endphp
            <th scope="row">{{$KT->slluuban}}</th>
            <th scope="row">{{intval(($KT->slluuban*100)/$LH->siso)}}</th>
            @php 
            $slluuban = $slluuban + $KT->slluuban;
            @endphp
            @endif
            @endforeach
            @if($flag == 0)
            <th scope="row">0</th>
            <th scope="row">0</th>
            @endif
          </tr>
          @endif
          @endforeach
          <tr>
            <th scope="row" style="color: blue">Khối</th>
            <th scope="row" style="color: blue">Khối {{$i}}</th>
            <th scope="row" style="color: blue">{{$sisokhoi}}</th>
            @if($sisokhoi == 0)
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            <th scope="row" style="color: blue">0</th>
            @else 
            <th scope="row" style="color: blue">{{$slktcn}}</th>
            <th scope="row" style="color: blue">{{intval($slktcn*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$slktdx}}</th>
            <th scope="row" style="color: blue">{{intval($slktdx*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$sllenlop}}</th>
            <th scope="row" style="color: blue">{{intval($sllenlop*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$slhtctlh}}</th>
            <th scope="row" style="color: blue">{{intval($slhtctlh*100/$sisokhoi)}}</th>
            <th scope="row" style="color: blue">{{$slluuban}}</th>
            <th scope="row" style="color: blue">{{intval($slluuban*100/$sisokhoi)}}</th>
            @endif
            @php
            $sisotruong = $sisotruong + $sisokhoi;
            $slktcn_truong = $slktcn_truong + $slktcn;
            $slktdx_truong = $slktdx_truong + $slktdx;
            $sllenlop_truong = $sllenlop_truong + $sllenlop;
            $slhtctlh_truong = $slhtctlh_truong + $slhtctlh;
            $slluuban_truong = $slluuban_truong + $slluuban;
            @endphp
          </tr>
          @endfor
          <tr>
            <th scope="row" style="color: red">Trường</th>
            <th scope="row" style="color: red">Tổng số</th>
            <th scope="row" style="color: red">{{$sisotruong}}</th> 
            <th scope="row" style="color: red">{{$slktcn_truong}}</th>
            <th scope="row" style="color: red">{{intval($slktcn_truong*100/$sisotruong)}}</th>
            <th scope="row" style="color: red">{{$slktdx_truong}}</th>
            <th scope="row" style="color: red">{{intval($slktdx_truong*100/$sisotruong)}}</th>
            <th scope="row" style="color: red">{{$sllenlop_truong}}</th>
            <th scope="row" style="color: red">{{intval($sllenlop_truong*100/$sisotruong)}}</th>
            <th scope="row" style="color: red">{{$slhtctlh_truong}}</th>
            <th scope="row" style="color: red">{{intval($slhtctlh_truong*100/$sisotruong)}}</th>
            <th scope="row" style="color: red">{{$slluuban_truong}}</th>
            <th scope="row" style="color: red">{{intval($slluuban_truong*100/$sisotruong)}}</th>
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

<script src="js/tkkhenthuonglenlop.js"></script>

</body>

</html>