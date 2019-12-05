
var giatricannghe = document.getElementsByName("giatri");
var giatricannghe_nlpc = document.getElementsByName("nlpc");

$(function() {
	// body...

	var arraykqht=[];
    var arraynlpc=[];

    //
    for(let i=0; i < giatricannghe.length; i++) 
    {
        giatricannghe[i].addEventListener("input", function(e) {
            let string = e.target.attributes[1].textContent;
            let loai = (string.split('-'))[3];
            console.log("loai = ", loai);
            if(loai == 'diemkt') {
                let flag = true;
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
            if(loai == 'mucdatduoc') {
                let flag = true;
                for(let i = 0; i< (e.target.innerText).length; i++)
                {
                    if ((e.target.innerText)[i] != 'T' && (e.target.innerText)[i] != 'H' && (e.target.innerText)[i] != 'C') {
                        console.log("Không phải T, H, C = ", (e.target.innerText)[i]);
                        e.srcElement.style.borderColor = "red";
                        e.srcElement.style.borderWidth = "3px";
                         $('[name=textloi]')[0].innerText = "";
                        $("#xuatloi").css({display: "block"});
                        $('[name=textloi]')[0].append("Mức đạt được chỉ nhận giá trị T, H, C!");
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

    for(let i=0; i < giatricannghe_nlpc.length; i++) 
    {
        giatricannghe_nlpc[i].addEventListener("input", function(e) {
            let string = e.target.attributes[1].textContent;
            let loai = (string.split('-'))[3];
            let isGhichu = (string.split('-'))[1];
            console.log("loai = ", loai);
            if(loai == 'mucdatduoc') {
                let flag = true;
                for(let i = 0; i< (e.target.innerText).length; i++)
                {
                    if ((e.target.innerText)[i] != 'Đ' && (e.target.innerText)[i] != 'T' && (e.target.innerText)[i] != 'C' && isGhichu != 'Ghi chú') {
                        console.log("Không phải T, Đ, C = ", (e.target.innerText)[i]);
                        e.srcElement.style.borderColor = "red";
                        e.srcElement.style.borderWidth = "3px";
                        $('[name=textloi]')[0].innerText = "";
                        $("#xuatloi").css({display: "block"});
                        $('[name=textloi]')[0].append("Mức đạt được chỉ nhận giá trị T, Đ, C!");
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

    //chon khoi, lop la loc du lieu

	$('[name=Khoi]').change(function(){
         window.location.href=`/QLHS/public/kqht?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/kqht?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })

    $('[name=Thoidiemdanhgia]').change(function(e){
         window.location.href=`/QLHS/public/kqht?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}&thoidiemdanhgia=${$('[name=Thoidiemdanhgia]').val()}`;
    })

    $('[name=giatri]').on('blur keyup paste input', '[contenteditable]', function(){
            let nhandien = (($(this).attr("giatri")).split('-'))[2];
           
            console.log('kqht = ', nhandien);
         });

    //cach lay val conteneditable

    $('[name=btnCapNhat]').click(function(e){
         $('[name=giatri]').each(function(){
            let val = $(this)[0].innerText || "*";
            let nhandien = $(this).attr("giatri");
            arraykqht.push(val+'-'+nhandien);
            console.log('kqht = ', arraykqht);
         });

        $('[name=nlpc]').each(function(){
            let val2 = $(this)[0].innerText || " ";
            let nhandien2 = $(this).attr("giatri");
            //console.log('valgi = ', val);
            arraynlpc.push(val2+'-'+nhandien2);
            console.log('kqnl = ', arraynlpc);
         });

         $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         $.ajax({
                    url: '/QLHS/public/capnhat-kqht',
                    type: 'PUT',
                    data: {
                        kqht: arraykqht,
                        nlpc: arraynlpc,
                        thoidiemdanhgia: $('[name=Thoidiemdanhgia]').val()
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg == "Cập nhật kết quả học tập thành công!")
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
    
})