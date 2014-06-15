<?php
include("DbController.php");
$dbObject= new DbController();

$name=$_POST['username'];
$designation=$_POST['designation'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql="UPDATE users SET user_fullname='$name',user_designation='$designation',user_address='$address' WHERE user_id=$phone";
$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:edit_user.php?status=0&id=$phone");
}
else
{
header("location:edit_user.php?status=1");

}

?>