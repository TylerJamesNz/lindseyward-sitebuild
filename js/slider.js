/*
** Image slider for Lindsey Ward real estate website 2014 ver 1.0
*/

/* Variables
======================================== */
var delay = 200;
var transition = 30;
var timer = 0;
var timerSpeed = 33.3;

var slider = document.getElementById('primary-slider');
var imgFrame = slider.getElementsByClassName('img-frame')[0];
var images = slider.getElementsByClassName('slider-image');
var headerText = slider.getElementsByTagName('h2')[0];
var addressText = slider.getElementsByClassName('address-subhead')[0];
var amenitiesText = slider.getElementsByClassName('amenities-subhead')[0];
var descriptionText = slider.getElementsByClassName('image-description')[0];
var currentImage = 0;

/* Initialization
======================================== */
sliderInit(); // Position the images and initialize the slider text.
slideUpdate = setInterval(slideUpdater, timerSpeed);


/* Functionality
======================================== */
function slideUpdater() // The update loop for the slider which keeps everything moving in time.
{
	timer ++;
	var imageSpeed = images[0].offsetWidth / transition

	if(timer > delay) // If the timer reaches the end of the delay time transition.
	{
		for(var i=0; i<images.length; i++) // Transition each image one width to the left over the duration of the transition variable.
		{
			images[i].style.left = images[i].offsetLeft + imageSpeed + 'px';
		}
		if(timer > delay + transition - 1) // After the transition period move the last slide to the front of the stack, change the text and reset the timer.
		{
			images[currentImage].style.left = ((images.length - 1) * -1) * images[currentImage].offsetWidth + 'px';
			timer = 0;
			currentImage++;
			
			if(currentImage > images.length - 1) // If the next heighest image index is unavailable set it to 0.
			{
				currentImage = 0;
			}

			headerText.innerHTML = sliderContent[currentImage]['header'];
			addressText.innerHTML = sliderContent[currentImage]['address'];
			amenitiesText.innerHTML = sliderContent[currentImage]['amenities'];
			descriptionText.innerHTML = sliderContent[currentImage]['description'];
		}
	}
}

function sliderInit() // Position the images and initialize the slider text.
{
	for(var i = 0; i < images.length; i++) // Iterate through the images and position them based on index.
	{
		images[i].style.left = (images[i].offsetWidth * i) * -1 + 'px';
		headerText.innerHTML = sliderContent[currentImage]['header'];
		addressText.innerHTML = sliderContent[currentImage]['address'];
		amenitiesText.innerHTML = sliderContent[currentImage]['amenities'];
		descriptionText.innerHTML = sliderContent[currentImage]['description'];
	}
}