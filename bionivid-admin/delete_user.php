<?php
include("DbController.php");
$dbObject= new DbController();


$id=$_GET['id'];
$sql="delete from users WHERE user_id=$id";
$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:modify_user.php?status=0");
}
else
{
header("location:modify_user.php?status=1");

}

?>