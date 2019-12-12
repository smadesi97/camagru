function likes(likee){

	alert("liked");
	console.log(likee);

	console.log(likee.getAttribute("data-img_id"));
	console.log(likee.getAttribute("data-loggedin"));
	variableString = 'imageid=' + likee.getAttribute("data-img_id") + '&username' + likee.getAttribute("data-loggedin");
	jQuery.ajax({
		type: "POST",
		url: "127.0.0.1:8081/CAMAGRU/views/like.php",
		data: variableString,
		success: function (msg) {
			alert("Data Saved: " + msg);
		}
	});
}
