<!-- <script>
	var curr_object = [];
	(function() {
		var video = document.getElementById('video'),
			canvas = document.getElementById('canvas'),
			q
		context = canvas.getContext('2d'),
			vendorUrl = window.URL || window.webkitURL;

		navigator.getMedia = navigator.getUserMedia ||
			navigator.webkitGetUserMedia ||
			navigator.mozGetUserMedia ||
			navigator.msGetUserMedia;
		navigator.getMedia({
			video: true,
			audio: false
		}, function(stream) {
			video.src = vendorUrl.createObjectURL(stream);
			video.play();
		}, function(error) {
			//error code
		});
		document.getElementById('capture').addEventListener('click', function() {
			context.drawImage(video, 0, 0, 400, 300);

		});
	})();
	document.getElementById('save_image').addEventListener('click', function() {
		var img = canvas.toDataURL('image/jpeg');
		var field = document.getElementById('image-url');
		var overlay = document.getElementById('watermark');
		field.value = img;
		overlay.value = curr_object[0];
		document.getElementById('image-form').submit();
	});
	document.getElementById('hearts').addEventListener("click", function() {
		alert('Hearts Selected');
		curr_object[0] = "hearts.png";
	});
	document.getElementById('kitty').addEventListener("click", function() {
		alert('kitty Selected');
		curr_object[0] = "kitty.png";
	});
	document.getElementById('mario').addEventListener("click", function() {
		alert('mario Selected');
		curr_object[0] = "mario.png";
	});
	document.getElementById('bird').addEventListener("click", function() {
		alert('bird Selected');
		curr_object[0] = "bird.png";
	});
	document.getElementById('flower').addEventListener("click", function() {
		alert('flower Selected');
		curr_object[0] = "flower.png";
	});
	window.onload = function() {
		var c = document.getElementById('canvas');
		var ctx = c.getContext("2d");
	}
</script> -->
