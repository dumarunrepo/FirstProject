<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Login</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
<!--Validation script-->

<!--Validation script-->
</head>

<body class="home-bg">

<div class="adminlogin">
<div class="wrapper p15">
  <div class="mmlogo"><img src="images/logo.png" alt=""></div>
<div class="wrapper">
<?php
if($_GET["q"]==1)
{
echo "<p class=\"invalidmsg\">Invalid Username or Password</p>";
}
?>
    
<div class="admintit">Forgot Password</div>
<div class="wrapper">
<form action="checkLogin.php" method="post" id="admin_login_form" class="logform">
<div class="formbg">
	<div class="wrapper p4"><label>Email</label> <input type="text"  name="admin_username" id="admin_username"  class="username"/></div> 
	<span id="error"></span><br/>
	<div class="logbtnbg p0">
	<input type="submit" name="admin_login_submit" value="Reset Password" class="logbtn" /><br/>
	</div>
	</div>
	
</form>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
