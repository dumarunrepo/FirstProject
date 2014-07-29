<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Add Project</title>
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
            <div id="container">
                <div class="content">
                    <div class="content-inner">
                        <div class="wrapper">
                            <div class="content-inner1 p6">
                                <div class="aligncenter">
                                    <?php
                                    if (isset($_GET['status'])) {
                                        if ($_GET['status'] == 0) {
                                            echo "<div class=\"success\"> Project added Successfully </div>";
                                        } else if ($_GET['status'] == 1) {

                                            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Creating Project has been failed! Due to one of the following resons:  <br>1. Project is already existing<br>2.Details entered are incorrect </font></h6></div>";
                                        }
                                    }
                                    ?>     
                                </div>
                                <h2 class="p5">Add Project</h2>
                                <div class="wrapper">
                                    <form name="from" action="add_project_post.php" method="post" id="add_projects_form" class="add_clients_form" enctype="multipart/form-data" onsubmit="return onSubmitt()">
                                        <div class="form-left">

                                            <div class="adc_group">
                                                <label class="adc_label">Name</label>
                                                <input type="text" name="name" class="adc_field " id="name"/>
                                            </div>

                                            <div class="adc_group">
                                                <label class="adc_label">Start Date</label>
                                                <input class="adc_field " type="text" name="startdate" id="startdate"/>
                                            </div>
                                             <div class="adc_group">
                                                <label class="adc_label">Project Manager</label>
                                                <input class="adc_field " type="text" name="manager" id="manager"/>
                                            </div>


                                        </div>
                                        <div class="form-left fright">
                                            <div class="adc_group">
                                                <label class="adc_label">Client Name *</label>
                                                <select class="adc_field2" id="clientname" name="clientname">
                                                    <!--<option value="">--Select name--</option>-->

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
                                                <label class="adc_label">End Date</label>
                                                <input class="adc_field " type="text" name="enddate" id="enddate"/>

                                            </div>
                                                                                        <div class="adc_group">
                                                <label class="adc_label">No of Steps Involved</label>
                                                <select class="adc_field2" id="steps" name="steps">
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
                                                </select>

                                            </div>

                                        </div>
                                        <div class="adc_group p4">
                                            <label class="adc_label">Upload Workflow(Only pdf formats)</label>
                                            <input type="file" name="report" class="pro_field1" id="report"/>
                                            

                                        </div>
                                        <div class="adc_group p4">
                                            <label class="adc_label">Description</label>
                                            <textarea name="description" id="description" row="6" class="adc_field1" ></textarea>

                                        </div>

                                        <input type="submit" id="add_projects_form1" name="admin_login_submit" value="Save" class="adc_submit" />
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

    </body>
</html>
