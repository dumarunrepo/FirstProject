<?php
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["report"]["name"]);
$extension = end($temp);
$fileName=uniqid();
if (in_array($extension, $allowedExts)) {
    
  if ($_FILES["report"]["error"] > 0) {
    echo "Error in uploading file";
  } else {
    /*echo "Upload: " . $_FILES["report"]["name"] . "<br>";
    echo "Type: " . $_FILES["report"]["type"] . "<br>";
    echo "Size: " . ($_FILES["report"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["report"]["tmp_name"] . "<br>";
     * 
     */
      move_uploaded_file($_FILES["report"]["tmp_name"],"upload/" .$fileName.".".$extension);
      //echo "Stored in: " . "upload/" . $fileName.".".$extension;
      $step = $_POST['step'];
      $id = $_POST['id'];
      $startdate=$_POST['startdate'];
      $enddate = $_POST['enddate'];
      $status=$_POST['status'];
      $filePath="upload/" .$fileName.".".$extension;
      include("DbController.php");
    $dbObject= new DbController();
    
    $query= "INSERT INTO project_stage(project_id, project_stage, project_status, start_date,end_date,report_url) "
    . "values('$id','$step','$status','$startdate','$enddate','$filePath') "
    . "on duplicate key update project_status='$status', start_date='$startdate', end_date='$enddate',  report_url='$filePath'";
    
    $dbObject->insertExecute($query);
      header("location:edit_project.php?id=".$id);
  }
} else {
  echo "Invalid file format choose pdf file only";
}
?>

