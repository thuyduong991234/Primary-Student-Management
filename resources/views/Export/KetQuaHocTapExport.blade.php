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
        <thead style="background-color: black; color: white;">
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
        <thead style="background-color: black; color: white;">
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
        <thead style="background-color: black; color: white;">
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