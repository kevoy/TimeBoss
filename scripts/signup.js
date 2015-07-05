
window.onload =function(){
	var signupBtn = document.getElementById('signup-btn');
	signupBtn.onclick = signup;
}
function signup(){
	var email = document.getElementById("email-field").value;
	var password = document.getElementById("password-field").value;
	var confirm = document.getElementById("c-password-field").value;
	
	new Ajax.Request("main.php",
		{
			parameters: {
				'class':'user',
				'method':'signup',
				email: email,
				password: password
			},
			method: 'post',
			onSuccess: signupResponse
		});
}
function signupResponse(data){
	if(data.responseText == "success"){
		window.location = "account.php";
	}else{
		alert("Signup Failure");
	}
}