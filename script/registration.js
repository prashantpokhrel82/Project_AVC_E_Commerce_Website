//signu login_validate
function signUpValidate(){
	var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var mobile = document.getElementById('mobile').value;
	var gender = "";
	var radios = document.getElementsByName('gender');
	for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
					gender = radios[i].value;
					break;
			}
	}
	console.log(first_name+last_name+email+password+mobile+gender);

}
//end of signup validate
