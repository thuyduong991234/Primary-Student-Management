$(function () {
	$('[name=namhoc]').change(function()
    {
    	var now = new Date();
  var time = now.getTime();
  var expireTime = time + 1000*3600*24*365;
  now.setTime(expireTime);

		console.log($('[name=namhoc]').val());
		document.cookie = `namhoc = ${$('[name=namhoc]').val()};expires=${now.toGMTString()};path=/`;
		document.cookie = `hocki = ${$('[name=hocki]').val()};expires=${now.toGMTString()};path=/`;
		
		console.log(getCookie());
	})
});

	function getCookie()
	{
		let str = document.cookie;
		let arrstr = str.split("; ");
		let info = {};
		info.namhoc = (arrstr[1].split('='))[1];
		info.hocki = (arrstr[0].split('='))[1];
		return info;
	}