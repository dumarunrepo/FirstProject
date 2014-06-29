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
                                    <form action="add_project_post.php" method="post" id="add_projects_form" class="add_clients_form">
                                        <div class="form-left">

                                            <div class="adc_group">
                                                <label class="adc_label">Name</label>
                                                <input type="text" name="name" class="adc_field " id="name"/>
                                            </div>

                                            <div class="adc_group">
                                                <label class="adc_label">Start Date</label>
                                                <input class="adc_field " type="text" name="startdate" id="startdate"/>
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

                                        </div>
                                        <div class="adc_group p4">
                                            <label class="adc_label">Description</label>
                                            <input type="text" name="description"  class="adc_field1 " id="description"/>

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
                            dateFormat: "yy-mm-dd",
                            changeMonth: true, //this option for allowing user to select month
                            changeYear: true, //this option for allowing user to select from year range
                         
                        });
                       $("#enddate").datepicker({
                            dateFormat: "yy-mm-dd",
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
