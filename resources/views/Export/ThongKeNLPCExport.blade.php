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

        @if($khoi != 'Tất cả' && $khoi)
        @php
        $sisokhoi=0;
        $t1_khoi = 0; $t2_khoi = 0; $t3_khoi=0; $t4_khoi=0; $t5_khoi=0; $t6_khoi=0; $t7_khoi=0;
        $h1_khoi = 0; $h2_khoi = 0; $h3_khoi=0; $h4_khoi=0; $h5_khoi=0; $h6_khoi=0; $h7_khoi=0;
        $c1_khoi = 0; $c2_khoi = 0; $c3_khoi=0; $c4_khoi=0; $c5_khoi=0; $c6_khoi=0; $c7_khoi=0;
        @endphp
        @if($lop != 'lopchontatca' && $lop)
        @foreach($data_lophoc as $LH)
        @if($LH->khoi == $khoi && $LH->malophoc == $lop)
        @php
        $t1 = 0; $t2 = 0; $t3=0; $t4=0; $t5=0; $t6=0; $t7=0;
        $h1 = 0; $h2 = 0; $h3=0; $h4=0; $h5=0; $h6=0; $h7=0;
        $c1 = 0; $c2 = 0; $c3=0; $c4=0; $c5=0; $c6=0; $c7=0;
        @endphp
        <tr>
          <th rowspan="3">{{$loop->iteration}}</th>
          <th rowspan="3">{{$LH->tenlophoc}}</th>
          <th rowspan="3">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>T</th>
          @if($LH->siso != 0)
          @foreach($list_T as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->tendanhgia == 'Tự phục vụ, tự quản')
            @php $t1 = $t1 + 1 @endphp
          @elseif ($T->tendanhgia == 'Hợp tác')
            @php $t2 = $t2 + 1 @endphp
          @elseif ($T->tendanhgia == 'Tự học và giải quyết vấn đề')
            @php $t3 = $t3 + 1 @endphp
          @elseif ($T->tendanhgia == 'Chăm học, chăm làm')
            @php $t4 = $t4 + 1 @endphp
          @elseif ($T->tendanhgia == 'Tự tin, trách nhiệm')
            @php $t5 = $t5 + 1 @endphp
          @elseif ($T->tendanhgia == 'Trung thực, kỉ luật')
            @php $t6 = $t6 + 1 @endphp
          @elseif ($T->tendanhgia == 'Đoàn kết, yêu thương')
            @php $t7 = $t7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$t1}}</th>
          <th>{{intval($t1 * 100 / $LH->siso)}}</th>
          <th>{{$t2}}</th>
          <th>{{intval($t2 * 100 / $LH->siso)}}</th>
          <th>{{$t3}}</th>
          <th>{{intval($t3 * 100 / $LH->siso)}}</th>
          <th>{{$t4}}</th>
          <th>{{intval($t4 * 100 / $LH->siso)}}</th>
          <th>{{$t5}}</th>
          <th>{{intval($t5 * 100 / $LH->siso)}}</th>
          <th>{{$t6}}</th>
          <th>{{intval($t6 * 100 / $LH->siso)}}</th>
          <th>{{$t7}}</th>
          <th>{{intval($t7 * 100 / $LH->siso)}}</th>
          @php
          $t1_khoi = $t1_khoi + $t1;
          $t2_khoi = $t2_khoi + $t2;
          $t3_khoi = $t3_khoi + $t3;
          $t4_khoi = $t4_khoi + $t4;
          $t5_khoi = $t5_khoi +  $t5;
          $t6_khoi = $t6_khoi + $t6;
          $t7_khoi = $t7_khoi + $t7;
          @endphp
          @else
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        <tr>
          <th>Đ</th>
          @if($LH->siso != 0)
          
          @foreach($list_H as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->tendanhgia == 'Tự phục vụ, tự quản')
            @php $h1 = $h1 + 1 @endphp
          @elseif ($H->tendanhgia == 'Hợp tác')
              @php $h2 = $h2 + 1 @endphp
          @elseif ($H->tendanhgia == 'Tự học và giải quyết vấn đề')
             @php $h3 = $h3 + 1 @endphp
          @elseif ($H->tendanhgia == 'Chăm học, chăm làm')
             @php $h4 = $h4 + 1 @endphp
          @elseif ($H->tendanhgia == 'Tự tin, trách nhiệm')
             @php $h5 = $h5 + 1 @endphp
          @elseif ($H->tendanhgia == 'Trung thực, kỉ luật')
              @php $h6 = $h6 + 1 @endphp
          @elseif ($H->tendanhgia == 'Đoàn kết, yêu thương')
             @php $h7 = $h7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$h1}}</th>
          <th>{{intval($h1 * 100 / $LH->siso)}}</th>
          <th>{{$h2}}</th>
          <th>{{intval($h2 * 100 / $LH->siso)}}</th>
          <th>{{$h3}}</th>
          <th>{{intval($h3 * 100 / $LH->siso)}}</th>
          <th>{{$h4}}</th>
          <th>{{intval($h4 * 100 / $LH->siso)}}</th>
          <th>{{$h5}}</th>
          <th>{{intval($h5 * 100 / $LH->siso)}}</th>
          <th>{{$h6}}</th>
          <th>{{intval($h6 * 100 / $LH->siso)}}</th>
          <th>{{$h7}}</th>
          <th>{{intval($h7 * 100 / $LH->siso)}}</th>
          @php
          $h1_khoi += $h1;
          $h2_khoi += $h2;
          $h3_khoi += $h3;
          $h4_khoi += $h4;
          $h5_khoi += $h5;
          $h6_khoi += $h6;
          $h7_khoi += $h7;
          @endphp
          @else
          <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        <tr>
          <th>C</th>
          @if($LH->siso != 0)
          
          @foreach($list_C as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->tendanhgia == 'Tự phục vụ, tự quản')
            @php $c1 = $c1 + 1 @endphp
          @elseif ($C->tendanhgia == 'Hợp tác')
            @php $c2 = $c2 + 1 @endphp
          @elseif ($C->tendanhgia == 'Tự học và giải quyết vấn đề')
            @php $c3 = $c3 + 1 @endphp
          @elseif ($C->tendanhgia == 'Chăm học, chăm làm')
            @php $c4 = $c4 + 1 @endphp
          @elseif ($C->tendanhgia == 'Tự tin, trách nhiệm')
            @php $c5 = $c5 + 1 @endphp
          @elseif ($C->tendanhgia == 'Trung thực, kỉ luật')
            @php $c6 = $c6 + 1 @endphp
          @elseif ($C->tendanhgia == 'Đoàn kết, yêu thương')
            @php $c7 = $c7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$c1}}</th>
          <th>{{intval($c1 * 100 / $LH->siso)}}</th>
          <th>{{$c2}}</th>
          <th>{{intval($c2 * 100 / $LH->siso)}}</th>
          <th>{{$c3}}</th>
          <th>{{intval($c3 * 100 / $LH->siso)}}</th>
          <th>{{$c4}}</th>
          <th>{{intval($c4 * 100 / $LH->siso)}}</th>
          <th>{{$c5}}</th>
          <th>{{intval($c5 * 100 / $LH->siso)}}</th>
          <th>{{$c6}}</th>
          <th>{{intval($c6 * 100 / $LH->siso)}}</th>
          <th>{{$c7}}</th>
          <th>{{intval($c7 * 100 / $LH->siso)}}</th>
          @php
          $c1_khoi += $c1;
          $c2_khoi += $c2;
          $c3_khoi += $c3;
          $c4_khoi += $c4;
          $c5_khoi += $c5;
          $c6_khoi += $c6;
          $c7_khoi += $c7;
          @endphp
          @else
          <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        @endif
        @endforeach
        

        @else
        @foreach($data_lophoc as $LH)
        @if($LH->khoi == $khoi)
        @php
        $t1 = 0; $t2 = 0; $t3=0; $t4=0; $t5=0; $t6=0; $t7=0;
        $h1 = 0; $h2 = 0; $h3=0; $h4=0; $h5=0; $h6=0; $h7=0;
        $c1 = 0; $c2 = 0; $c3=0; $c4=0; $c5=0; $c6=0; $c7=0;
        @endphp
        <tr>
          <th rowspan="3">{{$loop->iteration}}</th>
          <th rowspan="3">{{$LH->tenlophoc}}</th>
          <th rowspan="3">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>T</th>
          @if($LH->siso != 0)
          @foreach($list_T as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->tendanhgia == 'Tự phục vụ, tự quản')
            @php $t1 = $t1 + 1 @endphp
          @elseif ($T->tendanhgia == 'Hợp tác')
            @php $t2 = $t2 + 1 @endphp
          @elseif ($T->tendanhgia == 'Tự học và giải quyết vấn đề')
            @php $t3 = $t3 + 1 @endphp
          @elseif ($T->tendanhgia == 'Chăm học, chăm làm')
            @php $t4 = $t4 + 1 @endphp
          @elseif ($T->tendanhgia == 'Tự tin, trách nhiệm')
            @php $t5 = $t5 + 1 @endphp
          @elseif ($T->tendanhgia == 'Trung thực, kỉ luật')
            @php $t6 = $t6 + 1 @endphp
          @elseif ($T->tendanhgia == 'Đoàn kết, yêu thương')
            @php $t7 = $t7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$t1}}</th>
          <th>{{intval($t1 * 100 / $LH->siso)}}</th>
          <th>{{$t2}}</th>
          <th>{{intval($t2 * 100 / $LH->siso)}}</th>
          <th>{{$t3}}</th>
          <th>{{intval($t3 * 100 / $LH->siso)}}</th>
          <th>{{$t4}}</th>
          <th>{{intval($t4 * 100 / $LH->siso)}}</th>
          <th>{{$t5}}</th>
          <th>{{intval($t5 * 100 / $LH->siso)}}</th>
          <th>{{$t6}}</th>
          <th>{{intval($t6 * 100 / $LH->siso)}}</th>
          <th>{{$t7}}</th>
          <th>{{intval($t7 * 100 / $LH->siso)}}</th>
          @php
          $t1_khoi = $t1_khoi + $t1;
          $t2_khoi = $t2_khoi + $t2;
          $t3_khoi = $t3_khoi + $t3;
          $t4_khoi = $t4_khoi + $t4;
          $t5_khoi = $t5_khoi +  $t5;
          $t6_khoi = $t6_khoi + $t6;
          $t7_khoi = $t7_khoi + $t7;
          @endphp
          @else
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        <tr>
          <th>Đ</th>
          @if($LH->siso != 0)
          
          @foreach($list_H as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->tendanhgia == 'Tự phục vụ, tự quản')
            @php $h1 = $h1 + 1 @endphp
          @elseif ($H->tendanhgia == 'Hợp tác')
              @php $h2 = $h2 + 1 @endphp
          @elseif ($H->tendanhgia == 'Tự học và giải quyết vấn đề')
             @php $h3 = $h3 + 1 @endphp
          @elseif ($H->tendanhgia == 'Chăm học, chăm làm')
             @php $h4 = $h4 + 1 @endphp
          @elseif ($H->tendanhgia == 'Tự tin, trách nhiệm')
             @php $h5 = $h5 + 1 @endphp
          @elseif ($H->tendanhgia == 'Trung thực, kỉ luật')
              @php $h6 = $h6 + 1 @endphp
          @elseif ($H->tendanhgia == 'Đoàn kết, yêu thương')
             @php $h7 = $h7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$h1}}</th>
          <th>{{intval($h1 * 100 / $LH->siso)}}</th>
          <th>{{$h2}}</th>
          <th>{{intval($h2 * 100 / $LH->siso)}}</th>
          <th>{{$h3}}</th>
          <th>{{intval($h3 * 100 / $LH->siso)}}</th>
          <th>{{$h4}}</th>
          <th>{{intval($h4 * 100 / $LH->siso)}}</th>
          <th>{{$h5}}</th>
          <th>{{intval($h5 * 100 / $LH->siso)}}</th>
          <th>{{$h6}}</th>
          <th>{{intval($h6 * 100 / $LH->siso)}}</th>
          <th>{{$h7}}</th>
          <th>{{intval($h7 * 100 / $LH->siso)}}</th>
          @php
          $h1_khoi += $h1;
          $h2_khoi += $h2;
          $h3_khoi += $h3;
          $h4_khoi += $h4;
          $h5_khoi += $h5;
          $h6_khoi += $h6;
          $h7_khoi += $h7;
          @endphp
          @else
          <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        <tr>
          <th>C</th>
          @if($LH->siso != 0)
          
          @foreach($list_C as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->tendanhgia == 'Tự phục vụ, tự quản')
            @php $c1 = $c1 + 1 @endphp
          @elseif ($C->tendanhgia == 'Hợp tác')
            @php $c2 = $c2 + 1 @endphp
          @elseif ($C->tendanhgia == 'Tự học và giải quyết vấn đề')
            @php $c3 = $c3 + 1 @endphp
          @elseif ($C->tendanhgia == 'Chăm học, chăm làm')
            @php $c4 = $c4 + 1 @endphp
          @elseif ($C->tendanhgia == 'Tự tin, trách nhiệm')
            @php $c5 = $c5 + 1 @endphp
          @elseif ($C->tendanhgia == 'Trung thực, kỉ luật')
            @php $c6 = $c6 + 1 @endphp
          @elseif ($C->tendanhgia == 'Đoàn kết, yêu thương')
            @php $c7 = $c7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$c1}}</th>
          <th>{{intval($c1 * 100 / $LH->siso)}}</th>
          <th>{{$c2}}</th>
          <th>{{intval($c2 * 100 / $LH->siso)}}</th>
          <th>{{$c3}}</th>
          <th>{{intval($c3 * 100 / $LH->siso)}}</th>
          <th>{{$c4}}</th>
          <th>{{intval($c4 * 100 / $LH->siso)}}</th>
          <th>{{$c5}}</th>
          <th>{{intval($c5 * 100 / $LH->siso)}}</th>
          <th>{{$c6}}</th>
          <th>{{intval($c6 * 100 / $LH->siso)}}</th>
          <th>{{$c7}}</th>
          <th>{{intval($c7 * 100 / $LH->siso)}}</th>
          @php
          $c1_khoi += $c1;
          $c2_khoi += $c2;
          $c3_khoi += $c3;
          $c4_khoi += $c4;
          $c5_khoi += $c5;
          $c6_khoi += $c6;
          $c7_khoi += $c7;
          @endphp
          @else
          <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        @endif
        @endforeach
        <tr>
          <th rowspan="3" style="color: blue">Khối</th>
          <th rowspan="3" style="color: blue">Khối {{$khoi}}</th>
          <th rowspan="3" style="color: blue">{{$sisokhoi}}</th>
          <th style="color: blue">T</th>
          @if($sisokhoi != 0)
          <th style="color: blue">{{$t1_khoi}}</th>
          <th style="color: blue">{{intval($t1_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t2_khoi}}</th>
          <th style="color: blue">{{intval($t2_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t3_khoi}}</th>
          <th style="color: blue">{{intval($t3_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t4_khoi}}</th>
          <th style="color: blue">{{intval($t4_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t5_khoi}}</th>
          <th style="color: blue">{{intval($t5_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t6_khoi}}</th>
          <th style="color: blue">{{intval($t6_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t7_khoi}}</th>
          <th style="color: blue">{{intval($t7_khoi * 100 / $sisokhoi)}}</th>
          @else
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endif
        </tr>
        <tr>
          <th style="color: blue">Đ</th>
          @if($sisokhoi != 0)
          <th style="color: blue">{{$h1_khoi}}</th>
          <th style="color: blue">{{intval($h1_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h2_khoi}}</th>
          <th style="color: blue">{{intval($h2_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h3_khoi}}</th>
          <th style="color: blue">{{intval($h3_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h4_khoi}}</th>
          <th style="color: blue">{{intval($h4_khoi * 100 /$sisokhoi)}}</th>
          <th style="color: blue">{{$h5_khoi}}</th>
          <th style="color: blue">{{intval($h5_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h6_khoi}}</th>
          <th  style="color: blue">{{intval($h6_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h7_khoi}}</th>
          <th style="color: blue">{{intval($h7_khoi * 100 / $sisokhoi)}}</th>
          @else
          <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endif
        </tr>
        <tr>
          <th style="color: blue">C</th>
          @if($sisokhoi != 0)
          <th style="color: blue">{{$c1_khoi}}</th>
          <th style="color: blue">{{intval($c1_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c2_khoi}}</th>
          <th style="color: blue">{{intval($c2_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c3_khoi}}</th>
          <th style="color: blue">{{intval($c3_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c4_khoi}}</th>
          <th style="color: blue">{{intval($c4_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c5_khoi}}</th>
          <th style="color: blue">{{intval($c5_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c6_khoi}}</th>
          <th style="color: blue">{{intval($c6_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c7_khoi}}</th>
          <th style="color: blue">{{intval($c7_khoi * 100 / $sisokhoi)}}</th>
          @else
          <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endif
        </tr>

        @endif

        @else

        @php
        $sisotruong=0;
        $t1_truong = 0; $t2_truong = 0; $t3_truong=0; $t4_truong=0; $t5_truong=0; $t6_truong=0; $t7_truong=0;
        $h1_truong = 0; $h2_truong= 0; $h3_truong=0; $h4_truong=0; $h5_truong=0; $h6_truong=0; $h7_truong=0;
        $c1_truong = 0; $c2_truong = 0; $c3_truong=0; $c4_truong=0; $c5_truong=0; $c6_truong=0; $c7_truong=0;
        @endphp
        @for ($i = 1; $i <= 5; $i++)
        @php
        $sisokhoi=0;
        $t1_khoi = 0; $t2_khoi = 0; $t3_khoi=0; $t4_khoi=0; $t5_khoi=0; $t6_khoi=0; $t7_khoi=0;
        $h1_khoi = 0; $h2_khoi = 0; $h3_khoi=0; $h4_khoi=0; $h5_khoi=0; $h6_khoi=0; $h7_khoi=0;
        $c1_khoi = 0; $c2_khoi = 0; $c3_khoi=0; $c4_khoi=0; $c5_khoi=0; $c6_khoi=0; $c7_khoi=0;
        @endphp
        @foreach($data_lophoc as $LH)
        @if($LH->khoi == $i)
        @php
        $t1 = 0; $t2 = 0; $t3=0; $t4=0; $t5=0; $t6=0; $t7=0;
        $h1 = 0; $h2 = 0; $h3=0; $h4=0; $h5=0; $h6=0; $h7=0;
        $c1 = 0; $c2 = 0; $c3=0; $c4=0; $c5=0; $c6=0; $c7=0;
        @endphp
        <tr>
          <th rowspan="3">{{$loop->iteration}}</th>
          <th rowspan="3">{{$LH->tenlophoc}}</th>
          <th rowspan="3">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>T</th>
          @if($LH->siso != 0)
          @foreach($list_T as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->tendanhgia == 'Tự phục vụ, tự quản')
            @php $t1 = $t1 + 1 @endphp
          @elseif ($T->tendanhgia == 'Hợp tác')
            @php $t2 = $t2 + 1 @endphp
          @elseif ($T->tendanhgia == 'Tự học và giải quyết vấn đề')
            @php $t3 = $t3 + 1 @endphp
          @elseif ($T->tendanhgia == 'Chăm học, chăm làm')
            @php $t4 = $t4 + 1 @endphp
          @elseif ($T->tendanhgia == 'Tự tin, trách nhiệm')
            @php $t5 = $t5 + 1 @endphp
          @elseif ($T->tendanhgia == 'Trung thực, kỉ luật')
            @php $t6 = $t6 + 1 @endphp
          @elseif ($T->tendanhgia == 'Đoàn kết, yêu thương')
            @php $t7 = $t7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$t1}}</th>
          <th>{{intval($t1 * 100 / $LH->siso)}}</th>
          <th>{{$t2}}</th>
          <th>{{intval($t2 * 100 / $LH->siso)}}</th>
          <th>{{$t3}}</th>
          <th>{{intval($t3 * 100 / $LH->siso)}}</th>
          <th>{{$t4}}</th>
          <th>{{intval($t4 * 100 / $LH->siso)}}</th>
          <th>{{$t5}}</th>
          <th>{{intval($t5 * 100 / $LH->siso)}}</th>
          <th>{{$t6}}</th>
          <th>{{intval($t6 * 100 / $LH->siso)}}</th>
          <th>{{$t7}}</th>
          <th>{{intval($t7 * 100 / $LH->siso)}}</th>
          @php
          $t1_khoi = $t1_khoi + $t1;
          $t2_khoi = $t2_khoi + $t2;
          $t3_khoi = $t3_khoi + $t3;
          $t4_khoi = $t4_khoi + $t4;
          $t5_khoi = $t5_khoi +  $t5;
          $t6_khoi = $t6_khoi + $t6;
          $t7_khoi = $t7_khoi + $t7;
          @endphp
          @else
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        <tr>
          <th>Đ</th>
          @if($LH->siso != 0)
          
          @foreach($list_H as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->tendanhgia == 'Tự phục vụ, tự quản')
            @php $h1 = $h1 + 1 @endphp
          @elseif ($H->tendanhgia == 'Hợp tác')
              @php $h2 = $h2 + 1 @endphp
          @elseif ($H->tendanhgia == 'Tự học và giải quyết vấn đề')
             @php $h3 = $h3 + 1 @endphp
          @elseif ($H->tendanhgia == 'Chăm học, chăm làm')
             @php $h4 = $h4 + 1 @endphp
          @elseif ($H->tendanhgia == 'Tự tin, trách nhiệm')
             @php $h5 = $h5 + 1 @endphp
          @elseif ($H->tendanhgia == 'Trung thực, kỉ luật')
              @php $h6 = $h6 + 1 @endphp
          @elseif ($H->tendanhgia == 'Đoàn kết, yêu thương')
             @php $h7 = $h7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$h1}}</th>
          <th>{{intval($h1 * 100 / $LH->siso)}}</th>
          <th>{{$h2}}</th>
          <th>{{intval($h2 * 100 / $LH->siso)}}</th>
          <th>{{$h3}}</th>
          <th>{{intval($h3 * 100 / $LH->siso)}}</th>
          <th>{{$h4}}</th>
          <th>{{intval($h4 * 100 / $LH->siso)}}</th>
          <th>{{$h5}}</th>
          <th>{{intval($h5 * 100 / $LH->siso)}}</th>
          <th>{{$h6}}</th>
          <th>{{intval($h6 * 100 / $LH->siso)}}</th>
          <th>{{$h7}}</th>
          <th>{{intval($h7 * 100 / $LH->siso)}}</th>
          @php
          $h1_khoi += $h1;
          $h2_khoi += $h2;
          $h3_khoi += $h3;
          $h4_khoi += $h4;
          $h5_khoi += $h5;
          $h6_khoi += $h6;
          $h7_khoi += $h7;
          @endphp
          @else
          <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
          @endif
        </tr>
        <tr>
          <th>C</th>
          @if($LH->siso != 0)
          
          @foreach($list_C as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->tendanhgia == 'Tự phục vụ, tự quản')
            @php $c1 = $c1 + 1 @endphp
          @elseif ($C->tendanhgia == 'Hợp tác')
            @php $c2 = $c2 + 1 @endphp
          @elseif ($C->tendanhgia == 'Tự học và giải quyết vấn đề')
            @php $c3 = $c3 + 1 @endphp
          @elseif ($C->tendanhgia == 'Chăm học, chăm làm')
            @php $c4 = $c4 + 1 @endphp
          @elseif ($C->tendanhgia == 'Tự tin, trách nhiệm')
            @php $c5 = $c5 + 1 @endphp
          @elseif ($C->tendanhgia == 'Trung thực, kỉ luật')
            @php $c6 = $c6 + 1 @endphp
          @elseif ($C->tendanhgia == 'Đoàn kết, yêu thương')
            @php $c7 = $c7 + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$c1}}</th>
          <th>{{intval($c1 * 100 / $LH->siso)}}</th>
          <th>{{$c2}}</th>
          <th>{{intval($c2 * 100 / $LH->siso)}}</th>
          <th>{{$c3}}</th>
          <th>{{intval($c3 * 100 / $LH->siso)}}</th>
          <th>{{$c4}}</th>
          <th>{{intval($c4 * 100 / $LH->siso)}}</th>
          <th>{{$c5}}</th>
          <th>{{intval($c5 * 100 / $LH->siso)}}</th>
          <th>{{$c6}}</th>
          <th>{{intval($c6 * 100 / $LH->siso)}}</th>
          <th>{{$c7}}</th>
          <th>{{intval($c7 * 100 / $LH->siso)}}</th>
          @php
          $c1_khoi += $c1;
          $c2_khoi += $c2;
          $c3_khoi += $c3;
          $c4_khoi += $c4;
          $c5_khoi += $c5;
          $c6_khoi += $c6;
          $c7_khoi += $c7;
          @endphp
          @else
          <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
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
          <th style="color: blue">{{$t1_khoi}}</th>
          <th style="color: blue">{{intval($t1_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t2_khoi}}</th>
          <th style="color: blue">{{intval($t2_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t3_khoi}}</th>
          <th style="color: blue">{{intval($t3_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t4_khoi}}</th>
          <th style="color: blue">{{intval($t4_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t5_khoi}}</th>
          <th style="color: blue">{{intval($t5_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t6_khoi}}</th>
          <th style="color: blue">{{intval($t6_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$t7_khoi}}</th>
          <th style="color: blue">{{intval($t7_khoi * 100 / $sisokhoi)}}</th>
          @php
          $t1_truong += $t1_khoi;
          $t2_truong += $t2_khoi;
          $t3_truong += $t3_khoi;
          $t4_truong += $t4_khoi;
          $t5_truong += $t5_khoi;
          $t6_truong += $t6_khoi;
          $t7_truong += $t7_khoi;
          @endphp
          @else
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endif
        </tr>
        <tr>
          <th style="color: blue">Đ</th>
          @if($sisokhoi != 0)
          <th style="color: blue">{{$h1_khoi}}</th>
          <th style="color: blue">{{intval($h1_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h2_khoi}}</th>
          <th style="color: blue">{{intval($h2_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h3_khoi}}</th>
          <th style="color: blue">{{intval($h3_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h4_khoi}}</th>
          <th style="color: blue">{{intval($h4_khoi * 100 /$sisokhoi)}}</th>
          <th style="color: blue">{{$h5_khoi}}</th>
          <th style="color: blue">{{intval($h5_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h6_khoi}}</th>
          <th style="color: blue">{{intval($h6_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$h7_khoi}}</th>
          <th style="color: blue">{{intval($h7_khoi * 100 / $sisokhoi)}}</th>
          @php
          $h1_truong += $h1_khoi;
          $h2_truong += $h2_khoi;
          $h3_truong += $h3_khoi;
          $h4_truong += $h4_khoi;
          $h5_truong += $h5_khoi;
          $h6_truong += $h6_khoi;
          $h7_truong += $h7_khoi;
          @endphp
          @else
          <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endif
        </tr>
        <tr>
          <th style="color: blue">C</th>
          @if($sisokhoi != 0)
          <th style="color: blue">{{$c1_khoi}}</th>
          <th style="color: blue">{{intval($c1_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c2_khoi}}</th>
          <th style="color: blue">{{intval($c2_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c3_khoi}}</th>
          <th style="color: blue">{{intval($c3_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c4_khoi}}</th>
          <th style="color: blue">{{intval($c4_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c5_khoi}}</th>
          <th style="color: blue">{{intval($c5_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c6_khoi}}</th>
          <th style="color: blue">{{intval($c6_khoi * 100 / $sisokhoi)}}</th>
          <th style="color: blue">{{$c7_khoi}}</th>
          <th style="color: blue">{{intval($c7_khoi * 100 / $sisokhoi)}}</th>
          @php
          $c1_truong += $c1_khoi;
          $c2_truong += $c2_khoi;
          $c3_truong += $c3_khoi;
          $c4_truong += $c4_khoi;
          $c5_truong += $c5_khoi;
          $c6_truong += $c6_khoi;
          $c7_truong += $c7_khoi;
          @endphp
          @else
          <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endif
        </tr>
        @endfor
        <tr>
          <th rowspan="3" style="color: red">Trường</th>
          <th rowspan="3" style="color: red">Tổng số</th>
          <th rowspan="3" style="color: red">{{$sisotruong}}</th>
          <th style="color: red">T</th>
          @if($sisotruong != 0)
          <th style="color: red">{{$t1_truong}}</th>
          <th style="color: red">{{intval($t1_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$t2_truong}}</th>
          <th style="color: red">{{intval($t2_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$t3_truong}}</th>
          <th style="color: red">{{intval($t3_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$t4_truong}}</th>
          <th style="color: red">{{intval($t4_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$t5_truong}}</th>
          <th style="color: red">{{intval($t5_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$t6_truong}}</th>
          <th style="color: red">{{intval($t6_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$t7_truong}}</th>
          <th style="color: red">{{intval($t7_truong * 100 / $sisotruong)}}</th>
          @else
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endif
        </tr>
        <tr>
          <th style="color: red">Đ</th>
          @if($sisotruong != 0)
          <th style="color: red">{{$h1_truong}}</th>
          <th style="color: red">{{intval($h1_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$h2_truong}}</th>
          <th style="color: red">{{intval($h2_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$h3_truong}}</th>
          <th style="color: red">{{intval($h3_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$h4_truong}}</th>
          <th style="color: red">{{intval($h4_truong * 100 /$sisotruong)}}</th>
          <th style="color: red">{{$h5_truong}}</th>
          <th style="color: red">{{intval($h5_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$h6_truong}}</th>
          <th style="color: red">{{intval($h6_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$h7_truong}}</th>
          <th style="color: red">{{intval($h7_truong * 100 / $sisotruong)}}</th>
          @else
          <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endif
        </tr>
        <tr>
          <th style="color: red">C</th>
          @if($sisotruong != 0)
          <th style="color: red">{{$c1_truong}}</th>
          <th style="color: red">{{intval($c1_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$c2_truong}}</th>
          <th style="color: red">{{intval($c2_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$c3_truong}}</th>
          <th style="color: red">{{intval($c3_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$c4_truong}}</th>
          <th style="color: red">{{intval($c4_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$c5_truong}}</th>
          <th style="color: red">{{intval($c5_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$c6_truong}}</th>
          <th style="color: red">{{intval($c6_truong * 100 / $sisotruong)}}</th>
          <th style="color: red">{{$c7_truong}}</th>
          <th style="color: red">{{intval($c7_truong * 100 / $sisotruong)}}</th>
          @else
          <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endif
        </tr>
        @endif
        </tbody>
      </table>