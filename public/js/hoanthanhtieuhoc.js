$(function () {
        array = [];
    $("#table_lophoc input[type=checkbox]:checked").each(function() {
        var row = $(this).closest("tr")[0];
        array.push(row.cells[1].innerText);
        console.log(array);
    }); 
    //tao mang
    $('[name=checkbox_one]').click(function () {

        //console.log($(this));

        if($(this)[0].checked == false)
        {
           $('[name=checkbox_all]').prop('checked', false);
        }

            //Loop through all checked CheckBoxes in GridView.
            /*$("#table_lophoc input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                array.push(row.cells[1].innerText);

                console.log(array);
            });
            */
            var row = $(this).closest("tr")[0];
            if($(this)[0].checked == true)
            {
                array.push(row.cells[1].innerText);
            }
            else {
                //console.log(row.cells[1].innerText);
                array.splice(array.indexOf(row.cells[1].innerText), 1);
                
            }
            console.log(array);

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
                if(row.cells[1].innerText != 'Mã học sinh')
                    array.push(row.cells[1].innerText);
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
    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/qlhtctth?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })
     $('[name=btnCapNhat]').click(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: '/QLHS/public/capnhatqlhtctth',
            type: 'PUT',
            data: {
                list: array,
                malophoc: ($('[name=Lop]').children('option:selected'))[0].id
            },
            success: function( msg ) {
                if(msg == "Cập nhật hoàn thành chương trình tiểu học thành công!")
                        {
                            //location.reload();
                            $("#capnhat_thanhcong").css({display: "block"});
                            $("#capnhat_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
            },
            error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
    }
})
    });

});