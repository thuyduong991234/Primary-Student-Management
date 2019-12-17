function getCookie()
    {
        let str = document.cookie;
        let arrstr = str.split("; ");
        let info = {};
        info.namhoc = (arrstr[1].split('='))[1];
        info.hocki = (arrstr[0].split('='))[1];
        return info;
    }

$(function () {
    var array = [];
    var magiaovien_choose="";
    var flag;


    $('[name=tengv]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

        window.location.href=`/QLHS/public/hsgv?magiaovien=${$('[name=tengv] option:selected').attr("id")}`;
    })


    $('[name=checkbox_one]').click(function () {
        array = [];
        var message = "";

        if($(this)[0].checked == false)
        {
         $('[name=checkbox_all]').prop('checked', false);
     }

            //Loop through all checked CheckBoxes in GridView.
            $("#table_giaovien input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                message += row.cells[2].innerHTML;
                message += "\n";
                //array_push($listmahs,'row.cells[2]');
                array.push(row.cells[3].innerText);
                //alert('hihi');
                console.log('mảng  = ', array);
            });

            //return true: checked
            //return false: unchecked
            return true;
        });

    $('[name=checkbox_all]').click(function () {
        array = [];
        if($('[name=checkbox_all]')[0].checked)
        {
            $("#table_giaovien input[type=checkbox]").each(function () {
                $(this).prop('checked', true);
                var row = $(this).closest("tr")[0];
                if(row.cells[2].innerText != 'Mã giáo viên')
                    array.push(row.cells[3].innerText);
                console.log('mảng  = ', array);
            });

        }
        else
        {
            $("#table_giaovien input[type=checkbox]:checked").each(function () {
                $(this).prop('checked', false);
            });
        }
            //return true: checked
            //return false: unchecked
            return true;
        });


    $('[name=btnXacNhanXoa]').click(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: '/QLHS/public/xoa-gv',
            type: 'DELETE',
            data: {
                list: array
            },
            success: function( msg ) {
                if(msg == "Xóa hồ sơ giáo viên thành công!")
                {
                            //location.reload();
                            $("#xoagv_thanhcong").css({display: "block"});
                            $("#xoagv_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    },
                    error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
    }
})
    });

    $('[name=modalThemGiaoVien]').click(function() {
        $('[name=tengiaovien]').val("");
        $('[name=cmnd]').val("");
        $('[name=ngaysinh]').val("");
        $('[name=quequan]').val("");
        $('[name=sdt]').val("");
        $('[name=email]').val("");
        $("#noteNgaysinh").css({display: "none"});
        $("#noteName").css({display: "none"});
        $("#noteCMND").css({display: "none"});
        $("#noteTaiKhoan").css({display: "none"});
        $("#noteMatKhau").css({display: "none"});
        $('[name=taikhoan]').val("");
        $('[name=password]').val("");
        $('[name=repassword]').val("");
        flag = 1;
        $("#taotaikhoan-tab")[0].innerText = "Tạo tài khoản";
        $('[name=btnTaoTaiKhoan]').css({display: "none"});
    })

    $('[name=btnGhiGiaoVien]').click(function()
    {
        if($('[name=password]').val() == $('[name=repassword]').val())
        {
            $("#noteNgaysinh").css({display: "none"});
            $("#noteName").css({display: "none"});
            $("#noteCMND").css({display: "none"});
            $("#noteTaiKhoan").css({display: "none"});
            $("#noteMatKhau").css({display: "none"});
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (flag == 1) {
                $.ajax({
                    url: '/QLHS/public/ghi-gv',
                    type: 'POST',
                    data: {
                        giaovien: {
                            tengiaovien: $('[name=tengiaovien]').val(),
                            ngaysinh: $('[name=ngaysinh]').val(),
                            gioitinh: $('[name=gioitinh]').val(),
                            trangthaicanbo: $('[name=trangthai]').val(),
                            dantoc: $('[name=dantoc]').val(),
                            quoctich: $('[name=quoctich]').val(),
                            quequan: $('[name=quequan]').val(),
                            sodt: $('[name=sdt]').val(),
                            email: $('[name=email]').val(),
                            cmnd: $('[name=cmnd]').val(),
                            nhomchucvu: $('[name=nhomchucvu]').val(),
                            taikhoan: $('[name=taikhoan]').val(),
                            matkhau: $('[name=password]').val(),
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.ngaysinh)
                        {
                            $("#noteNgaysinh").css({display: "block"});
                        }
                        if(msg.tengiaovien)
                        {
                            $("#noteName").css({display: "block"});
                        }
                        if(msg.cmnd)
                        {
                            $("#noteCMND").css({display: "block"});
                        }
                        if(msg.taikhoan)
                        {
                            $("#noteTaiKhoan").css({display: "flex"});
                        }
                        if(msg.matkhau)
                        {
                            $("#noteMatKhau").css({display: "flex"});
                        }
                        if(msg == "Ghi hồ sơ giáo viên thành công!")
                        {
                            //location.reload();
                            $("#ghigv_thanhcong").css({display: "block"});
                            $("#ghigv_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
            }
            else if (flag == 0) {
                $.ajax({
                    url: '/QLHS/public/ghi-gv',
                    type: 'PUT',
                    data: {
                        giaovien: {
                            magv: magiaovien_choose,
                            tengiaovien: $('[name=tengiaovien]').val(),
                            ngaysinh: $('[name=ngaysinh]').val(),
                            gioitinh: $('[name=gioitinh]').val(),
                            trangthaicanbo: $('[name=trangthai]').val(),
                            dantoc: $('[name=dantoc]').val(),
                            quoctich: $('[name=quoctich]').val(),
                            quequan: $('[name=quequan]').val(),
                            sodt: $('[name=sdt]').val(),
                            email: $('[name=email]').val(),
                            cmnd: $('[name=cmnd]').val(),
                            nhomchucvu: $('[name=nhomchucvu]').val(),
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.ngaysinh)
                        {
                            $("#noteNgaysinh").css({display: "block"});
                        }
                        if(msg.tengiaovien)
                        {
                            $("#noteName").css({display: "block"});
                        }
                        if(msg.cmnd)
                        {
                            $("#noteCMND").css({display: "block"});
                        }
                        if(msg.taikhoan)
                        {
                            $("#noteTaiKhoan").css({display: "flex"});
                        }
                        if(msg.matkhau)
                        {
                            $("#noteMatKhau").css({display: "flex"});
                        }
                        if(msg == "Sửa hồ sơ giáo viên thành công!")
                        {
                            $("#ghigv_thanhcong").css({display: "block"});
                            $("#ghigv_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
            }
        }
        else
        {
            $('[name=textloi]')[0].innerText = "";
            $("#xuatloi").css({display: "block"});
            $('[name=textloi]')[0].append("Nhập lại mật khẩu không khớp!");
            $("#xuatloi").show()
            setTimeout(function(){$("#xuatloi").css({display: "none"});}, 2000);
        }
    });

$('[name=btnTaoTaiKhoan]').click(function(){
   if($('[name=password]').val() == $('[name=repassword]').val())
   {
    $.ajaxSetup({
        headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/QLHS/public/capnhattaikhoan',
        type: 'PUT',
        data: {
            giaovien: {
                magv: magiaovien_choose,
                taikhoan: $('[name=taikhoan]').val(),
                matkhau: $('[name=password]').val(),
            }
        },
        success: function (msg) {
            console.log(msg);
            if(msg.taikhoan)
            {
                $("#noteTaiKhoan").css({display: "flex"});
            }
            if(msg.matkhau)
            {
                $("#noteMatKhau").css({display: "flex"});
            }
            if(msg == "Cập nhật tài khoản thành công!")
            {
                            //location.reload();
                            $("#ghigv_thanhcong").css({display: "block"});
                            $("#ghigv_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
}
else{
    $('[name=textloi]')[0].innerText = "";
    $("#xuatloi").css({display: "block"});
    $('[name=textloi]')[0].append("Nhập lại mật khẩu không khớp!");
    $("#xuatloi").show()
    setTimeout(function(){$("#xuatloi").css({display: "none"});}, 2000);
}
})

$('[name=btnEditGV]').click(function() {
    flag = 0;
    $("#noteNgaysinh").css({display: "none"});
    $("#noteName").css({display: "none"});
    $("#noteCMND").css({display: "none"});
    $("#noteTaiKhoan").css({display: "none"});
    $("#noteMatKhau").css({display: "none"});
    $('[name=taikhoan]').val("");
    $('[name=password]').val("");
    $('[name=repassword]').val("");
    var row = $(this).closest("tr")[0];
    magiaovien_choose = row.cells[3].innerText;
    $('[name=tengiaovien]').val(row.cells[4].innerText);
    $('[name=cmnd]').val(row.cells[5].innerText);
    let date = row.cells[6].innerText.split('/');
    let formatDate = `${date[2]}-${date[1]}-${date[0]}`;
    $('[name=ngaysinh]').val(formatDate);
    $('[name=gioitinh]').val(row.cells[7].innerText);
    $('[name=trangthai]').val(row.cells[8].innerText);
    $('[name=dantoc]').val(row.cells[9].innerText);
    $('[name=quoctich]').val(row.cells[10].innerText);
    $('[name=quequan]').val(row.cells[11].innerText);
    $('[name=sdt]').val(row.cells[12].innerText);
    $('[name=email]').val(row.cells[13].innerText);
    $('[name=nhomchucvu]').val(row.cells[14].innerText);
    console.log($("#taotaikhoan-tab"));
    $('[name=btnTaoTaiKhoan]').css({display: "block"});
    $("#taotaikhoan-tab")[0].innerText = "Sửa tài khoản";
    $('[name=btnTaoTaiKhoan]')[0].innerText = "Cập nhật";
});

$('[name=btnXuatexcel]').click(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

        window.location.href=`/QLHS/public/xuatexcelGV`;
    })
})