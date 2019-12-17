$(function () {
	$('[name=Khoi]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));
         window.location.href=`/QLHS/public/tkmucdatduoc?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/tkmucdatduoc?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })

     $('[name=Thoidiemdanhgia]').change(function(e){
     	
         window.location.href=`/QLHS/public/tkmucdatduoc?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}&thoidiemdanhgia=${$('[name=Thoidiemdanhgia]').val()}`;
    })

      $('[name=btnXuatexcel]').click(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

        window.location.href=`/QLHS/public/xuatexcelTKMDD?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}&thoidiemdanhgia=${$('[name=Thoidiemdanhgia]').val()}`;
    })


})