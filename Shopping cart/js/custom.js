
//Final process valiation


	$().ready(function() {
		// validate signup form on keyup and submit
		$("#final_pay").validate({
			rules: {
				full_name: {
					required: true,
					minlength: 3
				},
				mobile_user: {
					required: true,
					number: true
				},
				email_user: {
					required: true,
					email: true
				},
				transport_user: "required"
				
			},
			messages: {
				full_name: {
					required: "Please enter your Full name",
					minlength: "Your username must consist of at least 3 characters"
				},	
			mobile_user: {
					required: "Please enter your Mobile number",
					number: "Please enter only Numeric value"
				},				
				email_user: "Please enter a valid email address",
				transport_user: "Please Select your transport type"				
			}
		});

	
	});

	
// for Success alert
$("#success-alert").fadeTo(4000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});

// for Danger alert
$("#danger-alert").fadeTo(4000, 500).slideUp(500, function(){
    $("#danger-alert").slideUp(500);
});
