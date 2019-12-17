document.addEventListener('DOMContentLoaded', function(event) {

	let abig = $("[name=abig]");
	abig.each(function() {
		let controller = $(this);

		controller.click(function() {
			abig.each(function(){
				if($(this)[0].id != controller[0].id)
				{
					let val = $("[name=cusdrop]");
					val.each(function() {
							$(`[controled-by=${$(this)[0].id}]`).css('display', 'none');
						});
					$(`[controled-by=${$(this)[0].id}]`).css('display', 'none');	
				}

			});
			console.log('click');
			$(`[controled-by=${controller[0].id}]`).toggle();
		});
	});
  //the event occurred
  let val = $("[name=cusdrop]");
  val.each(function() {
  	let controller = $(this);

  	controller.click(function() {
  		val.each(function(){
  			if($(this)[0].id != controller[0].id)
  				$(`[controled-by=${$(this)[0].id}]`).css('display', 'none');	
  		});
  		console.log('click');
  		$(`[controled-by=${controller[0].id}]`).toggle();
  	});
  });

  $('[name=btnDoiMatKhau]').click(function(){
  	if($('[name=password_header]').val() == $('[name=repassword_header]').val())
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
                magv:'*',
                taikhoan: $('[name=taikhoan_header]').val(),
                matkhau: $('[name=password_header]').val(),
            }
        },
        success: function (msg) {
            console.log(msg);
            if(msg.matkhau)
            {
                $("#noteMatKhau_header").css({display: "flex"});
            }
            if(msg == "Cập nhật tài khoản thành công!")
            {
                            //location.reload();
                            $("#ghi_thanhcong").css({display: "block"});
                            $("#ghi_thanhcong").children().append(msg).show();
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
    $('[name=textloi2]')[0].innerText = "";
    $("#xuatloi2").css({display: "block"});
    $('[name=textloi2]')[0].append("Nhập lại mật khẩu không khớp!");
    $("#xuatloi2").show()
    setTimeout(function(){$("#xuatloi2").css({display: "none"});}, 2000);
	}
  })

  $('[name=btnLogout]').click(function(){	
    window.location.href=`/QLHS/public/logout`;
  })

})

