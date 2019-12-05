$(function () {
    var array = [];
    var mahocsinh_choose="";
    var flag;

    $('[name=Khoi]').change(function(){
         window.location.href=`/QLHS/public/hshs?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/hshs?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })

    $('[name=Trangthai]').change(function(e){
         window.location.href=`/QLHS/public/hshs?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}&trangthai=${$('[name=Trangthai]').val()}`;
    })

    $('[name=checkbox_one]').click(function () {
        array = [];
        var message = "";

        if($(this)[0].checked == false)
        {
           $('[name=checkbox_all]').prop('checked', false);
       }

            //Loop through all checked CheckBoxes in GridView.
            $("#table_hocsinh input[type=checkbox]:checked").each(function () {
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
            $("#table_hocsinh input[type=checkbox]").each(function () {
                $(this).prop('checked', true);
                var row = $(this).closest("tr")[0];
                if(row.cells[2].innerText != 'Mã học sinh')
                    array.push(row.cells[3].innerText);
                console.log('mảng  = ', array);
            });

        }
        else
        {
            $("#table_hocsinh input[type=checkbox]:checked").each(function () {
                $(this).prop('checked', false);
            });
        }
            //return true: checked
            //return false: unchecked
            return true;
        });


    $('[name=btnXoa]').click(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: '/QLHS/public/xoa-hs',
            type: 'DELETE',
            data: {
                list: array
            },
            success: function( msg ) {
                if(msg == "Xóa hồ sơ học sinh thành công!")
                        {
                            //location.reload();
                            $("#xoahs_thanhcong").css({display: "block"});
                            $("#xoahs_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
            },
            error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
    }
})
    });

    $('[name=modalThemHocSinh]').click(function() {
        flag = 1;
        //khoi
        $('[name=khoi]').val($('[name=Khoi]').val());
        $('[name=lop]').val($('[name=Lop]').val());

    })

    $('[name=btnGhiHocSinh]').click(function()
    {
        console.log($('[name=tenhocsinh]').val() == "");
        //if($('[name=tenhocsinh]').val() == "")
       // {
          // $("#noteName").css({display: "block"});
        //}
        //else
       // {
            $("#noteName").css({display: "none"});
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (flag == 1) {
                $.ajax({
                    url: '/QLHS/public/ghi-hs',
                    type: 'POST',
                    data: {
                        hocsinh: {
                            malophoc: $('[name=Lop]').children('option:selected').attr("id"),
                            tenhocsinh: $('[name=tenhocsinh]').val(),
                            ngaysinh: $('[name=ngaysinh]').val(),
                            gioitinh: $('[name=gioitinh]').val(),
                            trangthaihocsinh: $('[name=trangthai]').val(),
                            dantoc: $('[name=dantoc]').val(),
                            quoctich: $('[name=quoctich]').val(),
                            tinh: $('[name=tinh]').val(),
                            huyen: $('[name=huyen]').val(),
                            xa: $('[name=xa]').val(),
                            noisinh: $('[name=noisinh]').val(),
                            choohientai: $('[name=choohientai]').val(),
                            sodt: $('[name=sdt]').val(),
                            khuvuc: $('[name=khuvuc]').val(),
                            loaikhuyettat: $('[name=loaikhuyettat]').val(),
                            doituongchinhsach: $('[name=dtcs]').val(),
                            mienhocphi: $('[name=mienhocphi]')[0].checked,
                            giamhocphi: $('[name=giamhocphi]')[0].checked,
                            doivien: $('[name=doivien]')[0].checked,
                            luubannamtruoc: $('[name=luubannamtruoc]')[0].checked,
                            hotencha: $('[name=hotencha]').val(),
                            nghenghiepcha: $('[name=nghenghiepcha]').val(),
                            namsinhcha: $('[name=namsinhcha]').val(),
                            hotenme: $('[name=hotenme]').val(),
                            nghenghiepme: $('[name=nghenghiepme]').val(),
                            namsinhme: $('[name=namsinhme]').val(),
                            hotenngh: $('[name=hotenngh]').val(),
                            nghenghiepngh: $('[name=nghenghiepngh]').val(),
                            namsinhngh: $('[name=namsinhngh]').val()
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.ngaysinh)
                        {
                            $("#noteNgaysinh").css({display: "block"});
                        }
                        if(msg.tenhocsinh)
                        {
                            $("#noteName").css({display: "block"});
                        }
                        if(msg == "Ghi hồ sơ học sinh thành công!")
                        {
                            //location.reload();
                            $("#ghihs_thanhcong").css({display: "block"});
                            $("#ghihs_thanhcong").children().append(msg).show();
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
                    url: '/QLHS/public/ghi-hs',
                    type: 'PUT',
                    data: {
                        hocsinh: {
                            mahocsinh: mahocsinh_choose,
                            tenhocsinh: $('[name=tenhocsinh]').val(),
                            ngaysinh: $('[name=ngaysinh]').val(),
                            gioitinh: $('[name=gioitinh]').val(),
                            trangthaihocsinh: $('[name=trangthai]').val(),
                            dantoc: $('[name=dantoc]').val(),
                            quoctich: $('[name=quoctich]').val(),
                            tinh: $('[name=tinh]').val(),
                            huyen: $('[name=huyen]').val(),
                            xa: $('[name=xa]').val(),
                            noisinh: $('[name=noisinh]').val(),
                            choohientai: $('[name=choohientai]').val(),
                            sodt: $('[name=sdt]').val(),
                            khuvuc: $('[name=khuvuc]').val(),
                            loaikhuyettat: $('[name=loaikhuyettat]').val(),
                            doituongchinhsach: $('[name=dtcs]').val(),
                            mienhocphi: $('[name=mienhocphi]')[0].checked,
                            giamhocphi: $('[name=giamhocphi]')[0].checked,
                            doivien: $('[name=doivien]')[0].checked,
                            luubannamtruoc: $('[name=luubannamtruoc]')[0].checked,
                            hotencha: $('[name=hotencha]').val(),
                            nghenghiepcha: $('[name=nghenghiepcha]').val(),
                            namsinhcha: $('[name=namsinhcha]').val(),
                            hotenme: $('[name=hotenme]').val(),
                            nghenghiepme: $('[name=nghenghiepme]').val(),
                            namsinhme: $('[name=namsinhme]').val(),
                            hotenngh: $('[name=hotenngh]').val(),
                            nghenghiepngh: $('[name=nghenghiepngh]').val(),
                            namsinhngh: $('[name=namsinhngh]').val()
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.ngaysinh)
                        {
                            $("#noteNgaysinh").css({display: "block"});
                        }
                        if(msg.tenhocsinh)
                        {
                            $("#noteName").css({display: "block"});
                        }
                        if(msg == "Sửa hồ sơ học sinh thành công!")
                        {
                            $("#ghihs_thanhcong").css({display: "block"});
                            $("#ghihs_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
            }
        //}
    });

$('[name=btnEditHS]').click(function() {
    flag = 0;
        //khoi
        $('[name=khoi]').val($('[name=Khoi]').val());
        $('[name=lop]').val($('[name=Lop]').val());

        var row = $(this).closest("tr")[0];
        mahocsinh_choose = row.cells[3].innerText;
        $('[name=tenhocsinh]').val(row.cells[4].innerText);
        let date = row.cells[5].innerText.split('/');
        let formatDate = `${date[2]}-${date[1]}-${date[0]}`;
        $('[name=ngaysinh]').val(formatDate);
        $('[name=gioitinh]').val(row.cells[6].innerText);
        $('[name=trangthai]').val(row.cells[7].innerText);
        $('[name=dantoc]').val(row.cells[8].innerText);
        $('[name=quoctich]').val(row.cells[9].innerText);
        $('[name=tinh]').val(row.cells[10].innerText);
        $('[name=huyen]').val(row.cells[11].innerText);
        $('[name=xa]').val(row.cells[12].innerText);
        $('[name=noisinh]').val(row.cells[13].innerText);
        $('[name=choohientai]').val(row.cells[14].innerText);
        $('[name=sdt]').val(row.cells[15].innerText);
        $('[name=khuvuc]').val(row.cells[16].innerText);
        $('[name=loaikhuyettat]').val(row.cells[17].innerText);
        $('[name=dtcs]').val(row.cells[18].innerText);               
        $('[name=mienhocphi]').prop('checked', row.cells[19].innerText == 'x'? true:false);
        $('[name=giamhocphi]').prop('checked', row.cells[20].innerText == 'x'? true:false);
        $('[name=doivien]').prop('checked', row.cells[21].innerText == 'x'? true:false);
        $('[name=luubannamtruoc]').prop('checked', row.cells[22].innerText == 'x'? true:false);
        $('[name=hotencha]').val(row.cells[23].innerText);
        $('[name=nghenghiepcha]').val(row.cells[24].innerText);
        $('[name=namsinhcha]').val(row.cells[25].innerText);
        $('[name=hotenme]').val(row.cells[26].innerText);
        $('[name=nghenghiepme]').val(row.cells[27].innerText);
        $('[name=namsinhme]').val(row.cells[28].innerText);
        $('[name=hotenngh]').val(row.cells[29].innerText);
        $('[name=nghenghiepngh]').val(row.cells[30].innerText);
        $('[name=namsinhngh]').val(row.cells[31].innerText);
    });
});