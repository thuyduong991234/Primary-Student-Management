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
         window.location.href=`/QLHS/public/qlchuyentruong?khoi=${$('[name=Khoi]').val()}`;
    })

    $('[name=Lop]').change(function(e){
        //console.log('e la gi = ', $('[name=Lop] option:selected').attr("id"));

         window.location.href=`/QLHS/public/qlchuyentruong?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}`;
    })

    $('[name=Trangthai]').change(function(e){
         window.location.href=`/QLHS/public/qlchuyentruong?khoi=${$('[name=Khoi]').val()}&lop=${$('[name=Lop] option:selected').attr("id")}&trangthai=${$('[name=Trangthai]').val()}`;
    })
    
})