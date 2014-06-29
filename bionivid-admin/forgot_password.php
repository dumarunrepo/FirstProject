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
if(isset($_GET["q"])){
if($_GET["q"]==1)
{
echo "<p class=\"invalidmsg\">Invalid Username or Password</p>";
}
}
?>
    
<div class="admintit">Forgot Password</div>
<div class="wrapper">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="admin_login_form" class="logform">
<div class="formbg">
	<div class="wrapper p4"><label>Email</label> <input type="text"  name="admin_username" id="admin_username"  class="username"/></div> 
	<span id="error"></span><br/>
	<div class="logbtnbg p0">
	<input type="submit" name="admin_login_submit" value="Reset Password" class="logbtn" /><input type="button" onclick="location.href = 'index.php';" name="admin_login_submit" value="Try login again" class="logbtn" /> <br/>
        
	</div>
	</div>
	
</form>
<?php
   
if(isset($_POST['admin_username']))
{
 require_once "Mail.php";
 $from = "Team<team@dumarun.com>";
 $to = $_POST['admin_username'];
 $subject = "Forgot Password!";
 include("DbController.php");
$dbObject= new DbController();
$tbl_name="admins";
$sql="SELECT password FROM $tbl_name WHERE email_id='$to'";
$result=$dbObject->selectExecute($sql);
$count=count($result);
if($count==1)
{
    $password=$result[0]['password'];
 $body = "Hi User,\n\n Your Password for the username:$to is \"$password\"";
 
 $host = "ssl://smtp.gmail.com";
 $port = "465";
 $username = "team@dumarun.com";
 $password = "Run@12345";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Password sent successfully to your mail!</p>");
  }
}
else{
    echo ("<p>Username is not registered yet!</p>");
}
}
?>

</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
