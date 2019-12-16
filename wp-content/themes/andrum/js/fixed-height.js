//set the height of images with fixedHeight class to a 4:3 ratio to the height
window.onload = function() {
	let images = document.getElementsByClassName("fixedHeight");
	for (let i = 0; i < images.length; i++) {
		images[i].style.height = (images[i].offsetWidth / 1.33330) + "px";
	}
}