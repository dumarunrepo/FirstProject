<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Modify Project</title>
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
                .usview td:nth-of-type(3):before { content: "Start Date"; }
                .usview td:nth-of-type(4):before { content: "End Date"; }
                .usview td:nth-of-type(5):before { content: "Description"; }
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
            function onChange()
            {
                var yourSelect = document.getElementById('clientname');
                var string = yourSelect.options[yourSelect.selectedIndex].value;
                document.location.href = "./modify_project.php?client=" + string;

            }

            function getSelected() {
                var radio_1 = document.getElementsByName("project");
                for (var i = 0; i < radio_1.length; i++)
                {
                    if (radio_1[i].checked)
                    {
                        return radio_1[i].value;
                    }
                }
            }
            function onDelete()
            {
                var selected = getSelected();
                if(selected==null)
                {
                    alert("Please select project to delete!");
                }
                else{
                var answer = confirm ("Are you sure you want to delete?")
                if(answer){
                document.location.href = "./delete_project.php?id=" + selected;
                }
            }

            }
            function onEdit()
            {
                var selected = getSelected();
                if(selected==null)
                {
                    alert("Please select project to edit!");
                }
                else{
                document.location.href = "./edit_project.php?id=" + selected;
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
            <div class="container">
                <div class="content2 p18">
                    <div class="aligncenter">
                        <!--
                    <div class="success"> Message Success</div>
                      <div class="failure"> Message Failure</div>
                        -->
                    </div>
                    <div class="wrapper">
                        <div class="wrapper p8">
                            <h4 class="p9">Modify Project</h4>
                            <form action="#" method="post" id="modify_projects_form" class="modify_projects_form">
                                <div class="pro-left1">
                                    <div class="adc_group">
                                        <label class="pro_label">Client Name</label>
                                        <select  name="clientname" class="pro_field" id="clientname" onchange="onChange()">
                                            <?php
                                            include("DbController.php");
                                            $dbObject = new DbController();
                                            $result = $dbObject->selectExecute("SELECT name FROM clients");
                                            if (isset($_GET['client']) && $_GET['client'] != "") {
                                                $clientname = $_GET['client'];
                                            } else {
                                                $clientname = $result[0][0];
                                            }

                                            foreach ($result as $name) {
                                                if ($clientname == $name[0]) {
                                                    echo"<option value=\"$name[0]\" selected=\"true\">$name[0]</option>";
                                                } else {
                                                    echo"<option value=\"$name[0]\">$name[0]</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                            </form>
                            <div class="modi_submit1"><a href="#" onclick="onDelete()">Delete</a></div>
                            <div class="modi_submit"><a href="#" onclick="onEdit()">Edit</a></div>
                        </div>
                        <div class="wrapper p1">
                            <table class="usview">
                                <tr class="mob_ftr">
                                    <td>S.No</td>
                                    <td>Name</td>
                                    <td>Start Date</td>
                                    <td>End Date</td>
                                    <td>Description</td>
                                    <td>Select</td>
                                </tr>
<?php
$rowNo = 0;
$result1 = $dbObject->selectExecute("SELECT * FROM projects where client=\"" . $clientname . "\"");
foreach ($result1 as $row) {
    $rowNo++;
    echo "<tr>";
    echo "<td>$rowNo</td>";
    echo "<td>" . $row['project_name'] . "</td>";
    echo "<td>" . $row['start_date'] . "</td>";
    echo "<td>" . $row['end_date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td><input type=\"radio\" id=\"selected\" name=\"project\" value=\"" . $row['project_id'] . "\"></td>";
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