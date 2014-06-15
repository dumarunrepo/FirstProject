<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Dashboard</title>
	<?php include 'csslinks.php'; ?>
</head>
	<body>
<!--================header start===========-->
	<?php include 'header.php'; ?>

<!--===========header end===============-->
<!--=====================section start=============-->
<section>
<?php
//session_start();
if(!isset($_SESSION['admin_username']))
{
header("location:index.php");
}
?>

<?php
include("DbController.php");
$dbObject= new DbController();
$stats= $dbObject->getStats();
?>
<div class="container">
	<div class="content1">
      <div class="dash-left">
          <div class="dash1"> <a href="modify_client.php">Total Clients <br/><br/><br/><span class="num"><?php echo $stats['clients'] ?></span></a></div>
      </div>
      <div class="dash-left">
          <div class="dash2"> <a href="modify_project.php">Total Projects <br/><br/><br/><span class="num"><?php echo $stats['projects'] ?> </span></a></div>
      </div> 
      <div class="dash-right">
          <div class="dash3"> <a href="feedback.php">Feedback<br/><br/><br/><span class="num"><?php echo $stats['feedbacks'] ?> </span></a></div>
      </div> 
    </div>
</div>
</section>
<!--==================section end===================-->
<!--======================footer start===============-->
	<?php include 'footer.php'; ?>
<!--==================footer end===================-->
</body>
</html>
