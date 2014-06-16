<?php
include("DbController.php");
$dbObject= new DbController();

$name=$_GET['id'];
$sql="delete from projects WHERE project_id=$name";
$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:modify_project.php?status=0");
}
else
{
header("location:modify_project.php?status=1");

}
?>