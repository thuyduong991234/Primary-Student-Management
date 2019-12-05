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


    $('[name=btnXoa]').click(function() {
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
        flag = 1;
    })

    $('[name=btnGhiGiaoVien]').click(function()
    {
        //console.log($('[name=tenhocsinh]').val() == "");
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
                        if(msg.tenhocsinh)
                        {
                            $("#noteName").css({display: "block"});
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
        //}
    });

$('[name=btnEditGV]').click(function() {
    flag = 0;
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
    });
});