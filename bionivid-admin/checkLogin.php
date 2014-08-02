<?php

include("DbController.php");
$dbObject= new DbController();

$myusername=$_POST['admin_username']; 
$mypassword=$_POST['admin_password']; 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$tbl_name="admins";
$sql="SELECT * FROM $tbl_name WHERE email_id='$myusername' and BINARY password='$mypassword'";
$result=$dbObject->selectExecute($sql);
$count=count($result);
if($count==1)
{
session_start();
$_SESSION['admin_username']=$myusername;
header("location:dashboard.php");
}
else{
header("location:index.php?q=1");
}
?>


