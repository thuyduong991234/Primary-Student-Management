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
})

