<?php
include("DbController.php");
$dbObject= new DbController();

$name=$_POST['name'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$organization=$_POST['organization'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql="INSERT INTO clients(name,email,designation,organisation,phone_no,address) values('$name','$email','$designation','$organization','$phone','$address')";
$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:add_client.php?status=0");
}
else
{
header("location:add_client.php?status=1");

}

?>
