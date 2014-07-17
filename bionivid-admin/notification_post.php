<?php
include("DbController.php");
$dbObject= new DbController();

$clientname=$_POST['clientname'];
$title=$_POST['title'];
$description=$_POST['description'];

$sql="INSERT INTO notifications(client_name,title,message) "
        . "values('$clientname','$title','$description')";

$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:notification-settings.php?status=0");
}
else
{
header("location:notification-settings.php?status=1");

}
?>

