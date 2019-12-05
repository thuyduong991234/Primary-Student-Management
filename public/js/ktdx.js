
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


    $('[name=modalThemKTDX]').click(function() {
        flag = 1;
        $('[name=khoi]').val($('[name=Khoi]').val());
        $('[name=lop]').val($('[name=Lop]').val());
        $('[name=hocsinh]').val($('[name=Hocsinh]').val());
        
    })

    
});
