<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Edit Project</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
	<?php include 'csslinks.php'; ?>
    <!-- Load jQuery JS -->
    <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        function onSubmitt()
        {
            var filename=document.from.report.value;
            var temp =filename.split(".");
            if(temp[temp.length-1]=="pdf")
            {
                return true;
            }
            else{
                alert("Please choose only pdf files");
            return false;
        }
        }
    </script>
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
    <?php
               include("DbController.php");
            $dbObject= new DbController();
            $result = array();
            if(isset($_GET['id']) && $_GET['id']!="")
            {
                
                $result=$dbObject->selectExecute("SELECT * FROM projects where project_id=".$_GET['id']);
                $statusResult=$dbObject->selectExecute("SELECT * FROM project_stage where project_id='".$_GET['id']."' order by start_date");
                if(sizeof($result)!=1)
                {
                    header("location:modify_project.php");
                }
            }
            else
            {
                header("location:modify_project.php");
            }
               ?>
<div class="container">
	<div class="content2 p18">
          <div class="aligncenter">
          <!--<div class="success"> Message Success</div>
            <div class="failure"> Message Failure</div>-->
          
            </div>
             <div class="wrapper p13">
            <h4 class="p11">Edit Project</h4>
            <form name="from" action="edit_project_post.php" method="post" id="edit_projects_form" class="edit_projects_form" enctype="multipart/form-data" onsubmit="return onSubmitt()">
           <div class="wrapper p8">
           
             <div class="pro-left">
             <div class="adc_group">
              <label class="pro_label">Client Name</label>
              <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <input type="text" name="clientname" readonly="true" class="pro_field" id="clientname" value="<?php echo $result[0]['client'];?>"/>
               </div>
              </div>
              <div class="pro-left">
             <div class="adc_group">
              <label class="pro_label">Project Name</label>
              <input type="text" name="projectname" readonly="true" class="pro_field" id="projectname" value="<?php echo $result[0]['project_name'];?>"/>
               </div>
              </div>
           
           </div>
           <div class="wrapper p10">
               
           <h6 class="p4">Tracking Info</h6>
           <?php
           echo "<table class=\"usview\">";
           echo "<tr class=\"mob_ftr\">";
           echo "<td>Project Step</td>";
           echo "<td>Status</td>";
           echo "<td>Start date</td>";
           echo "<td>End date</td>";
           echo "<td>Report Link</td>";
           echo "</tr>";
            foreach ($statusResult as $row)
            {
                echo "<tr>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>".substr($row[3], 0, 10)."</td>";
                echo "<td>".substr($row[4], 0, 10)."</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='$row[5]' target='_blank'><img src='images/PDF.png'></a></td>";
                echo "</tr>";
            }
            echo "</table>"
           ?>
        
           <div class="pro_group">
                  <br>
              <label class="pro_label1">Step Name:</label>
             <!-- <select  name="step" class="pro_field2" id="step">
                  <option value="1">1</option> 
                  <option value="2">2</option> 
                  <option value="3">3</option> 
                  <option value="4">4</option> 
                  <option value="5">5</option> 
                  <option value="6">6</option> 
                  <option value="7">7</option> 
                  <option value="8">8</option> 
                  <option value="9">9</option> 
                  <option value="10">10</option> 
                  <option value="11">11</option> 
                  <option value="12">12</option>
                  <option value="13">13</option> 
                  <option value="14">14</option> 
                  <option value="15">15</option> 
                  <option value="16">16</option> 
                  <option value="17">17</option> 
                  <option value="18">18</option> 
                  <option value="19">19</option> 
                  <option value="20">20</option> 
              </select>-->
              <input type="text" name="step" class="pro_field1" id="step"/>
               </div>
               <div class="pro_group1">
                   <br>
              <label class="pro_label1">Start Date</label>
              <input class="adc_field " type="text" name="startdate"  id="startdate"/><!--class="pro_field2"-->
              <!--<div class="date"></div>-->
               </div>
               <div class="pro_group1">
                   <br>
              <label class="pro_label1">End Date</label>
              <input class="adc_field " type="text" name="enddate" id="enddate"/><!--class="pro_field2" -->
              <!--<div class="date"></div>-->
               </div>
               <div class="pro_group1">
                   <br>
              <label class="pro_label1">Status</label>
              <select  name="status" class="pro_field2" id="status">
              <option value="started">Started</option> 
              <option value="progress">Progress</option> 
                <option value="finished">Finished</option>
                <option value="onhold">OnHold</option>
               </select>
               </div>
                <div class="pro_group2">
                    <br>
              <label class="pro_label1">Report Upload(pdf only)</label>
               <input type="file" name="report"  class="pro_field1" id="report"/>
              
               </div>
           </div>
                <input type="submit" id="edit_projects_form2" name="admin_login_submit" value="Save" class="pro_submit"/>
            </form>
            </div>
            </div>
          </div>
</section>
<script>
            $(document).ready(
                    function() {
                        $("#startdate").datepicker({
                            dateFormat: "dd-mm-yy",
                            changeMonth: true, //this option for allowing user to select month
                            changeYear: true, //this option for allowing user to select from year range
                         
                        });
                       $("#enddate").datepicker({
                            dateFormat: "dd-mm-yy",
                            changeMonth: true, //this option for allowing user to select month
                            changeYear: true, //this option for allowing user to select from year range
                            beforeShow: function(){
                                $(this).datepicker('option','minDate',document.getElementById('startdate').value);
                            }
                        });

                    }
            );
        </script>
<!--==================section end===================-->
<!--======================footer start===============-->
	<?php include 'footer.php'; ?>
<!--==================footer end===================-->
</body>
</html>