var giatricannghe = document.getElementsByName("noidung");
$(function () {

	var arraykttn =[];
	for(let i=0; i < giatricannghe.length; i++) 
    {
        giatricannghe[i].addEventListener("input", function(e) {
        	
            let string = e.target.attributes[2].textContent;
            let loai = (string.split(' - '))[0];
            console.log("loai = ", loai);
            if(loai == 'songaynghicanam') {
                let flag = true;
                console.log(e.target.innerText);
                for(let i = 0; i< (e.target.innerText).length; i++)
                {
                    if ((e.target.innerText)[i] < '0' || (e.target.innerText)[i] > '9') {
                        console.log("Không phải số = ",(e.target.innerText)[i]);
                        e.srcElement.style.borderColor = "red";
                        e.srcElement.style.borderWidth = "3px";
                        $('[name=textloi]')[0].innerText = "";
                        $("#xuatloi").css({display: "block"});
                        $('[name=textloi]')[0].append("Bạn cần nhập điểm trong khoảng từ 0 đến 9!");
                        $("#xuatloi").show()
                        flag = false;
                    }
                }
                if(flag)
                {
                    e.srcElement.style.borderColor = "";
                    e.srcElement.style.borderWidth = "";
                    $("#xuatloi").css({display: "none"});
                }
            }
        })
    }
	$('[name=Khoi]').change(function(){
         window.location.href=`/QLHS/public/kttn?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/kttn?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })

	$('[name=btnCapNhat]').click(function(e){
		arraykttn = [];
         $('[name=noidung]').each(function(){
            let val = $(this)[0].innerText || "*";
            let nhandien = $(this).attr("giatri");
            arraykttn.push(val+' - '+nhandien+' - '+  $('[name=Lop] option:selected').attr('id')); 
            console.log('kttn = ', arraykttn);
         });

       

        $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         $.ajax({
                    url: '/QLHS/public/capnhat-kttn',
                    type: 'PUT',
                    data: {
                        kttn: arraykttn,
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg == "Cập nhật kết quả khen thưởng thành công!")
                        {
                            //location.reload();
                            $("#capnhat_thanhcong").css({display: "block"});
                            $("#capnhat_thanhcong").children().append(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here borderWidthcause of error
                    }
                })
     })

    $('[name=btnXuatexcel]').click(function(e){
         $("#table_lophoc").table2excel({
            name: "DanhSach",
            filename: `Danh sách khen thưởng cuối năm lớp ${$('[name=Lop] option:selected').val()}.xls`, // do include extension
        });
    })

})
 
