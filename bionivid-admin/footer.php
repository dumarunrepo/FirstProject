<!--<footer>
	<p class="f-text fright">  2014 Copyright MandM Group.</p>
</footer>
-->

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>


	<script type="text/javascript">
	
	$(document).ready(function() {
		$("input:text:visible:first").focus();
});
	
	
		function setActive() {
		  aObj = document.getElementById('menu').getElementsByTagName('a');
		  for(i=0;i<aObj.length;i++) { 
			if(document.location.href.indexOf(aObj[i].href)>=0) {
			  aObj[i].className='active';
			}
		  }
		}
		window.onload = setActive;
		
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
	</script> 
<script>
$(function() {
	$( "#admin_login_form" ).validate({
		rules: {
			admin_username: {
				required: true,
			},
			admin_password: {
				required: true,
			}
		},
		messages: {
			admin_username: {
				required: "Enter The Username",
			},
			admin_password: {
				required: "Enter The Password",
			}
		}
	});
});
</script>
<script type="text/javascript" src="js/add_clients_form.js"></script>
<script type="text/javascript" src="js/add_user_form.js"></script>
<script type="text/javascript" src="js/add_projects_form.js"></script>
<script type="text/javascript" src="js/edit_projects_form.js"></script>
<script type="text/javascript" src="js/modify_projects_form.js"></script>
