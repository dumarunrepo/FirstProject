<?php
include("DbController.php");
$dbObject= new DbController();

$name=$_POST['name'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$organization=$_POST['organization'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql="UPDATE clients SET email='$email',designation='$designation',organisation='$organization',phone_no='$phone',address='$address' WHERE name='$name'";
$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:edit_client.php?status=0&id=$name");
}
else
{
header("location:edit_client.php?status=1");

}

?>