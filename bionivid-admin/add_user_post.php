<?php
include("DbController.php");
$dbObject= new DbController();

$clientname=$_POST['clientname'];
$projectname=$_POST['projectname'];
$name=$_POST['username'];
$designation=$_POST['designation'];
$phone=$_POST['phone'];
$address=$_POST['address'];


$sql="INSERT INTO users(user_id,user_clientname, project_id, user_fullname,user_address,user_designation) "
        . "values($phone,'$clientname',$projectname,'$name','$address','$designation')";

$permSql="INSERT INTO permissions(project_id,user_id,permission_type) values('$projectname','$phone',1)";

$result=$dbObject->insertExecute($sql);
$result=$dbObject->insertExecute($permSql);
if($result)
{
header("location:add_user.php?status=0");
}
else
{
header("location:add_user.php?status=1");

}
 
?>

