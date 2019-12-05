    const getIndexOf = (mahocsinh, array) =>
    {
    	for(let i=0; i < array.length; i++) {
    		if((array[i].split('-'))[1] == mahocsinh) {
    			return i;
    		}
    	}
    	return -1;
    }

$(function() {
	// body...

	var array=[];

	$('[name=Khoi]').change(function(){
         window.location.href=`/QLHS/public/chuyenlop?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/chuyenlop?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })

    $('[name=Lop_con').change(function()
    {
    	let newmalop = $(this).children('option:selected').attr("id");
    	var row = $(this).closest("tr")[0];
    	let mahocsinh = row.cells[1].innerText;
    	let malopcu = $('[name=Lop] option:selected').attr("id");
    	if(newmalop != malopcu)
    		array.push(malopcu+"-"+mahocsinh+"-"+newmalop);
    	else
    		array.splice(getIndexOf(mahocsinh, array),1);
    	//console.log('va = ', getIndexOf(mahocsinh, array));
    	console.log(array);
    })

    $('[name=btnCapNhat]').click(function(){
        $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
                    url: '/QLHS/public/capnhat-chuyenlop',
                    type: 'PUT',
                    data: {
                        list: array
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg == "Cập nhật chuyển lớp học thành công!")
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