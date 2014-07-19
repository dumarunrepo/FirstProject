<?php
include("DbController.php");
$dbObject= new DbController();

$clientname=$_POST['clientname'];
$title=$_POST['title'];
$description=$_POST['description'];

$sql="INSERT INTO products(client_name,title,message) "
        . "values('$clientname','$title','$description')";

$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:product-settings.php?status=0");
}
else
{
header("location:product-settings.php?status=1");

}
?>

