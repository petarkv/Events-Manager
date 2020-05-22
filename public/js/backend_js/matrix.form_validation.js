
$(document).ready(function(){

	//PASSWORD UPDATE CHECK PASSWORD
	//alert("test");
	//$("#new_pwd").click(function(){
		$("#current_pwd").keyup(function(){
			var current_pwd = $("#current_pwd").val();
			//alert(current_pwd);
			$.ajax({
				type:'get',
				url:'/admin/check-pwd',
				data:{current_pwd:current_pwd},
				success:function(resp){
					//alert(resp);
					if (resp=="false") {
						$("#checkPass").html("<font color='red'>Current Password is Incorrect</font>")
					}else if (resp=="true"){
						$("#checkPass").html("<font color='green'>Current Password is Correct</font>")
					}
				},error:function(){
					alert("Error");
				}			
			});
		});
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
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

	// ADD CATEGORY VALIDATION
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,				
			},			
			url:{
				required:true,				
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

	// EDIT CATEGORY VALIDATION
	$("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,				
			},			
			url:{
				required:true,				
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


	// ADD CITY VALIDATION
    $("#add_city").validate({
		rules:{
			city_name:{
				required:true
			},
			state:{
				required:true,				
			},			
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

	// EDIT CITY VALIDATION
	$("#edit_city").validate({
		rules:{
			city_name:{
				required:true
			},
			state:{
				required:true,				
			},		
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


	// ADD EVENT VALIDATION
    $("#add_event").validate({
		rules:{
			category:{
				required:true
			},
			event_title:{
				required:true,				
			},				
			city_id:{
				required:true,				
			},
			location_name:{
				required:true,				
			},
			location_address:{
				required:true,				
			},
			starts_at:{
				required:true,
				//datetime: true
			},
			ends_at:{
				required:true,
				//datetime: true
			},
			price:{
				required:true,
				number:true						
			},
			image:{
				required:true,				
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


	// EDIT EVENT VALIDATION
    $("#edit_event").validate({
		rules:{
			category:{
				required:true
			},
			title:{
				required:true,				
			},				
			city_id:{
				required:true,				
			},
			location_name:{
				required:true,				
			},
			location_address:{
				required:true,				
			},
			starts_at:{
				required:true,
				//datetime: true
			},
			ends_at:{
				required:true,
				//datetime: true
			},
			price:{
				required:true,
				number:true						
			},
			/*image:{
				required:true,				
			}*/		
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
	
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
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
	

	// PASSWORD VALIDATE
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
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


	// ADD BANNER VALIDATE
	$("#add_banner").validate({
		rules:{
			image:{
				required: true,				
			},
			title:{
				required: true,				
			},
			link:{
				required:true,				
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


	// SWEET ALERT DELETE ITEM

	$(".deleteRecord").click(function(){
		//$(document).on('click','.deleteRecord',function(){			
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title: 'Are you sure?',
  			text: "You won't be able to revert this!",
  			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
			reverseButtons: true
			
		}, 
		function(){
			window.location.href="/admin/"+deleteFunction+"/"+id;			
		});	
	});


	// ADD ITEM (TICKETS)
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper">'
		+'<input type="text" name="code[]" placeholder="Ticket Code" style="width: 120px; margin-left:180px; margin-top:5px;"/>'
		+'<input type="text" name="type[]" placeholder="Ticket Type" style="width: 120px; margin-left:3px; margin-right:3px; margin-top:5px;"/>'
		+'<input type="text" name="price[]" placeholder="Price" style="width: 120px; margin-left:3; margin-right:3px; margin-top:5px;"/>'
		+'<input type="text" name="stock[]" placeholder="Stock" style="width: 120px; margin-left:3; margin-right:3px; margin-top:5px;"/>'
		+'<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});




});
