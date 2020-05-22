// LOGIN / REGISTER USERS
$().ready(function(){
	// VALIDATE REGISTER FORM
	$("#userRegisterForm").validate({
		rules:{
			user_name:{
				required:true,
				minlength:2,
				accept: "[a-zA-Z]+"
			},
			user_surname:{
				required:true,
				minlength:2,
				accept: "[a-zA-Z]+"
			},
			user_username:{
				required:true,
				minlength:2,
				remote:"/check-username"			
			},
			user_pass:{
				required:true,
				minlength:6
			},
			user_repeatpass:{
				required:true,
				minlength:6,
				equalTo:"#user_pass"
			},
			user_email:{
				required:true,
				email:true,
				remote:"/check-email"
			}			
		},
		messages:{
			user_name:{
				required: "Please enter Your Name",
				minlength:"Your Name must be atleast 2 characters long",
				accept:"Your Name must contain letters"
			},
			user_surname:{
				required: "Please enter Your Surname",
				minlength:"Your Surname must be atleast 2 characters long",
				accept:"Your Surname must contain letters"
			},
			user_username:{
				required: "Please enter Your Username",
				minlength:"Your Username must be atleast 2 characters long",
				remote:"Username already exists!"				
			},			
			user_pass:{
				required:"Please provide Your Password",
				minlength:"Your Password must be atleast 6 characters long"
			},
			user_repeatpass:{
				required:"Please provide Your Password",
				minlength:"Your Password must be atleast 6 characters long",
				equalTo:"RePassword is not equal as Password"
			},
			user_email:{
				required:"Please enter Your Email",
				email:"Please enter valid Email",
				remote:"Email already exists!"
			}
		},
		
	});