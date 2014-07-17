<?php

$allowedExts = array("pdf");
$temp = explode(".", $_FILES["report"]["name"]);
var_dump($_FILES);
$extension = end($temp);
$fileName=uniqid();
//echo $extension;
if (in_array($extension, $allowedExts)) {
    
  if ($_FILES["report"]["error"] > 0) {
    echo "Error in uploading file";
  } else {
      move_uploaded_file($_FILES["report"]["tmp_name"],"upload/" .$fileName.".".$extension);
      $filePath="upload/" .$fileName.".".$extension;
      
include("DbController.php");
$dbObject= new DbController();

$name=$_POST['name'];
$startDate=$_POST['startdate'];
$endDate=$_POST['enddate'];
$clientname=$_POST['clientname'];
$manager=$_POST['manager'];
$steps=$_POST['steps'];
$description=$_POST['description'];

$sql="INSERT INTO projects(project_name, start_date, end_date, description, client,manager, steps,report_url) values('$name','$startDate','$endDate','$description','$clientname','$manager',$steps,'$filePath')";

$result=$dbObject->insertExecute($sql);
if($result)
{
header("location:add_project.php?status=0");
}
else
{
header("location:add_project.php?status=1");
}
  }
 } else {
  echo "Invalid file format choose pdf file only";
}

?>