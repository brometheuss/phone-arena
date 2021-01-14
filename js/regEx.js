//Client side checking
var greske = Array();

function checkForm(){
	
	var firstName = document.getElementById('tbFirstName');
	var lastName = document.getElementById('tbLastName');
	var email = document.getElementById('tbEmail');
    var userName = document.getElementById('tbUsername');
	var gender = document.regFormm.rbGender;
	
	var information = new Array();
	var	errors = new Array();
	
	var reFirstName = /^[A-Z][a-z]{1,20}$/;
	var reLastName = /^[A-Z][a-z]{1,20}(\s[A-Z][a-z]{1,20})*$/;
	var reEmail = /^[a-z0-9=+-_&^%]{3,20}@([a-z]{2,8}\.[a-z]{2,6}|[a-z]{2,8}\.[a-z]{2,4}\.[a-z]{2,4})$/;
    var reUserName = /^[A-z0-9-.]{3,}$/;
	
	//First name check
	if(firstName.value.match(reFirstName)){
		document.getElementById('labelFirstName').innerHTML = "Good!";
		document.getElementById('labelFirstName').style.color = "#00FF00";
       
	}
	else{
		document.getElementById('labelFirstName').innerHTML = "A-z characters allowed";
		document.getElementById('labelFirstName').style.color = "#FF0000";
        
	}
	
	//Last name check
	if(lastName.value.match(reLastName)){
		document.getElementById('labelLastName').innerHTML = "Looks OK!";
		document.getElementById('labelLastName').style.color = "#00FF00";
	}
	else{
		document.getElementById('labelLastName').innerHTML = "A-z characters allowed";
		document.getElementById('labelLastName').style.color = "#FF0000";
	}
    
    //Email
	if(email.value.match(reEmail)){
		document.getElementById('labelEmail').innerHTML = "Nice!";
		document.getElementById('labelEmail').style.color = "#00FF00";
	}
	else{
		document.getElementById('labelEmail').innerHTML = "Invalid email adress";
		document.getElementById('labelEmail').style.color = "#FF0000";
	}
	
    //Username
    if(userName.value.match(reUserName)){
        document.getElementById('labelUsername').innerHTML = "Available";
        document.getElementById('labelUsername').style.color = "#00FF00"
    }
    else{
        document.getElementById('labelUsername').innerHTML = "Wrong format.";
        document.getElementById('labelUsername').style.color = "#FF0000";
    }
	
	//Gender
	var genderStatus = "";
	for(var i = 0; i < gender.length; i++ ){
		if(gender[i].checked){
			genderStatus = gender[i].value;
		}
	}
	
	if(genderStatus == ""){
		document.getElementById('spanGender').innerHTML = "Select your gender.";
		document.getElementById('spanGender').style.color = "#FF0000";
	}
	else{
		document.getElementById('spanGender').innerHTML = "You're good to go!";
		document.getElementById('spanGender').style.color = "#00FF00";
	}
	
	//birth date check
	var ddlDay = document.regFormm.ddlDay.options[document.regFormm.ddlDay.selectedIndex];
	var ddlMonth = document.regFormm.ddlMonth.options[document.regFormm.ddlMonth.selectedIndex];
    var ddlYear = document.regFormm.ddlYear.options[document.regFormm.ddlYear.selectedIndex];
	
	if(ddlDay.value == "Day" || ddlMonth.value == "Month" || ddlYear.value == "Year"){
		document.getElementById('labelDate').innerHTML = "Select your birth date";
		document.getElementById('labelDate').style.color = "#FF0000";
	}
	else{
		document.getElementById('labelDate').innerHTML = "Yay!";
		document.getElementById('labelDate').style.color = "#00FF00";
	}
    
    
}

function passCheck(){
    
    var pass = document.getElementById('tbPassword');
	var passConfirm = document.getElementById('tbPassword2');
    
    var rePass = /^[A-z]{6,}[0-9]{1,}$/;
    
    //Password check
	if(pass.value.match(rePass)){
		document.getElementById('labelPassword').innerHTML = "Nice!";
		document.getElementById('labelPassword').style.color = "#00FF00";
	}
	else{
		
		document.getElementById('labelPassword').innerHTML = "Must have min 6 letters and a digit";
		document.getElementById('labelPassword').style.color = "#FF0000";
	}
	
	//Password again
	
		if(pass.value == passConfirm.value){
			document.getElementById('labelPassword2').innerHTML = "Passwords match!";
			document.getElementById('labelPassword2').style.color = "#00FF00";
		}
		else{
			document.getElementById('labelPassword2').innerHTML = "Passwords don't match!";
			document.getElementById('labelPassword2').style.color = "#FF0000";
		}
}

function checkForm1(){
    
    if(greske.length == 0){
        var forma = document.getElementById('regFormm');
        forma.action = "index.php?page=signup&btnSignUp=1" ;
        forma.submit();
    }
    
}

















