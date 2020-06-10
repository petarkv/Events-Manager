/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});


//Change Price & Stock with Ticket Type
$(document).ready(function(){	
	$("#selType").change(function(){				
		var idType = $(this).val();
		if (idType=="") {
			return false;
		}	
		//alert(idType);	
		$.ajax({
			type:'GET',
			url:'/get-event-price',
			//url:'/products/{id}/size/{size}/price',
			data:{"idType":idType},			
			success:function(resp){
				 //alert(resp); return false;
				var arr = resp.split('#');           

				//$("#getPrice").html("EUR "+resp);
				$("#getPrice").html("EUR "+arr[0]);
				$("#price").val(arr[0]);
				if(arr[1]==0){
					$("#cartButton").hide();
					$("#Availability").text("Out of Stock");
				}else{
					$("#cartButton").show();
					$("#Availability").text("In Stock");
				}
			},error:function(){
				alert("Error"); 
			}
		});
	});
});



//Replace Main Image with Alternate Image
$(document).ready(function(){
	$(".changeImage").click(function(){
		var image = $(this).attr("src");
		$(".mainImage").attr("src",image);
	});
});


// LOGIN / REGISTER USERS
$().ready(function(){
	// VALIDATE REGISTER FORM
	$("#userRegisterForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept: "[a-zA-Z]+"
			},
			surname:{
				required:true,
				minlength:2,
				accept: "[a-zA-Z]+"
			},
			username:{
				required:true,
				minlength:2,
				remote:"/check-username"			
			},
			password:{
				required:true,
				minlength:6
			},
			repassword:{
				required:true,
				minlength:6,
				equalTo:"#myPassword"
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			},
			avatar:{
				required:false
			}			
		},
		messages:{
			name:{
				required: "Please enter Your Name",
				minlength:"Your Name must be atleast 2 characters long",
				accept:"Your Name must contain letters"
			},
			surname:{
				required: "Please enter Your Surname",
				minlength:"Your Surname must be atleast 2 characters long",
				accept:"Your Surname must contain letters"
			},
			username:{
				required: "Please enter Your Username",
				minlength:"Your Username must be atleast 2 characters long",
				remote:"Username already exists!"				
			},			
			password:{
				required:"Please provide Your Password",
				minlength:"Your Password must be atleast 6 characters long"
			},
			repassword:{
				required:"Please provide Your Password",
				minlength:"Your Password must be atleast 6 characters long",
				equalTo:"RePassword is not equal as Password"
			},
			email:{
				required:"Please enter Your Email",
				email:"Please enter valid Email",
				remote:"Email already exists!"
			}
		},		
	});

	// VALIDATE LOGIN FORM
	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email:true
			},			
			password:{
				required:true
			}				
		},
		messages:{
			email:{
				required:"Please enter Your Email",
				email:"Please enter valid Email"
			},			
			password:{
				required:"Please provide Your Password"				
			}	
		},
		
	});

	// PASSWORD STRENGTH SCRIPT
	$('#myPassword').passtrength({
		minChars: 6,
		passwordToggle: true,
		tooltip: true,		
		eyeImg : "/images/frontend_images/eye.svg"
	});
});



// UPDATE USER ACCOUNT
$().ready(function(){
		// USER ACCOUNT UPDATE		
		$("#accountForm").validate({
			rules:{
				name:{
					required:true,
					minlength:2,
					accept: "[a-zA-Z]+"
				},
				surname:{
					required:true,
					minlength:2,
					accept: "[a-zA-Z]+"
				},
				address:{
					required:true,
					minlength:6					
				},
				city:{
					required:true,
					minlength:2					
				},				
				country:{
					required:true								
				},
				
						
			},
			messages:{
				name:{
					required: "Please enter Your Name",
					minlength:"Your Name must be atleast 2 characters long",
					accept:"Your Name must contain letters"
				},
				surname:{
					required: "Please enter Your Surname",
					minlength:"Your Surname must be atleast 2 characters long",
					accept:"Your Surname must contain letters"
				},
				address:{
					required: "Please enter Your Address",
					minlength:"Your Address must be atleast 6 characters long"									
				},
				city:{
					required: "Please enter Your City",
					minlength:"Your City must be atleast 2 characters long"									
				},				
				country:{
					required: "Please enter Your Country"											
				},	

			},
			
		});

	// CHECK CURRENT USER PASSWORD
	$("#current_password").keyup(function(){
		var current_password = $(this).val();
		//alert(current_password);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type:'post',
			url:'/check-user-password',
			data:{current_password:current_password},
			success:function(resp) {
				//alert(resp);
				if (resp=="false") {
					$("#chkPwd").html("<font color='red'>Current Password is incorrect</font>");
				}else if(resp=='true'){
					$("#chkPwd").html("<font color='green'>Current Password is correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	// VALIDATE NEW USER PASSWORD
	$("#passwordForm").validate({
		rules:{
			current_password:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_password:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_password:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_password"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	

	// COPY BILLING ADDRESS TO SHIPPING ADDRESS
	$("#billtoship").on('click',function(){
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_surname").val($("#billing_surname").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_state").val($("#billing_state").val());
			$("#shipping_country").val($("#billing_country").val());
			$("#shipping_pincode").val($("#billing_pincode").val());
			$("#shipping_mobile").val($("#billing_mobile").val());
		}else{
			$("#shipping_name").val('');
			$("#shipping_surname").val('');
			$("#shipping_address").val('');
			$("#shipping_city").val('');
			$("#shipping_state").val('');
			$("#shipping_country").val('');
			$("#shipping_pincode").val('');
			$("#shipping_mobile").val('');
		}
	});


});

// SELECT PAYMENT METHOD ORDER REVIEW PAGE
function selectPaymentMethod() {
	//alert("Kupi");
	if($("#Paypal").is(':checked') || $("#COD").is(':checked')){
		//alert("checked");
	}else{
		alert("Please select Payment Method");
		return false;
	}
	
}

