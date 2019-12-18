window.onload = function() {
	//handle the dropdown on mouse hover
	let collapsedMenus = document.getElementsByClassName("menu-item-has-children");
	for (let i = 0; i < collapsedMenus.length; i++) {
		collapsedMenus[i].addEventListener('mouseover', function() {
			let dropdown = collapsedMenus[i].getElementsByClassName('dropdown')[0];
			dropdown.classList.add("show");
			dropdown.firstElementChild.classList.add("show");
		});
		collapsedMenus[i].addEventListener('mouseout', function() {
			let dropdown = collapsedMenus[i].getElementsByClassName('dropdown')[0];
			dropdown.classList.remove("show");
			dropdown.firstElementChild.classList.remove("show");
		})
		//add down chevrons to relevant items
		collapsedMenus[i].firstElementChild.innerHTML += ' <i class="fas fa-chevron-down"></i>';
	};
	
	//set the height of images with fixedHeight class to a 4:3 ratio to the height
	function resizeImages (images) {
		for (let i = 0; i < images.length; i++) {
			images[i].style.height = (images[i].offsetWidth / 1.33330) + "px";
		};
	}
	let images = document.getElementsByClassName("fixedHeight");
	resizeImages (images);
	window.addEventListener('resize', function() {
		resizeImages (images);
	})
	
	//copy a part of the footer for diplaying on small devices
	document.getElementById("footer__contacts--copy").innerHTML = document.getElementById("footer__contacts--master").innerHTML
}