	  	// this is a set of jquery to validate the text fields
	  	// this does not validate the state, role or major
		$(document).ready(function() {
			// Real-time Validation 
				$('#reg_fname').on('input', function() {
					//alert("here");
					var input = $(this);
					var is_name = input.val();
					if (is_name) { input.removeClass("invalid").addClass("valid"); }
					else { input.removeClass("valid").addClass("invalid"); }
				});
				
				
				$('#reg_lname').on('input', function() {
					var input=$(this);
					var is_lname=input.val();
					if(is_lname){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
								
				$('#reg_phone').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				$('#reg_address').on('input', function() {
					var input=$(this);
					//alert(input);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				
				$('#reg_city').on('input', function() {
					var input=$(this);
					//alert(input);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				
				$('#reg_zip').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				$('#reg_ssn').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				// Email must be an email 
				$('#reg_email').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					if(is_email){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				$('#reg_password').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				// After Form Submitted Validation
			$("#contact_submit input").click(function(event){
				
				var form_data = $("#regForm").serializeArray();
				
				var error_free=true;
				for (var input in form_data){
					var element = $("#reg_" + form_data[input]['name']);
					var valid = element.hasClass("valid");
										
					//alert(form_data[input]['name']);
					// needed to single out state, major and userRole 
					// this validateion works on inputs not options and selects - as far as I can see
					switch (form_data[input]['name']) {
						case "state":
							error_element.removeClass("error_show").addClass("error");
							break;
						case "major":
							error_element.removeClass("error_show").addClass("error");
							break;
						case "userRole":
							error_element.removeClass("error_show").addClass("error");
							break;
						default:
						 
							var error_element = $("span", element.parent());
							if (!valid)	{
								error_element.removeClass("error").addClass("error_show"); 
								error_free = false;
								//alert(element.attr("id") + " ---- " + valid);

								// alert(" !valid " + form_data[input]['name']);
							} else {
								error_element.removeClass("error_show").addClass("error");
								// alert("valid " + form_data[input]['name']);							}
							}
							
					} // end switch 					
				} // end for
				
				if (!error_free){
					//alert(error_free);
					event.preventDefault(); 
				}
				else{
					 //alert('No errors: Form will be submitted'); 
				}
			}); // end $("#contact_submit input")
		}); // end $(document)
		
