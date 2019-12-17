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
    var malophoc_choose="";
    var flag;

    $('[name=checkbox_one]').click(function () {
        array = [];
        var message = "";

        if($(this)[0].checked == false)
        {
           $('[name=checkbox_all]').prop('checked', false);
       }

            //Loop through all checked CheckBoxes in GridView.
            $("#table_lophoc input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                array.push(row.cells[3].innerText);
                //alert('hihi');
                console.log($('[name=magv]'));
            });

            //return true: checked
            //return false: unchecked
            return true;
        });

    $('[name=checkbox_all]').click(function () {
        array = [];
        if($('[name=checkbox_all]')[0].checked)
        {
            $("#table_lophoc input[type=checkbox]").each(function () {
                $(this).prop('checked', true);
                var row = $(this).closest("tr")[0];
                if(row.cells[2].innerText != 'Mã lớp học')
                    array.push(row.cells[3].innerText);
                console.log('mảng  = ', array);
            });

        }
        else
        {
            $("#table_lophoc input[type=checkbox]:checked").each(function () {
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
            url: '/QLHS/public/xoa-lh',
            type: 'DELETE',
            data: {
                list: array
            },
            success: function( msg ) {
                if(msg == "Xóa hồ sơ lớp học thành công!")
                        {
                            //location.reload();
                            $("#xoalh_thanhcong").css({display: "block"});
                            $("#xoalh_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
            },
            error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
    }
})
    });

    $('[name=modalThemLopHoc]').click(function() {
        flag = 1;
        $('[name=khoi]').val($('[name=Khoi]').val());
           $('[name=gvcn]').find('option').remove().end().append(
            danhsachGoc.map(val => {
                return `<option magv="${val.magv}">${val.tengv}</option>`
            })
            );
        
    })

    $('[name=btnGhiLopHoc]').click(function()
    {
        if($('[name=gvcn]').children("option:selected").attr("magv") == 0)
            return;
            $("#noteName").css({display: "none"});
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (flag == 1) {
                $.ajax({
                    url: '/QLHS/public/ghi-lh',
                    type: 'POST',
                    data: {
                        lophoc:{
                            tenlophoc: $('[name=tenlophoc]').val(),
                            khoi: $('[name=khoi]').val(),
                            magv: $('[name=gvcn]').children("option:selected").attr("magv"),
                            namhoc: getCookie().namhoc,
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.tenlophoc)
                        {
                            $("#noteName").css({display: "block"});
                        }
                        if(msg == "Ghi hồ sơ lớp học thành công!")
                        {
                            //location.reload();
                            $("#ghilh_thanhcong").css({display: "block"});
                            $("#ghilh_thanhcong").children().append(msg).show();
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
                    url: '/QLHS/public/ghi-lh',
                    type: 'PUT',
                    data: {
                        lophoc:{
                            malophoc: malophoc_choose,
                            tenlophoc: $('[name=tenlophoc]').val(),
                            khoi: $('[name=khoi]').val(),
                            magv: $('[name=gvcn]').children("option:selected").attr("magv"),
                            namhoc: getCookie().namhoc,
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.tenhocsinh)
                        {
                            $("#noteName").css({display: "block"});
                        }
                        if(msg == "Sửa hồ sơ lớp học thành công!")
                        {
                            $("#ghilh_thanhcong").css({display: "block"});
                            $("#ghilh_thanhcong").children().append(msg).show();
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

$('[name=btnEditLH]').click(function() {
    flag = 0;
        var row = $(this).closest("tr")[0];
        malophoc_choose = row.cells[3].innerText;
        $('[name=tenlophoc]').val(row.cells[4].innerText);
        $('[name=khoi]').val(row.cells[5].innerText);

        // lay thang cuoi cung cua list


        //kiem tra thang nay co trong mang list dau khong

        //neu khong co thi xoa no di

        let temp = [...danhsachGoc];

        console.log('danh sach ban dau ', danhsachGoc);

        temp.push({
            tengv: row.cells[6].innerText,
            magv: 0
        });
        console.log('danh sach = ', temp);

        //xoa het thang con cua input di
        $('[name=gvcn]').find('option').remove().end().append(
            temp.reverse().map(val => {
                return `<option magv="${val.magv}">${val.tengv}</option>`
            })
            );
    
    });

    $('[name=btnXuatexcel]').click(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

        window.location.href=`/QLHS/public/xuatexcelLH`;
    })

});
