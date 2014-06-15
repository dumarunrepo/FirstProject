<?php
include("DbController.php");
$dbObject= new DbController();


$name=$_GET['id'];
$sql="delete from clients WHERE name='$name'";
$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:modify_client.php?status=0");
}
else
{
header("location:modify_client.php?status=1");

}

?>