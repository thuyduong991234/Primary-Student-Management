<table class="table table-bordered table-striped" id="table_thongkemucdatduoc">
        <thead style="background-color: black; color: white;">
          <tr>
            <th rowspan="2">STT</th>
            <th rowspan="2">Lớp</th>
            <th rowspan="2">Sỉ số</th>
            <th rowspan="2">Phổ điểm</th>
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
        $diem109_khoi = array_fill(0, count($listmonhoc), 0);
        $diem87_khoi = array_fill(0, count($listmonhoc), 0);
        $diem65_khoi = array_fill(0, count($listmonhoc), 0);
        $diemduoi5_khoi = array_fill(0, count($listmonhoc), 0);
        @endphp
        @if($lop != 'lopchontatca' && $lop)
                @foreach($data_lophoc as $LH)
        @if($LH->khoi == $khoi && $LH->malophoc == $lop)
        @php
        $diem109 = array_fill(0, count($listmonhoc), 0);
        $diem87 = array_fill(0, count($listmonhoc), 0);
        $diem65 = array_fill(0, count($listmonhoc), 0);
        $diemduoi5 = array_fill(0, count($listmonhoc), 0);
        @endphp
        <tr>
          <th rowspan="4">{{$loop->iteration}}</th>
          <th rowspan="4">{{$LH->tenlophoc}}</th>
          <th rowspan="4">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>10 - 9</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop0 = $loop->iteration - 1 @endphp
          @foreach($list_109 as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->mamonhoc == $MH->mamonhoc)
            @php $diem109[$loop0] = $diem109[$loop0] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem109[$loop0]}}</th>
          <th>{{intval($diem109[$loop0] * 100 / $LH->siso)}}</th>
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>8 - 7</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop1 = $loop->iteration - 1 @endphp
          @foreach($list_87 as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->mamonhoc == $MH->mamonhoc)
            @php $diem87[$loop1] = $diem87[$loop1] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem87[$loop1]}}</th>
          <th>{{intval($diem87[$loop1] * 100 / $LH->siso)}}</th>
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>6 - 5</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration - 1 @endphp
          @foreach($list_65 as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $diem65[$loop2] = $diem65[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem65[$loop2]}}</th>
          <th>{{intval($diem65[$loop2] * 100 / $LH->siso)}}</th>
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>Dưới 5</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration - 1 @endphp
          @foreach($list_duoi5 as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $diemduoi5[$loop2] = $diemduoi5[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diemduoi5[$loop2]}}</th>
          <th>{{intval($diemduoi5[$loop2] * 100 / $LH->siso)}}</th>
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
        $diem109 = array_fill(0, count($listmonhoc), 0);
        $diem87 = array_fill(0, count($listmonhoc), 0);
        $diem65 = array_fill(0, count($listmonhoc), 0);
        $diemduoi5 = array_fill(0, count($listmonhoc), 0);
        @endphp
        <tr>
          <th rowspan="4">{{$loop->iteration}}</th>
          <th rowspan="4">{{$LH->tenlophoc}}</th>
          <th rowspan="4">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>10 - 9</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop0 = $loop->iteration - 1 @endphp
          @foreach($list_109 as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->mamonhoc == $MH->mamonhoc)
            @php $diem109[$loop0] = $diem109[$loop0] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem109[$loop0]}}</th>
          <th>{{intval($diem109[$loop0] * 100 / $LH->siso)}}</th>
          @php $diem109_khoi[$loop->iteration - 1] = $diem109_khoi[$loop->iteration - 1] + $diem109[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>8 - 7</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop1 = $loop->iteration - 1 @endphp
          @foreach($list_87 as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->mamonhoc == $MH->mamonhoc)
            @php $diem87[$loop1] = $diem87[$loop1] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem87[$loop1]}}</th>
          <th>{{intval($diem87[$loop1] * 100 / $LH->siso)}}</th>
          @php $diem87_khoi[$loop->iteration - 1] = $diem87_khoi[$loop->iteration - 1] + $diem87[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>6 - 5</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration - 1 @endphp
          @foreach($list_65 as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $diem65[$loop2] = $diem65[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem65[$loop2]}}</th>
          <th>{{intval($diem65[$loop2] * 100 / $LH->siso)}}</th>
          @php $diem65_khoi[$loop->iteration - 1] = $diem65_khoi[$loop->iteration - 1] + $diem65[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>Dưới 5</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration - 1 @endphp
          @foreach($list_duoi5 as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $diemduoi5[$loop2] = $diemduoi5[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diemduoi5[$loop2]}}</th>
          <th>{{intval($diemduoi5[$loop2] * 100 / $LH->siso)}}</th>
          @php $diemduoi5_khoi[$loop->iteration - 1] = $diemduoi5_khoi[$loop->iteration - 1] + $diemduoi5[$loop->iteration - 1] @endphp
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
          <th rowspan="4" style="color: blue">Khối</th>
          <th rowspan="4" style="color: blue">Khối {{$khoi}}</th>
          <th rowspan="4" style="color: blue">{{$sisokhoi}}</th>
          <th  style="color: blue">10 - 9</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diem109_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($diem109_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">8 - 7</th>
         @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diem87_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($diem87_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">6 - 5</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diem65_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($diem65_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">Dưới 5</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diemduoi5_khoi[$loop->iteration - 1]}}</th>
          <th style="color: blue">{{intval($diemduoi5_khoi[$loop->iteration - 1] * 100 / $sisokhoi)}}</th>
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
        $diem109_truong = array_fill(0, count($listmonhoc), 0);
        $diem87_truong = array_fill(0, count($listmonhoc), 0);
        $diem65_truong = array_fill(0, count($listmonhoc), 0);
        $diemduoi5_truong = array_fill(0, count($listmonhoc), 0);
        @endphp
        @for ($i = 1; $i <= 5; $i++)
        @php
       $sisokhoi=0;
        $diem109_khoi = array_fill(0, count($listmonhoc), 0);
        $diem87_khoi = array_fill(0, count($listmonhoc), 0);
        $diem65_khoi = array_fill(0, count($listmonhoc), 0);
        $diemduoi5_khoi = array_fill(0, count($listmonhoc), 0);
        @endphp
        @foreach($data_lophoc as $LH)
        @if($LH->khoi == $i)
        @php
        $diem109 = array_fill(0, count($listmonhoc), 0);
        $diem87 = array_fill(0, count($listmonhoc), 0);
        $diem65 = array_fill(0, count($listmonhoc), 0);
        $diemduoi5 = array_fill(0, count($listmonhoc), 0);
        @endphp
        <tr>
          <th rowspan="4">{{$loop->iteration}}</th>
          <th rowspan="4">{{$LH->tenlophoc}}</th>
          <th rowspan="4">{{$LH->siso}}</th>
          @php $sisokhoi = $sisokhoi + $LH->siso @endphp
          <th>10 - 9</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop0 = $loop->iteration - 1 @endphp
          @foreach($list_109 as $T)
          @if($T->malophoc == $LH->malophoc)
          @if($T->mamonhoc == $MH->mamonhoc)
            @php $diem109[$loop0] = $diem109[$loop0] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem109[$loop0]}}</th>
          <th>{{intval($diem109[$loop0] * 100 / $LH->siso)}}</th>
          @php $diem109_khoi[$loop->iteration - 1] = $diem109_khoi[$loop->iteration - 1] + $diem109[$loop->iteration - 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>8 - 7</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop1 = $loop->iteration- 1 @endphp
          @foreach($list_87 as $H)
          @if($H->malophoc == $LH->malophoc)
          @if($H->mamonhoc == $MH->mamonhoc)
            @php $diem87[$loop1] = $diem87[$loop1] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem87[$loop1]}}</th>
          <th>{{intval($diem87[$loop1] * 100 / $LH->siso)}}</th>
          @php $diem87_khoi[$loop->iteration- 1] = $diem87_khoi[$loop->iteration- 1] + $diem87[$loop->iteration- 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>6 - 5</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration- 1 @endphp
          @foreach($list_65 as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $diem65[$loop2] = $diem65[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diem65[$loop2]}}</th>
          <th>{{intval($diem65[$loop2] * 100 / $LH->siso)}}</th>
          @php $diem65_khoi[$loop->iteration- 1] = $diem65_khoi[$loop->iteration- 1] + $diem65[$loop->iteration- 1] @endphp
          @endforeach
          @else
            @foreach($listmonhoc as $MH)
            <th>0</th>
            <th>0</th>
            @endforeach
          @endif
        </tr>
        <tr>
          <th>Dưới 5</th>
          @if($LH->siso != 0)
          @foreach($listmonhoc as $MH)
          @php $loop2 = $loop->iteration- 1 @endphp
          @foreach($list_duoi5 as $C)
          @if($C->malophoc == $LH->malophoc)
          @if($C->mamonhoc == $MH->mamonhoc)
            @php $diemduoi5[$loop2] = $diemduoi5[$loop2] + 1 @endphp
          @endif
          @endif
          @endforeach
          <th>{{$diemduoi5[$loop2]}}</th>
          <th>{{intval($diemduoi5[$loop2] * 100 / $LH->siso)}}</th>
          @php $diemduoi5_khoi[$loop->iteration- 1] = $diemduoi5_khoi[$loop->iteration- 1] + $diemduoi5[$loop->iteration- 1] @endphp
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
          <th rowspan="4" style="color: blue">Khối</th>
          <th rowspan="4" style="color: blue">Khối {{$i}}</th>
          <th rowspan="4" style="color: blue">{{$sisokhoi}}</th>
          @php $sisotruong = $sisotruong + $sisokhoi @endphp
          <th  style="color: blue">10 - 9</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diem109_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($diem109_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $diem109_truong[$loop->iteration- 1] += $diem109_khoi[$loop->iteration- 1] @endphp
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">8 - 7</th>
         @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diem87_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($diem87_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $diem87_truong[$loop->iteration- 1] += $diem87_khoi[$loop->iteration- 1] @endphp
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">6 - 5</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diem65_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($diem65_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $diem65_truong[$loop->iteration- 1] += $diem65_khoi[$loop->iteration- 1] @endphp
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: blue">0</th>
            <th style="color: blue">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: blue">Dưới 5</th>
          @if($sisokhoi != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: blue">{{$diemduoi5_khoi[$loop->iteration- 1]}}</th>
          <th style="color: blue">{{intval($diemduoi5_khoi[$loop->iteration- 1] * 100 / $sisokhoi)}}</th>
          @php $diemduoi5_truong[$loop->iteration- 1] += $diemduoi5_khoi[$loop->iteration- 1] @endphp
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
          <th rowspan="4" style="color: red">Trường</th>
          <th rowspan="4" style="color: red">Tổng số</th>
          <th rowspan="4" style="color: red">{{$sisotruong}}</th>
          <th style="color: red">10 - 9</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$diem109_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($diem109_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: red">8 - 7</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$diem87_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($diem87_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: red">6 - 5</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$diem65_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($diem65_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
          @endforeach
          @else
          @foreach($listmonhoc as $MH)
            <th style="color: red">0</th>
            <th style="color: red">0</th>
          @endforeach
          @endif
        </tr>
        <tr>
          <th style="color: red">Dưới 5</th>
          @if($sisotruong != 0)
          @foreach($listmonhoc as $MH)
          <th style="color: red">{{$diemduoi5_truong[$loop->iteration- 1]}}</th>
          <th style="color: red">{{intval($diemduoi5_truong[$loop->iteration- 1] * 100 / $sisotruong)}}</th>
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