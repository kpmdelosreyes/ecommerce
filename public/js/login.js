$("#submit_reg").live("click",function(){
	Login.isValid();
	
});

$("#login_submit").live("click",function(){
	Login.doLogin();
});

var Login = {
	
	doLogin : function(){
		var email = $("input[name='login_email']").val(), password = $("input[name='login_password']").val();
		$("form#loginForm").submit();
	},
	
	isValid : function(){
		var fname = $("input[name='reg_fname']").val(),
			lname = $("input[name='reg_lname']").val(),
			email = $("input[name='reg_email']").val(),
			email2 = $("input[name='reg_email2']").val(),
			password = $("input[name='reg_password']").val(),
			gender = $("select[name='reg_gender']").val(), 
			birthday = $("select[name='reg_dob_year']").val() + "/" + $("select[name='reg_dob_month']").val() + "/" + $("select[name='reg_dob_day']").val();
			
		var error = false;
		var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
		var valid = emailRegex.test(email);

		if (valid == false) {
			$("#email").addClass("error");
			$("#email_verify").text("Invalid e-mail address");
			error = true;
		}			
		if (fname == "") {
			$("#fname").addClass("error");
			$("#fname_verify").text("First Name is required");
			error = true;
		}
		if (lname == "") {
			$("#lname").addClass("error");
			$("#lname_verify").text("Last Name is required");
			error = true;
		}
		if (email == "") {
			$("#email").addClass("error");
			$("#email_verify").text("Email is required");
			error = true;
		}
		if (email2 == "" || email != email2) {
			$("#email2").addClass("error");
			$("#email2_verify").text("Please re-type email");
			error = true;
		}
		if (password == "") {
			$("#password").addClass("error");
			$("#password_verify").text("Password is required");
			error = true;
		}
		if (gender == "") {
			$("#gender").addClass("error");
			$("#gender_verify").text("Gender is required");
			error = true;
		}
		if (birthday == "") {
			$("#birthday").addClass("error");
			$("#birthday_verify").text("Birthday is required");
			error = true;
		}
		
		if (error == false) {
			$('form#registrationForm').submit();
		}
	}
}
    