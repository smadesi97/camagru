//Define global variables
let width = 500,
	height = 0,
	filter =  'none',
	streaming = false;

//We also need DOM elements here
const video = document.getElementById('video');
const img = document.getElementById('img');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');
const file_choose = document.getElementById('fileToUpload');
const save = document.getElementById('save');
const hidden = document.getElementById('stickerName');
const taken = document.getElementById('taken');
const img_upload = document.getElementById('imgUpload');
//Here we wanna get the media streaming
navigator.mediaDevices.getUserMedia({video: true, audio: false})
//We want the camera to do this
.then(function(stream){
	//link to the video source
	video.srcObject = stream;
	//play video
	video.play();
})
//But if theres an error then just desplay the error
.catch(function(err){
	console.log('Error: ${err}');
});

// file_choose.addEventListener('change', (event)=>{
// 	var reader = new FileReader;
// 	reader.addEventListener('load', (event) => {
// 		img.src = reader.result;
// 	});
// 	reader.readAsDataURL(file_choose.files[0]);
// });
//play when ready
video.addEventListener('canplay',(event)=>{
	if (!streaming)
	{
		//set video/canvas height
		height = video.videoHeight / (video.videoWidth / width);
		//setAttributes adds a new attribute node to the specified element.
		video.setAttribute('width', width);
		video.setAttribute('height', height);
		canvas.setAttribute('width', width);
		canvas.setAttribute('height', height);
		//we also set the streaming to be true
		streaming = true;
	}
}, false);

 //Clear Event
//  clearButton.addEventListener('click', function(e){
 	//clear photos
 	// photoButton.innerHTML = '';
//  })

photoButton.addEventListener('click', function(event)
{
	takePicture();
},false);

// photoButton.addEventListener('click', function (event) {
// 	placeEmoji();
// }, false);

//
function placeEmoji(emoj){
//this function will place emoji on ccanvas
	emoji = document.createElement('img');
	emoji.setAttribute('id', "stickerName");
	if (emoj == 1)
	{
	//	canvas.getContext('2d').clearRect(50, 50, 100, 100);
		alert("Sticker1");
		emoji.setAttribute('src', "camera/img/sticker1.png");
		hidden.value = "sticker1.png";
	}
	else if (emoj == 2)
	{
	//	canvas.getContext('2d').clearRect(50, 50, 100, 100);
		alert("Sticker2");
		emoji.setAttribute('src', "camera/img/sticker2.png");
		hidden.value = "sticker2.png";
	}else if(emoj == 3)
	{
	//	canvas.getContext('2d').clearRect(50, 50, 100, 100);
		alert("Sticker3");
		emoji.setAttribute('src', "camera/img/sticker3.png");
		hidden.value = "sticker3.png";
	}else if (emoj == 4)
	{
		//canvas.getContext('2d').clearRect(50, 50, 100, 100);
		alert("Sticker4");
		emoji.setAttribute('src', "camera/img/sticker4.png");
		hidden.value = "sticker4.png";
	}
//	canvas.getContext('2d').drawImage(emoji, 50, 50, 100, 100);
}
count = 0;
function takePicture(){

	const contex = canvas.getContext('2d');
	// if (width && height){
		//set canvas props
		 canvas.width = width;
		 canvas.style.height = height;
		//draw image of the video on the canvas

		//is drawing image FROM the video stream to the canvas
		contex.drawImage(video, 0, 0, width, height);
		taken.value = 'true';
		///this is drawing FROM your own picture of choice, to canvas

		 //0, 0 is where we start drawing on the x & y axist.
		//  if (img)
		//  	contex.drawImage(img, 0, 0, width, height);
		//  image2 = new Image();
		//  image2.src = "../img/s1.png";
		//  contex.drawImage(image2, 0, 0);
	// }
}

save.addEventListener('click', function(event)
{
	// We take image name from image tag
	var stickerName = hidden.value
	var http = new XMLHttpRequest();
	var param = "image_name=" + canvas.toDataURL('image/png')+"&sticker_name="+stickerName +"&taken="+taken.value;
	http.onreadystatechange = function () {
		if (http.readyState === 4) {
			if (http.status === 200) {
				if (taken.value == 'true')
					displayImage(http.responseText);
				taken.value = 'false';
				hidden.value = "";
			}
		}
	};
	http.open('POST', 'scripts/combine_pics.php', true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send(param);
}, false);
function displayImage(image_name)
{
	++count;
	var img = document.createElement('img');
	var li = document.createElement('li');
	li.setAttribute('class', 'nav-item');
	img.id = 'pic' + count;
	img.setAttribute('src', "views/includes/uploads/"+image_name);
	img.setAttribute('class', "user-images");
	li.appendChild(img);
	if (photos.firstChild) {
		photos.insertBefore(li, photos.firstChild);
	}
	else {
		photos.appendChild(li);
	}
}

file_choose.addEventListener('change', (event) => {
	var reader = new FileReader;
	reader.addEventListener('load', (event) => {
		img_upload.src = reader.result;
	});
	reader.readAsDataURL(file_choose.files[0]);
	const contex = canvas.getContext('2d');
	// if (width && height){
	//set canvas props
	canvas.width = width;
	canvas.style.height = height;
	//draw image of the video on the canvas

	//is drawing image FROM the video stream to the canvas
	contex.drawImage(img_upload, 0, 0, width, height);
	taken.value = 'true';
});

