<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Add Client</title>
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
	<?php
        if(isset($_GET['status'])){
if($_GET['status']==0)
{         
 echo "<div class=\"success\"> Client added Successfully </div>";
}
else if($_GET['status']==1)
{

            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Creating client has been failed! Due to one of the following resons:  <br>1. Client is already existing<br>2.Details entered are incorrect </font></h6></div>";
}
        }
?>            
</div>
            <h2 class="p4">Add Client</h2>
            <div class="wrapper">
             <form action="add_client_post.php" method="post" id="add_clients_form" class="add_clients_form">
              <div class="form-left p5">
              
                <div class="adc_group">
              <label class="adc_label">Client Name *</label>
              <input type="text" name="name"  class="adc_field " id="name"/>
              </div>
              
               <div class="adc_group">
                <label  class="adc_label">Email *</label>
                <input type="text" name="email"  id="email" class="adc_field " />
                
               </div>
               
               <div class="adc_group">
                   <label class="adc_label ">Designation *</label>
                  <input type="text" name="designation" id="designation"  class="adc_field" />
               </div>
              </div>
              <div class="form-left fright p5">
                <div class="adc_group">
              <label class="adc_label">Organization *</label>
              <input type="text" name="organization"  class="adc_field " id="organization"/>
              </div>
              
               <div class="adc_group">
                <label  class="adc_label">Phone *</label>
                <input type="text" name="phone"  id="phone" class="adc_field " onkeypress="return isNumberKey(event)" />
                
               </div>
               
               <div class="adc_group">
                   <label class="adc_label ">Address *</label>
                  <input type="text" name="address" id="address"  class="adc_field" />
               </div>
               </div>
               <input type="submit" id="add_clients_form1" name="add_clients_form" value="Save" class="adc_submit" />
               
               </form>
                <br><hr><p>Note: Please enter the client name carefully, it cannot be modified later</p>
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
