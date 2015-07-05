
window.onload =function(){
	var loginBtn = document.getElementById('login-btn');
	loginBtn.onclick = login;
}
function login(){
	var email = document.getElementById("email-field").value;
	var password = document.getElementById("password-field").value;
	
	new Ajax.Request("main.php",
		{
			parameters: {
				'class':'user',
				'method':'login',
				email: email,
				password: password
			},
			method: 'get',
			onSuccess: loginResponse
		});
}
function loginResponse(data){
	if(data.responseText == "success"){
		window.location = "account.php";
	}else{
		alert("Login Failure");
	}
}