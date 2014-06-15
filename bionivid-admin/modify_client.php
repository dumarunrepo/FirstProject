<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Modify Client</title>
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
		.usview td:nth-of-type(3):before { content: "Email"; }
		.usview td:nth-of-type(4):before { content: "Designation"; }
		.usview td:nth-of-type(5):before { content: "Organization"; }
		.usview td:nth-of-type(6):before { content: "Phone"; }
		.usview td:nth-of-type(7):before { content: "Address"; }
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
        <script>
            function getSelected(){
                var radio_1=document.getElementsByName("client");
                for(var i = 0; i < radio_1.length; i++)
                {
                    if(radio_1[i].checked)
                    {
                       return radio_1[i].value;
                    }
                }
            }
            function onDelete()
            {
                var selected=getSelected();
                document.location.href="./delete_client.php?id="+selected;
                
            }
            function onEdit()
            {
                var selected = getSelected();
               document.location.href="./edit_client.php?id="+selected;
            }
        </script>
</head>
	<body>
<!--================header start===========-->
	<?php include 'header.php'; ?>

<!--===========header end===============-->
<?php
session_start();
if(!isset($_SESSION['admin_username']))
{
header("location:index.php");
}
?>
<!--=====================section start=============-->
<section>
    
<div class="container">
	<div class="content2 p4 p18">
          <div class="aligncenter">
          <!--<div class="success"> Message Success</div>
            <div class="failure"> Message Failure</div>-->
            </div>
             <div class="wrapper p4">
              <div class="wrapper p5">
              <h4 class="p4">Modify Client</h4>
              <div class="modi_submit1"><a href="#" onclick="onDelete()">Delete</a></div>
              <div class="modi_submit"><a href="#" onclick="onEdit()">Edit</a></div>
            </div>
            <div class="wrapper p15">
                
            <table class="usview">
                	<tr class="mob_ftr">
                    	<td width=20>S.No</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Designation</td>
                        <td>Organization</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>Select</td>
                    </tr>
                    <?php
                    include("DbController.php");
                    $dbObject= new DbController();
                    $rowNo=0;
                    $result = $dbObject->selectExecute("SELECT * FROM clients");
                    foreach ($result as $row)
                    {
                      $rowNo++;
                    echo "<tr>";
                    echo "<td>$rowNo</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['designation']."</td>";
                    echo "<td>".$row['organisation']."</td>";
                    echo "<td>".$row['phone_no']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td><input type=\"radio\" id=\"selected\" name=\"client\" value=\"".$row['name']."\"></td>";
                    echo "</tr>";
                    }
                   ?>
                </table>
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
