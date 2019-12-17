<table class="table table-bordered table-striped" id="table_thongkemucdatduoc">
        <thead style="background-color: black; color: white;">
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