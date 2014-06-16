<?php
include("DbController.php");
$dbObject= new DbController();

$clientname=$_POST['clientname'];
$name=$_POST['username'];
$designation=$_POST['designation'];
$phone=$_POST['phone'];
$address=$_POST['address'];

echo $clientname;
echo $name;
echo $designation;
echo $phone;
echo $address;

$sql="INSERT INTO users(user_id,user_clientname,user_fullname,user_address,user_designation) "
        . "values($phone,'$clientname','$name','$address','$designation')";

$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:add_user.php?status=0");
}
else
{
header("location:add_user.php?status=1");

}
 
?>

