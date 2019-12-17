
<table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_giaovien">
        <thead style="background-color: black; color: white;">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Mã giáo viên</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">CMND/TCC</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Trạng thái cán bộ</th>
            <th scope="col">Dân tộc</th>
            <th scope="col">Quốc tịch</th>
            <th scope="col">Quê quán</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Nhóm chức vụ</th>
            <th scope="col">Tài khoản</th>
            <th scope="col">Mật khẩu</th>
          </tr>
        </thead>
        <tbody style="background-color: white; color: black; overflow: auto;">
          @foreach($dsgv as $GV)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$GV -> magv}}</td>
            <td>{{$GV -> tengv}}</td>
            <td>{{intval($GV -> cmnd)}}</td>
            <td>{{date("d/m/Y", strtotime($GV -> ngaysinh))}}</td>
            <td>{{$GV -> gioitinh}}</td>
            <td>{{$GV -> trangthaicanbo}}</td>
            <td>{{$GV -> dantoc}}</td>
            <td>{{$GV -> quoctich}}</td>
            <td>{{$GV -> quequan}}</td>
            <td>{{$GV -> dienthoai}}</td>
            <td>{{$GV -> email}}</td>
            <td>{{$GV -> nhomchucvu}}</td>
            <td>{{$GV -> taikhoan}}</td>
            <td>{{$GV -> matkhau}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
