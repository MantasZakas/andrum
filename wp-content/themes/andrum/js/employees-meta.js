window.onload = function() {
	let moreButton = document.getElementById("addMore");
	let fieldCount =  document.getElementById("fieldCount");
	let selectOptions = document.getElementById("optionsBackup").innerHTML;
	console.log(selectOptions);
	moreButton.addEventListener("click", function() {
		fieldCount.value++;
		let newInput = document.createElement('div');
		let newEmployeeNo = fieldCount.value;
		newInput.innerHTML = 		
			'<p>Employee no. ' + newEmployeeNo + ':</p>'+
			'<label for="employee-' + newEmployeeNo + '-name">Name:</label>'+
			'<input name="employee-' + newEmployeeNo + '-name" type="text">'+
			'<label for="employee-' + newEmployeeNo + '-position">Position:</label>'+
			'<input name="employee-' + newEmployeeNo + '-position" type="text">'+
			'<br>'+
			'<label for="employee-' + newEmployeeNo + '-description">Description:</label>'+
			'<br>'+
			'<textarea rows="4" cols="60" name="employee-' + newEmployeeNo + '-description"></textarea>'+
			'<br>'+
			'<label for="employee-' + newEmployeeNo + '-qoute">Qoute:</label>'+
			'<br>'+
			'<textarea rows="4" cols="60" name="employee-' + newEmployeeNo + '-qoute"></textarea>'+
			'<br>'+
			'<label for="employee-' + newEmployeeNo + '-image">Select image from media library:</label>'+
			'<br>'+
			'<select name="employee-' + newEmployeeNo + '-image">'+
			selectOptions +
			'</select>'+
			'<hr>';
		moreButton.parentNode.insertBefore(newInput, moreButton);
	});
}