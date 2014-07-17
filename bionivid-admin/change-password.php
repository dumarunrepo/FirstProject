<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Change Password</title>
	<?php include 'csslinks.php'; ?>
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.current;
newPassword = document.frmChange.new;
confirmPassword = document.frmChange.new_confirm;

if(!currentPassword.value) {
currentPassword.focus();
alert("Enter current password!");
//document.getElementById("current").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
alert("Enter new password!");
//document.getElementById("new").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
alert("Confirm new password!");
output = false;
}
else if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
alert("Password doesn't match! Please enter again");
output = false;
}
else if(newPassword.value.length < 8)
{
    newPassword.value="";
    confirmPassword.value="";
    alert("Password should contain atleast 8 characters!");
    output = false;
}
return output;
}
</script>
</head>
	<body>
<!--================header start===========-->
	<?php include 'header.php'; ?>

<!--===========header end===============-->
<!--=====================section start=============-->
<section>
<div class="container">
	<div class="content">
      <div class="content-inner">
        <div class="wrapper">
          <div class="content-inner1 p6">
         <div class="aligncenter">
                                    <?php
                                    if (isset($_GET['status'])) {
                                        if ($_GET['status'] == 1) {
                                            echo "<div class=\"success\"> Password Changed Successfully </div>";
                                        } else if ($_GET['status'] == 0) {

                                            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Current password entered was incorrect! Please try again </font></h6></div>";
                                        }
                                    }
                                    ?>     
                                </div>
            <h2 class="p5">Change Password</h2>
            <div class="wrapper">
                <form name="frmChange" action="change-password_post.php" method="post" id="change_password" class="add_user_form" onsubmit="return validatePassword()">
              <div class="form-left p5">

               <div class="adc_group">
                <label  class="adc_label">Current Password</label>
                <input type="password" name="current"  id="current" class="adc_field " />
                
               </div>

               </div>
                <div class="form-left fright p5">
                  <div class="adc_group">
                <label class="adc_label ">New Password</label>
                  <input type="password" name="new" id="new"  class="adc_field" />
               </div>
            
              </div>
                <div class="form-left fright p5">
                  <div class="adc_group">
                <label class="adc_label ">Confirm Password</label>
                  <input type="password" name="new_confirm" id="new_confirm"  class="adc_field" />
               </div>
            
              </div>
                
             
               <input type="submit" name="admin_login_submit" id="edit_user_form1" value="Save" class="adc_submit" />
               </form>
              </div>
              
            </div>
          </div>
        </div>
      
      </div>
   
</div>
</section>
<!--==================section end===================-->
<!--======================footer start===============-->
	<?php include 'footer.php'; ?>
<!--==================footer end===================-->
</body>
</html>