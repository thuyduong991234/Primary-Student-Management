<table class="table table-bordered table-striped" id="table_thongkekhenthuong">
        <thead style="background-color: black; color: white;">
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