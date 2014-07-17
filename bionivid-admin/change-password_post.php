<?php
include("DbController.php");
$dbObject= new DbController();

$current=$_POST['current'];
$new=$_POST['new'];
$confirm=$_POST['new_confirm'];
session_start();
$myusername=$_SESSION['admin_username'];

$tbl_name="admins";
$sql="SELECT * FROM $tbl_name WHERE email_id='$myusername' and password='$current'";
$result=$dbObject->selectExecute($sql);
$count=count($result);
if($count!=1)
{
    header("location:change-password.php?status=0");
}
else{

$sql="UPDATE admins set password='$new' where email_id='$myusername' and password='$current'";

$result=$dbObject->insertExecute($sql);
header("location:change-password.php?status=1");
 
}
?>

