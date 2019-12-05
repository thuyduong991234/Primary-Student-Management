  <script src="js/header.js"></script>

  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="margin-bottom: 0; background-color: black" >
    <a class="navbar-brand" href="#">
      <img src="http://placehold.it/150x50?text=Logo" alt="">
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
        <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Thông tin cá nhân
        </a>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - Thoát -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-sign-out-alt"></i>
          Thoát
        </a>
      </li>

    </ul>
  </nav>

 

  <nav  class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height: 3rem">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto"  style="margin-left: 0">
      <li class="nav-item active">
        <a class="nav-link" href="#">
        <i class="fas fa-school fa-sm fa-fw mr-2 text-gray-400"></i>Trang chủ</a>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <li class="nav-item">
        <a class="nav-link" href="{{url('/hsgv')}}">
          <i class="fas fa-id-card fa-sm fa-fw mr-2 text-gray-400"></i>
          Giáo viên
        </a>
      </li>
        <div class="topbar-divider d-none d-sm-block"></div>

      <li class="nav-item dropdown"  style="position: relative">
        <a class="nav-link dropdown-toggle" href="#" id="aLopHoc" name="abig" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-chalkboard-teacher fa-sm fa-fw mr-2 text-gray-400"></i>
          Lớp học
        </a>
        <div class="dropdown-menu" controled-by="aLopHoc">
          <a class="dropdown-item" href="{{url('/qllh')}}">Quản lý lớp học</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('/xmlh')}}">Xếp môn học</a>
        </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <li class="nav-item dropdown"  style="position: relative">
        <a class="nav-link dropdown-toggle" href="#" name="abig" id="navHocSinh"  aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-graduate fa-sm fa-fw mr-2 text-gray-400"></i>
          Học sinh
        </a>
        <div class="dropdown-menu" controled-by="navHocSinh" style="width: fit-content;">
          <a class="dropdown-item" href="{{url('/hshs')}}">Hồ sơ học sinh</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" name="cusdrop" id="aChuyenDenDi" href="#" style="display: flex; justify-content: space-between;">Học sinh chuyển đến, chuyển đi <i class="fas fa-angle-right" style="align-self: center;"></i></a>
          <div class="dropdown-menu" controled-by="aChuyenDenDi" aria-labelledby="aChuyenDenDi" style="position: absolute; left:300px;right:0;top:42px;bottom:0; width: fit-content; height: fit-content">
            <a class="dropdown-item" href="{{url('/chuyenlop')}}">Chuyển lớp học</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('/qlchuyentruong')}}">Quản lý chuyển đến, chuyển đi, thôi học</a>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('/kqht')}}">Kết quả học tập</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" name="cusdrop" id="aKhenthuong" href="#" style="display: flex; justify-content: space-between;">
          Khen thưởng, kỷ luật
          <i class="fas fa-angle-right" style="align-self: center;"></i>
          </a>

          <div class="dropdown-menu" controled-by="aKhenthuong" aria-labelledby="aKhenthuong" style="position: absolute; left:300px;right:0;top:132px;bottom:0; width: fit-content; height: fit-content">
            <a class="dropdown-item" href="{{url('/kttn')}}">Nhập khen thưởng cuối năm</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('/ktdx')}}">Nhập khen thưởng đột xuất/cấp trên</a>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('/qlhtctth')}}">Quản lý hoàn thành chương trình tiểu học</a>
        </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="abaocao" name="abig" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-bookmark fa-sm fa-fw mr-2 text-gray-400"></i>
          Báo cáo, thống kê
        </a>
        <div class="dropdown-menu" controled-by="abaocao">
          <a class="dropdown-item" href="#">Thống kê lớp học</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Thống kê học sinh</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Thống kê khen thưởng, lên lớp</a>
        </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <li class="nav-item"  style="position: relative">
        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-random fa-sm fa-fw mr-2 text-gray-400"></i>
          Chuyển hồ sơ lên năm học mới
        </a>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

    </ul>
  </div>
</nav>

