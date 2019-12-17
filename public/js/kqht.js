var giatricannghe = document.getElementsByName("giatri");
var giatricannghe_nlpc = document.getElementsByName("nlpc");


document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("myInput").files[0].name;
  var nextSibling = e.target.nextElementSibling;
  nextSibling.innerText = fileName;
})


$(function() {
	// body...

	var arraykqht=[];
    var arraynlpc=[];
    var arraylenlop=[];
    var arrayhoanthanhctlh=[];
    var arraykhenthuong=[];



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
                        $('[name=textloi1]')[0].innerText = "";
                        $("#xuatloi1").css({display: "block"});
                        $('[name=textloi1]')[0].append("Bạn cần nhập điểm trong khoảng từ 0 đến 9!");
                        $("#xuatloi1").show();
                        flag = false;
                    }
                }
                if(flag)
                {
                    e.srcElement.style.borderColor = "";
                    e.srcElement.style.borderWidth = "";
                    $("#xuatloi1").css({display: "none"});
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
                         $('[name=textloi1]')[0].innerText = "";
                        $("#xuatloi1").css({display: "block"});
                        $('[name=textloi1]')[0].append("Mức đạt được chỉ nhận giá trị T, H, C!");
                        $("#xuatloi1").show();
                        flag = false;
                    }
                }
                if(flag)
                {
                    e.srcElement.style.borderColor = "";
                    e.srcElement.style.borderWidth = "";
                    $("#xuatloi1").css({display: "none"});
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
                        $('[name=textloi1]')[0].innerText = "";
                        $('#xuatloi1').css({display: "block"});
                        $('[name=textloi1]')[0].append("Mức đạt được chỉ nhận giá trị T, Đ, C!");
                        $('#xuatloi1').show();
                        flag = false;
                    }
                }
                if(flag)
                {
                    e.srcElement.style.borderColor = "";
                    e.srcElement.style.borderWidth = "";
                    $("#xuatloi1").css({display: "none"});
                }
            }
        })
    }


    $('[name=checkbox_one]').each(function () {

        if($(this)[0].checked)
        {
            arraylenlop.push($(this)[0].attributes[2].value);
            console.log("lenlop = ", arraylenlop);
        }

        return true;
        });

    $('[name=checkbox_one1]').each(function () {

        if($(this)[0].checked)
        {
            arrayhoanthanhctlh.push($(this)[0].attributes[2].value);
            console.log("hoanthanh = ", arrayhoanthanhctlh);
        }

        return true;
        });

    $('[name=checkbox_one2]').each(function () {

        if($(this)[0].checked)
        {
            arraykhenthuong.push($(this)[0].attributes[2].value);
            console.log("khenthuong = ", arraykhenthuong);
        }
        return true;
        });
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

    $('[name=checkbox_one]').click(function () {

        if($(this)[0].checked)
        {
            arraylenlop.push($(this)[0].attributes[2].value);
           console.log("lenlop = ", arraylenlop);
        }
        else
        {
            arraylenlop.splice(arraylenlop.indexOf($(this)[0].attributes[2].value), 1);
            console.log("lenlop = ", arraylenlop);
        }

        return true;
        });

    $('[name=checkbox_one1]').click(function () {

        if($(this)[0].checked)
        {
            arrayhoanthanhctlh.push($(this)[0].attributes[2].value);
            console.log("hoanthanh = ",arrayhoanthanhctlh);
        }
        else
        {
            arrayhoanthanhctlh.splice(arrayhoanthanhctlh.indexOf($(this)[0].attributes[2].value), 1);
            console.log("hoanthanh = ",arrayhoanthanhctlh);
        }

        return true;
        });

    $('[name=checkbox_one2]').click(function () {

        if($(this)[0].checked)
        {
            arraykhenthuong.push($(this)[0].attributes[2].value);
            console.log("khenthuong = ",arraykhenthuong);
        }
        else
        {
            arraykhenthuong.splice(arraykhenthuong.indexOf($(this)[0].attributes[2].value), 1);
            console.log("khenthuong = ",arraykhenthuong);
        }

        return true;
        });

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
                        thoidiemdanhgia: $('[name=Thoidiemdanhgia]').val(),
                        arraylenlop: arraylenlop,
                        arrayhoanthanhctlh: arrayhoanthanhctlh,
                        arraykhenthuong: arraykhenthuong,
                        malophoc: $('[name=Lop] option:selected').attr("id")
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

    $('[name=btnXuatexcel]').click(function(e){
        window.location.href=`/QLHS/public/xuatexcelKQHT?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}&thoidiemdanhgia=${$('[name=Thoidiemdanhgia]').val()}`;
    })
    
})