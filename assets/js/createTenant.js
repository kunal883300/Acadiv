// Create Tenants by Ochiabuto Jideofor, Using Ajax to post data and call function to prevent long load times

$(document).ready(function() {
	
	$('#createTenant').click(function(){
		var schoolName = $('input[name="schoolName"]').val();
		var email = $('input[name="email"]').val();
		var phone = $('input[name="phone"]').val();
		var subdomain = $('input[name="subdomain"]').val();

		/**Check for empty input in order to run a preloader or return a message, 
		 * while the process is being run without the page loading 
		 * */
		if (schoolName=='') {
			$('#schoolNameError').html("Please enter a company name");
			$('#emailError').html('');
			$('#phoneError').html('');
			$('#subdomainError').html('');
		}else if (email=='') {
			$('#emailError').html("Enter Your Valid Email");
			$('#phoneError').html('');
			$('#subdomainError').html('');
			$('#schoolNameError').html('');
		}else if(phone=='') {
			$('#phoneError').html("Enter Phone Number");
			$('#emailError').html('');
			$('#subdomainError').html('');
			$('#schoolNameError').html('');
		}else if (subdomain !='') {	
			$('#emailError').html('');
			$('#phoneError').html('');
			$('#subdomainError').html('');
			$('#schoolNameError').html('');
			$('#message').html('Creating');
			console.log(122);
			var dataString = $("#form").serialize();
			var url="Register/Register_Admin"
			$.ajax({
			type:"POST",
			url:url,
			data:dataString,
			success:function (data) {
				console.log(data);
				if(data){
					var response = data;
					if(!response.success){
						$('#emailError').html(response.emailError);
						$('#phoneError').html(response.phoneError);
						$('#subdomainError').html(response.subdomainError);
						$('#schoolNameError').html(response.schoolNameError);
						$('#message').html('');
					}
				}else{
					$('#message').html('Creating');
					$('#emailError').html('');
					$('#phoneError').html('');
					$('#subdomainError').html('');
					$('#schoolNameError').html('');
				}
				// console.log(obj.emailError);
			}
			});  

		}else{
			$('#subdomainError').html("Enter Sub-domain name");
			$('#emailError').html('');
			$('#phoneError').html('');
			$('#schoolNameError').html('');
		}
	});	
		
})

// function createTenant() {
// 	alert('Hello World');
// }
