var crossSignup = document.getElementById('signupCross');
var crossLogin = document.getElementById('loginCross');
var loginID = document.getElementById('loginID');
var signupID = document.getElementById('signupID');

var fakeWrapper = document.getElementById('fakeWrapperID');
var signupBox = document.getElementById('signupBoxID');
crossSignup.addEventListener('click', function() {
	fakeWrapper.style.display = "none";
	signupID.style.display = "none";
	signupBox.style.display = "none";

});

crossLogin.addEventListener("click", function() {
	fakeWrapper.style.display = "none";
	loginID.style.display = "none";
	signupBox.style.display = "none";


});

function showSignup() {
	fakeWrapper.style.display = "block";
	signupBox.style.display = "block";
	signupID.style.display = "block";
	loginID.style.display = "none";

}

function showLogin() {
	fakeWrapper.style.display = "block";
	signupBox.style.display = "block";
	signupID.style.display = "none";
	loginID.style.display = "block";

}
var initialPassword = document.getElementById('password'); 
var finalPassword = document.getElementById('verifyPasswordID');
var p = document.getElementById('p');
finalPassword.addEventListener('blur', function(){
	
	if(finalPassword.value !== ""){ //check if input form is empty.
		if(initialPassword.value === finalPassword.value){
			p.style.color = "#02b875";
			p.innerHTML = "Password Matches!";
		}else {
			p.style.color = "red";
			p.innerHTML = "Password Doesn't Match!"
			
		}
	}
});


var selectCategory = document.getElementById('CategoryID');
var unit = document.getElementById('unitFieldID');
selectCategory.addEventListener('change', function() {

	if(selectCategory.value == "Fruits" || selectCategory.value == "Vegetables"){
		
		unit.value = "kg";
	}
	if(selectCategory.value == "Machinery" || selectCategory.value == "Tools"  || selectCategory.value == "Fertilizers") {
		unit.value = "Parts"
	}
	if(selectCategory.value == "Land"){
		unit.value = "Ana";
	}
});

