<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Notification</title>
	<?php include 'csslinks.php'; ?>

<script>
    function validateEntries() {
tit = document.notif.title;
message = document.notif.description;
var output=true;
if(tit.value=="" || message.value=="")
{
    alert("Fields should not be empty please enter all fields");
    output= false;
}

if(tit.value.length>100)
{
    alert("Title should be less than 100 characters! Present length is:"+tit.value.length+" characters");
    output= false;
}
else if(message.value.length>300)
{
    alert("Description should be less than 300 characters! Present length is:"+message.value.length+" characters");
    output= false;
}
return output;

}
</script>
</head>
	<body>
<!--================header start===========-->
	<?php include 'header.php'; ?>

<!--===========header end===============-->
<!--=====================section start=============-->
<section>
<div class="container">
	<div class="content">
      <div class="content-inner">
        <div class="wrapper">
          <div class="content-inner1 p6">
                <div class="aligncenter">
                                    <?php
                                    if (isset($_GET['status'])) {
                                        if ($_GET['status'] == 0) {
                                            echo "<div class=\"success\">Notification added Successfully </div>";
                                        } else if ($_GET['status'] == 1) {

                                            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Unable to add notification! Please try again later </font></h6></div>";
                                        }
                                    }
                                    ?>     
                                </div>
            <h2 class="p5">Notification</h2>
            <div class="wrapper">
                
                <form name ="notif" action="notification_post.php" onsubmit="return validateEntries()" method="post" id="notification" class="add_user_form">

              
                <div class="adc_group">
              <label class="adc_label">Select Client</label>
                <select class="adc_field" id="clientname" name="clientname" style="width:100%;">
              <?php
                                            include("DbController.php");
                                            $dbObject = new DbController();
                                            $result = $dbObject->selectExecute("SELECT name FROM clients");
                                            foreach ($result as $name) {
                                                echo"<option value=\"$name[0]\">$name[0]</option>";
                                            }
                                            ?>
               </select>
              </div>
              
               <div class="adc_group">
                <label  class="adc_label">Title</label>
                <input type="text" name="title"  id="title" class="adc_field "  style="width:98%;"/>
                
               </div>
               
               <div class="adc_group p4">
                   <label class="adc_label ">Description</label>
                  <textarea name="description" id="description" row="6" class="adc_field1" ></textarea>
               </div>
             
            
               
             
               <input type="submit" name="notification_submit" id="notification_submit" value="Save" class="adc_submit" />
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