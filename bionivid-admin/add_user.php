<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Add User</title>
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
                                    if (isset($_GET['status'])) {
                                        if ($_GET['status'] == 0) {
                                            echo "<div class=\"success\"> User added Successfully </div>";
                                        } else if ($_GET['status'] == 1) {

                                            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Creating User has been failed! Due to one of the following resons:  <br>1. User is already existing<br>2.Details entered are incorrect </font></h6></div>";
                                        }
                                    }
                                    ?>  

                                </div>
                                <h2 class="p5">Add User</h2>
                                <div class="wrapper">
                                    <form action="add_user_post.php" method="post" id="add_user_form" class="add_user_form">
                                        <div class="form-left p5">
                                            <div class="adc_group">
                                                <label class="adc_label">Client Name *</label>
                                                <select class="adc_field" id="clientname" name="clientname">
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
                                                <label  class="adc_label">Name *</label>
                                                <input type="text" name="username"  id="username" class="adc_field " />

                                            </div>

                                            <div class="adc_group">
                                                <label class="adc_label ">Designation</label>
                                                <input type="text" name="designation" id="designation"  class="adc_field" />
                                            </div>
                                        </div>
                                        <div class="form-left fright p5">


                                            <div class="adc_group p17">
                                                <label  class="adc_label">Phone *</label>
                                                <input type="text" name="phone"  id="phone" class="adc_field " />

                                            </div>

                                            <div class="adc_group">
                                                <label class="adc_label ">Address</label>
                                                <input type="text" name="address" id="address"  class="adc_field" />
                                            </div>
                                        </div>
                                        <input type="submit" name="admin_login_submit" id="add_user_form1" value="Save" class="adc_submit" />
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
