<?php
include("DbController.php");
$dbObject= new DbController();

$name=$_POST['name'];
$startDate=$_POST['startdate'];
$endDate=$_POST['enddate'];
$clientname=$_POST['clientname'];
$description=$_POST['description'];

$sql="INSERT INTO projects(project_name, start_date, end_date, description, client) values('$name','$startDate','$endDate','$description','$clientname')";

$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:add_project.php?status=0");
}
else
{
header("location:add_project.php?status=1");
}
 

?>
