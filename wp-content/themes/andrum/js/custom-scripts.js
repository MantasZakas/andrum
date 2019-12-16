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
	let images = document.getElementsByClassName("fixedHeight");
	for (let i = 0; i < images.length; i++) {
		images[i].style.height = (images[i].offsetWidth / 1.33330) + "px";
	}
}
