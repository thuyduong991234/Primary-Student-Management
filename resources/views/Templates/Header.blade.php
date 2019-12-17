  <script src="js/header.js"></script>

  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="margin-bottom: 0; background-color: #293c74" >
    <i class="fas fa-user-graduate fa-2x " style="color: white; margin-right: 15px;"></i>
    <a class="navbar-brand" href="{{url('/')}}" style="color: white; margin-top: 8px">
      HỆ THỐNG QUẢN LÝ HỌC SINH TIỂU HỌC
    </a>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Thông tin học kỳ -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="{{url('/NamHoc')}}">
          <i class="far fa-calendar-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span id="info_namhoc"></span>
          <script type="text/javascript">
            function getCookie()
            {
              let str = document.cookie;
              let arrstr = str.split("; ");
              let info = {};
              info.namhoc = (arrstr[1].split('='))[1];
              info.hocki = (arrstr[0].split('='))[1];
              return info;
            }
            if(getCookie())
            {
              document.getElementById("info_namhoc").innerHTML = getCookie().hocki + " " + getCookie().namhoc;
            }
            else
            {
              document.getElementById("info_namhoc").innerHTML = "Học kỳ I 2019 - 2020";
            }
          </script>

        </a>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - Thông tin cá nhân -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          @if(Session::get('giaovien'))
          {{Session::get('giaovien')->tengv}}
          @endif
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" data-toggle="modal" data-target=".doimatkhau-model" style="color: #293c74">Đổi mật khẩu</a>       
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" data-target=".logout-modal" style="color: #293c74">Đăng xuất</a>
        </div>
      </li>
    </ul>
  </nav>



  <nav  class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height: 3rem">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto"  style="margin-left: 0">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}" style="color: #293c74">
            <i class="fas fa-school fa-sm fa-fw mr-2" style="color: #293c74"></i>Trang chủ</a>
          </li>
          <div class="topbar-divider d-none d-sm-block"></div>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/hsgv')}}" style="color: #293c74">
              <i class="fas fa-id-card fa-sm fa-fw mr-2" style="color: #293c74"></i>
              Giáo viên
            </a>
          </li>
          <div class="topbar-divider d-none d-sm-block" ></div>

          <li class="nav-item dropdown"  style="position: relative">
            <a class="nav-link dropdown-toggle" href="#" style="color: #293c74" id="aLopHoc" name="abig" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-chalkboard-teacher fa-sm fa-fw mr-2" style="color: #293c74"></i>
              Lớp học
            </a>
            <div class="dropdown-menu" controled-by="aLopHoc">
              <a class="dropdown-item" href="{{url('/qllh')}}" style="color: #293c74">Quản lý lớp học</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('/xmlh')}}" style="color: #293c74">Xếp môn học</a>
            </div>
          </li>
          <div class="topbar-divider d-none d-sm-block"></div>

          <li class="nav-item dropdown"  style="position: relative">
            <a class="nav-link dropdown-toggle" href="#" name="abig" id="navHocSinh"  aria-haspopup="true" aria-expanded="false" style="color: #293c74">
              <i class="fas fa-user-graduate fa-sm fa-fw mr-2" style="color: #293c74"></i>
              Học sinh
            </a>
            <div class="dropdown-menu" controled-by="navHocSinh" style="width: fit-content;">
              <a class="dropdown-item" href="{{url('/hshs')}}" style="color: #293c74">Hồ sơ học sinh</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" name="cusdrop" id="aChuyenDenDi" href="#" style="display: flex; justify-content: space-between; color: #293c74">Học sinh chuyển đến, chuyển đi <i class="fas fa-angle-right" style="align-self: center; color: #293c74"></i></a>
              <div class="dropdown-menu" controled-by="aChuyenDenDi" aria-labelledby="aChuyenDenDi" style="position: absolute; left:300px;right:0;top:42px;bottom:0; width: fit-content; height: fit-content">
                <a class="dropdown-item" href="{{url('/chuyenlop')}}" style="color: #293c74">Chuyển lớp học</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('/qlchuyentruong')}}" style="color: #293c74">Quản lý chuyển đến, chuyển đi, thôi học</a>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('/kqht')}}" style="color: #293c74">Kết quả học tập</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" name="cusdrop" id="aKhenthuong" href="#" style="display: flex; justify-content: space-between; color: #293c74">
                Khen thưởng, kỷ luật
                <i class="fas fa-angle-right" style="align-self: center; color: #293c74"></i>
              </a>

              <div class="dropdown-menu" controled-by="aKhenthuong" aria-labelledby="aKhenthuong" style="position: absolute; left:300px;right:0;top:132px;bottom:0; width: fit-content; height: fit-content">
                <a class="dropdown-item" href="{{url('/kttn')}}" style="color: #293c74">Nhập khen thưởng cuối năm</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('/ktdx')}}" style="color: #293c74">Nhập khen thưởng đột xuất/cấp trên</a>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('/qlhtctth')}}" style="color: #293c74">Quản lý hoàn thành chương trình tiểu học</a>
            </div>
          </li>
          <div class="topbar-divider d-none d-sm-block"></div>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: #293c74" href="#" id="abaocao" name="abig" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-bookmark fa-sm fa-fw mr-2" style="color: #293c74"></i>
             Báo cáo, thống kê
           </a>
           <div class="dropdown-menu" controled-by="abaocao"  style="width: fit-content;">
            <a class="dropdown-item" name="cusdrop" id="atkhocsinh" href="#" style="display: flex; justify-content: space-between; color: #293c74">
              Thống kê học sinh
              <i class="fas fa-angle-right" style="align-self: center; color: #293c74"></i>
            </a>

            <div class="dropdown-menu" controled-by="atkhocsinh" aria-labelledby="atkhocsinh" style="position: absolute; left:232px;right:0;top:40px;bottom:0; width: fit-content; height: fit-content">
              <a class="dropdown-item" href="{{url('tkdiemmonhoc')}}" style="color: #293c74">Thống kê điểm môn học</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('tkmucdatduoc')}}" style="color: #293c74">Thống kê mức đạt được theo môn học</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('/tknlpc')}}" style="color: #293c74">Thống kê năng lực, phẩm chất</a>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('/tkktll')}}" style="color: #293c74">Thống kê khen thưởng, lên lớp</a>
          </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item"  style="position: relative">
          <a class="nav-link" href="{{url('/chuyenhoso')}}" style="color: #293c74">
            <i class="fas fa-random fa-sm fa-fw mr-2" style="color: #293c74"></i>
            Chuyển hồ sơ lên năm học mới
          </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

      </ul>
    </div>
  </nav>

  <div class="modal fade doimatkhau-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #293c74; font-weight: bold;">Đổi mật khẩu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--modal body -->
      <div class="modal-body">
        <div class="row" style="margin-top: 20px">
          <div class="col"></div>
          <div class="col-8" style="margin-bottom: 10px">
            <div>
              <span style="color: black; font-weight: bold">Tài khoản:</span>
              <input type="text" value="{{Session::get('giaovien')->taikhoan}}" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="taikhoan_header" disabled="true">
            </div>
          </div>
          <div class="col"></div>
          <div class="w-100"></div>
          <div class="col"></div>
          <div class="col-8" style="margin-bottom: 10px">
            <div>
              <span style="color: black; font-weight: bold">Mật khẩu:</span>
              <input type="password" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="password_header">
            </div>
            <div id="noteMatKhau_header" style="clear: right;display: none; flex-direction: row-reverse; margin-right: 10px">
              <div><i class="fas fa-exclamation-triangle" style="color: red"></i>
                <span style="color: red">Vui lòng điền mật khẩu.</span>
              </div>
            </div>
          </div>
          <div class="col"></div>
          <div class="w-100"></div>
          <div class="col"></div>
          <div class="col-8" style="margin-bottom: 10px">
            <span style="color: black; font-weight: bold">Nhập lại mật khẩu:</span>
            <input type="password" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="repassword_header">
          </div> 
          <div class="col"></div>                    
          <div class="w-100"></div>
          <div class="col"></div>
          <div class="col-8" style="display: flex; justify-content: center; margin-top: 20px">
           <button type="button" class="btn btn-dark" name="btnDoiMatKhau" style="background-color: #293c74">Đổi mật khẩu</button>
         </div>

         <div class="col"></div>                     
       </div>
     </div>
   </div>

   <div class="modal-footer">
   </div>
   <div class="card bg-danger text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="xuatloi2">
    <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
      <i class="fas fa-exclamation-circle fa-2x" style="color: white; margin-right: 5px"></i>
      <span name = "textloi2"></span>
    </div>
  </div>
</div>
<div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none;" id="ghi_thanhcong">
  <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
    <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
  </div>
</div>
</div>

@if(Session::get('Phân quyền'))
<div class="card bg-danger text-white shadow" style="display: block; position: fixed; bottom: 10px; left: 10px; border: none;" id="thatbai">
    <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
      <i class="fas fa-exclamation-circle fa-2x" style="color: white; margin-right: 5px"></i>
      <span name = "textloi">{{Session::get('Phân quyền')}}</span>
    </div>
</div>
@endif




<!-- Logout Modal-->
  <div class="modal fade logout-modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #293c74; font-weight: bold;">Đăng xuất</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" style="color: black;">Bạn có muốn đăng xuất khỏi hệ thống?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="button" name="btnLogout" style="background-color: #293c74">Đăng xuất</button> 
        </div>
      </div>
    </div>
  </div>
