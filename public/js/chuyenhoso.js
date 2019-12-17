$(function() {
	let array = [];
	$('[name=btnThucHien_LH]').click(function(){
        $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
                    url: '/QLHS/public/saocheplophoc',
                    type: 'POST',
                    data: {

                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg == "Cập nhật chuyển hồ sơ lớp học thành công!")
                        {
                            $("#capnhat_thanhcong").css({display: "block"});
                            $("#capnhat_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
    })

    $('[name=btnThucHien_HS]').click(function(){
    	array=[];
    	 $('[name=Lop_con]').each(function(){
            let nhandien = $(this).children('option:selected').attr("id");
            if(nhandien != "khongco")
            	array.push(nhandien);
            console.log('array = ', array);
         });

        $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
                    url: '/QLHS/public/saochephocsinh',
                    type: 'POST',
                    data: {
                    	list: array
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg == "Cập nhật chuyển hồ sơ học sinh thành công!")
                        {
                            $("#capnhat_thanhcong").css({display: "block"});
                            $("#capnhat_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
    })

})