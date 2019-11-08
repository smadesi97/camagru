//Define global variables
let width = 500,
	height = 0,
	filter =  'none',
	streaming = false;

//We also need DOM elements here
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');
const photoFilter = document.getElementById('photo-filter');

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

photoButton.addEventListener('click', function(event){
	takePicture();
},false);

count = 0;
function takePicture(){
	//create convas
	++count;
	var canvas = document.createElement('canvas');
	var li = document.createElement('li');
	li.setAttribute('class', 'nav-item');
	canvas.id = 'pic'+count;
	canvas = styleCanvas(canvas);
	li.appendChild(canvas);
	if (photos.firstChild)
	{
		photos.insertBefore(li, photos.firstChild);
	}
	else
	{
		photos.appendChild(li);
	}
	const contex = canvas.getContext('2d');
	 if (width && height){
		//set canvas props
		 canvas.width = width;
		 canvas.style.height = height;
		//draw image of the video on the canvas
		 contex.drawImage(video, 0, 0, width, height);
		 //0, 0 is where we start drawing on the x & y axist.
		 contex.drawImage(img, 0, 0, width, height);
	 }
}
function styleCanvas(canvas) {
	canvas.width = 300;
	canvas.height = 300;
	canvas.style.display = 'inline-block';
	canvas.style.borderRight = '1px solid #f5f7f6';
	canvas.style.cssFloat = 'right';
	canvas.style.boxShadow = '0px 9px 8px 0px darkgrey';
	canvas.style.marginBottom = '10px';
	return canvas;
}
