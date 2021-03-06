<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Feedback</title>
	<?php include 'csslinks.php'; ?>
	<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
		/* Force table to not be like tables anymore */
		.usview, thead, tbody, th, td, tr { 
			display: block; font:14px 'latobold'; color:#5d5d5d; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		.usview thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		.usview tr { border: 1px solid #e4e4e4; }
		
		.usview td { 			
			border: none;			
			position: relative;
			padding-left: 50% !important; 
		}
		
		.usview td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap; text-align:left;
		}
		
		/*
		Label the data
		*/
		.usview td:nth-of-type(1):before { content: "S.No"; }
		.usview td:nth-of-type(2):before { content: "Name"; }
		.usview td:nth-of-type(3):before { content: "User"; }
		.usview td:nth-of-type(4):before { content: "Date"; }
		.usview td:nth-of-type(5):before { content: "Feedback"; }
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 100%; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 767px) and (max-device-width: 1024px) {
		body { 
			width: 100%; 
		}
	}
	
	</style>
</head>
	<body>
<!--================header start===========-->
	<?php include 'header.php'; ?>

<!--===========header end===============-->
<!--=====================section start=============-->
<section>
<div class="container">
	<div class="content2 p18">
          <div class="aligncenter">
          <!--<div class="success"> Message Success</div>
            <div class="failure"> Message Failure</div>-->
            </div>
             <div class="wrapper p0">
                 <h2 class="p8">Feedbacks<!--<<span class="modi_submit1">a href="#">Delete</a></span></h4>-->
                 </h2>
             <form action="#" method="post" id="edit_projects_form" class="edit_projects_form" enctype="multipart/form-data">
             
           <div class="wrapper p4">
           
             <div class="pro-left">
             <div class="adc_group">
              <label class="pro_label">Client Name</label>
              <select  name="clientname" class="pro_field" id="clientname">
              <?php
              if(isset($_GET['client']))
              {
                  $clientname=$_GET['client'];
              }
              if(isset($_GET['project']))
              {
                  $project=$_GET['project'];
              }
              include("DbController.php");
		$dbObject= new DbController();
		$result=$dbObject->selectExecute("SELECT name FROM clients");
		foreach($result as $name)
		{
                    if(!isset($clientname))
                    {
                	$clientname=$name[0];
                        echo"<option value=\"$name[0]\" selected=\"true\">$name[0]</option>";
                    }
                    else{
                    echo"<option value=\"$name[0]\">$name[0]</option>";
                    }
                }
                $proResult=$dbObject->selectExecute("SELECT project_id, project_name FROM projects where client=\"".$clientname."\"");
                
              ?>
              
              </select>
               </div>
              </div>
              <div class="pro-left fright">
             <div class="adc_group">
              <label class="pro_label">Project Name</label>
              <select name="projectname" class="pro_field" id="projectname">
                  <?php
                foreach($proResult as $name)
		{
                    if(!isset($projectname))
                    {
                	$projectname=$name[1];
                        echo"<option value=\"$name[0]\" selected=\"true\">$name[1]</option>";
                    }
                    else{
                    echo"<option value=\"$name[0]\">$name[1]</option>";
                    }
                }
                ?>
                </select>
               </div>
              </div>
           
           </div>
           
          
            </form>
            </div>
            <div class="wrapper p4">
            <table class="usview">
                	<tr class="mob_ftr">
                    	<td>S.No</td>
                        <td>Name</td>
                        <td>User</td>
                        <td>Date</td>
                        <td>Feedback</td>
                    </tr>
                    <?php
                    
                  // foreach (treu){
                    {
                        echo "<tr>";
                    	echo "<td>1</td>";
                        echo "<td>Nikhil</td>";
                        echo "<td>90000 67388   </td>";
                        echo "<td>12-05-2014  </td>";
                        echo "<td>feedback</td>";
                        echo "</tr>";
                    }
                    
                            ?>
                   
                </table>
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