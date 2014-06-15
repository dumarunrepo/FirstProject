<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Edit Client</title>
	<?php include 'csslinks.php'; ?>
</head>
	<body>
<!--================header start===========-->
	<?php include 'header.php'; ?>

<!--===========header end===============-->
<!--=====================section start=============-->
<?php
session_start();
if(!isset($_SESSION['admin_username']))
{
header("location:index.php");
}
?>
<section>
<div class="container">
	<div class="content">
      <div class="content-inner">
        <div class="wrapper">
          <div class="content-inner1 p6">
          <div class="aligncenter">
            </div>
            <h2 class="p4">Edit Client</h2>

              	<?php
if(isset($_GET['status']))
{         
    if($_GET['status']==0)
    {
 echo "<div class=\"success\"> Client Details Updated Successfully </div>";
    }
else if($_GET['status']==1)
{

            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Update client has been failed!</font></h6></div>";
}
}
{
            include("DbController.php");
            $dbObject= new DbController();
            $result = array();
            if(isset($_GET['id']) || $_GET['id']!="")
            {
                $result=$dbObject->selectExecute("SELECT * FROM clients where name=\"".$_GET['id']."\"");
                if(sizeof($result)!=1)
                {
                    header("location:modify_client.php");
                }
            }
            else
            {
                header("location:modify_client.php");
            }
}
            ?>
            <div class="wrapper">
                <form action="edit_client_post.php" method="post" id="edit_client_form" class="add_clients_form">
              <div class="form-left p5">
              
                <div class="adc_group">
              <label class="adc_label">Name</label>
              <input type="text" name="name" readonly="true" class="adc_field " id="name" value="<?php echo $result[0]['name'];?>"/>
              </div>
              
               <div class="adc_group">
                <label  class="adc_label">Email</label>
                <input type="text" name="email"  id="email" class="adc_field " value="<?php echo $result[0]['email'];?>"/>
                
               </div>
               
               <div class="adc_group">
                   <label class="adc_label ">Designation</label>
                  <input type="text" name="designation" id="designation"  class="adc_field" value="<?php echo $result[0]['designation'];?>"/>
               </div>
              </div>
              <div class="form-left fright p5">
                <div class="adc_group">
              <label class="adc_label">Organization *</label>
              <input type="text" name="organization"  class="adc_field " id="organization" value="<?php echo $result[0]['organisation'];?>"/>
              </div>
              
               <div class="adc_group">
                <label  class="adc_label">Phone *</label>
                <input type="text" name="phone"  id="phone" class="adc_field " onkeypress="return isNumberKey(event)" value="<?php echo $result[0]['phone_no'];?>"/>
                
               </div>
               
               <div class="adc_group">
                   <label class="adc_label ">Address</label>
                  <input type="text" name="address" id="address"  class="adc_field" value="<?php echo $result[0]['address'];?>"/>
               </div>
               </div>
               <input type="submit" id="edit_client_form1" name="admin_login_submit" value="Save" class="adc_submit" />
               </form>
              </div>
              
            </div>
          </div>
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
