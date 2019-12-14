window.onload = function() {
	let moreButton = document.getElementById("addMore");
	let fieldCount =  document.getElementById("fieldCount");
	moreButton.addEventListener("click", function() {
		fieldCount.value++;
		let newInput = document.createElement('div');
		newInput.innerHTML = '<label for="employee-' + fieldCount.value + '">Employee no. ' + fieldCount.value + ':</label> <input name="employee-' + fieldCount.value + '" type="text">';
		moreButton.parentNode.insertBefore(newInput, moreButton);
	});
}