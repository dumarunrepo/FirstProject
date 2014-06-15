(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#add_clients_form, #edit_client_form").validate({
                rules: {
                    name: {
					required: true,
					},					
                   
                    email: {
                        required: true,
                        email: true
                    },
					
					designation: {
                        required: true,
                      
						
                    },
					organization: {
                        required: true,
                    
						
                    },
					
					phone: {
                        required: true,
                        number: true
						
                    },
					address: {
                        required: true,
                      
						
                    },
					
					code: {
					required: true,
						}				
					
	                 
                },
				
				 messages: {
                   	   name: {
                           required: "Enter the name",
                      },
					  
					  email: {
                           required: "Enter the email",
                      },
					  designation: {
                        required: "Enter the designation",
                    },
					organization: {
                        required: "Enter the organization",
                    },
					phone: {
                        required: "Enter the phone number",
                    },
					address: {
                        required: "Enter the address",
                    },
					
           			}
               /* 
                submitHandler: function(form) {
				$.ajax({
                 type: "POST",
                 url: "add_client_post.php",
                 data: $(form).serialize(),
                 success: function (response) {
				 //alert(response);
                     if(response==1)
			{
				$("#after_submit").html('');
				$("#add_clients_form1, #edit_client_form1").after('<label id="after_submit" style="color:green;width:100%;text-align:center;float:right; font-size:20px;">Your message sent successfully.</label>');
				change_captcha();
				clear_form();
			}
			else
			{
				$("#after_submit").html('');
				$("#add_clients_form1, #edit_client_form1").after('<label id="after_submit" style="color:red;width:250px;text-align:center;float:right;">Error ! invalid captcha code .</label>');
				change_captcha();
			}
                 }
             });
             return false; // required to block normal submit since you used ajax
                    //form.submit();
                }*/
            });
        }
    }
$('img#refresh_enq').click(function() {  

			
			change_captcha();
	 });
	 
	 function change_captcha()
	 {
	 	document.getElementById('captcha_enq').src="captcha.php?rnd=" + Math.random();
	 }	
function clear_form()
	 {
	 	$("#name").val('');
		$("#email").val('');
		$("#address").val('');
		$("#phone").val('');
		$("#designation").val('');
		$("#organization").val('');
		$("#code").val('');
	 }	 

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
	

	
})(jQuery, window, document);

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
		 {
		 //alert("u must enter number only");
            return false;
			}
			else
			{

         return true;
		 }
      }	
