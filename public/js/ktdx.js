
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
               
                
                array.push($(this).attr('maktdx'));
                //alert('hihi');
                console.log("mang1 = ", array);
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
                array.push($(this).attr('maktdx'));
                //alert('hihi');
                console.log("mang1 = ", array);
               
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


    $('[name=modalThemKTDX]').click(function() {
        flag = 1;
        $('[name=khoi]').val($('[name=Khoi]').val());
        $('[name=lop]').val($('[name=Lop]').val());
        $('[name=lop]').attr('giatri', $('[name=Lop] option:selected').attr("id"));
        $('[name=hocsinh]').val($('[name=Hocsinh]').val());
        $('[name=hocsinh]').attr('giatri', $('[name=Hocsinh] option:selected').attr("id"));
        $("#noteNoidung").css({display: "none"});
        
    })





   $('[name=Khoi]').change(function(){
         window.location.href=`/QLHS/public/ktdx?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/ktdx?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })
   
    $('[name=btnEditHS]').click(function() {
        flag = 0;
        //khoi
        $('[name=khoi]').val($('[name=Khoi]').val());
        $('[name=lop]').val($('[name=Lop]').val());
        $('[name=lop]').attr('giatri', $('[name=Lop] option:selected').attr("id"));
        
        
        var row = $(this).closest("tr")[0];
        $('[name=hocsinh]').val(row.cells[4].innerText);
        $('[name=hocsinh]').attr('giatri', row.cells[3].innerText);
         $('[name=noidungkt]').val(row.cells[6].innerText);

        $("#noteNoidung").css({display: "none"});

    });


      $('[name=btnXacNhanXoa]').click(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: '/QLHS/public/xoa-ktdx',
            type: 'DELETE',
            data: {
                list: array
            },
            success: function( msg ) {
                if(msg == "Xóa khen thưởng thành công!")
                        {
                            //location.reload();
                            $("#xoaktdx_thanhcong").css({display: "block"});
                            $("#xoaktdx_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
            },
            error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
            }
        })
    });

    $('[name=btnGhiKT]').click(function()
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
            if (flag==1) {
                $.ajax({
                    url: '/QLHS/public/ghi-ktdx',
                    type: 'POST',
                    data: {
                        khenthuongdotxuat: {
                            malophoc: $('[name=lop]').attr("giatri"),
                            mahocsinh: $('[name=hocsinh]').attr("giatri"),
                            noidungkt: $('[name=noidungkt]').val(), 
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.noidungkt)
                        {
                            $("#noteNoidung").css({display: "block"});
                        }
                       
                        if(msg == "Ghi khen thưởng thành công!")
                        {
                            //location.reload();
                            $("#ghikt_thanhcong").css({display: "block"});
                            $("#ghikt_thanhcong").children().append(msg).show();
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
                    url: '/QLHS/public/capnhat-ktdx',
                    type: 'PUT',
                    data: {
                        khenthuongdotxuat: {
                            malophoc: $('[name=lop]').attr("giatri"),
                            mahocsinh: $('[name=hocsinh]').attr("giatri"),
                            noidungkt: $('[name=noidungkt]').val(), 
                        }
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg.noidungkt)
                        {
                            $("#noteNoidung").css({display: "block"});
                        }
                       
                        if(msg == "Sửa khen thưởng thành công!")
                        {
                            //location.reload();
                            $("#ghikt_thanhcong").css({display: "block"});
                            $("#ghikt_thanhcong").children().append(msg).show();
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

      $('[name=btnXuatexcel]').click(function(e){
         $("#table_lophoc").table2excel({
            exclude: ".noExcel",
            name: "DanhSach",
            filename: `Danh sách khen thưởng đột xuất lớp ${$('[name=Lop] option:selected').val()}.xls`, // do include extension
        });
    })

});
