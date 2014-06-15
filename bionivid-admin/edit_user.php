<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Edit User</title>
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
                                            echo "<div class=\"success\"> User Details Updated Successfully </div>";
                                        } else if ($_GET['status'] == 1) {

                                            echo "<div class=\"failure\"><h6><font size=\"1\" color=\"red\">Update User has been failed!</font></h6></div>";
                                        }
                                    } {
                                        include("DbController.php");
                                        $dbObject = new DbController();
                                        $result = array();
                                        if (isset($_GET['id']) || $_GET['id'] != "") {
                                            $result = $dbObject->selectExecute("SELECT * FROM users where user_id=\"" . $_GET['id'] . "\"");
                                            if (sizeof($result) != 1) {
                                                header("location:modify_user.php");
                                            }
                                        } else {
                                            header("location:modify_user.php");
                                        }
                                    }
                                    ?>
                                </div>
                                <h2 class="p5">Edit User</h2>
                                <div class="wrapper">
                                    <form action="edit_user_post.php" method="post" id="edit_user_form" class="add_user_form">
                                        <div class="form-left p5">

                                            <div class="adc_group">
                                                <label class="adc_label">Client Name *</label>
                                                <input type="text" name="clientname"  id="clientname" readonly="true" class="adc_field " value="<?php echo $result[0]['user_clientname'];?>"/>
                                                <!--<select class="adc_field" id="clientname" name="clientname">
                                                    <option value="">--Select name--</option> 
                                                    <option value="Home & Garden">Client Name1</option>
                                                    <option value="Garments & Accessories">Client Name2</option>
                                                </select>-->
                                            </div>

                                            <div class="adc_group">
                                                <label  class="adc_label">User Name *</label>
                                                <input type="text" name="username"  id="username" class="adc_field " value="<?php echo $result[0]['user_fullname'];?>"/>

                                            </div>

                                            <div class="adc_group">
                                                <label class="adc_label ">Designation</label>
                                                <input type="text" name="designation" id="designation"  class="adc_field" value="<?php echo $result[0]['user_designation'];?>"/>
                                            </div>
                                        </div>
                                        <div class="form-left fright p5">


                                            <div class="adc_group p17">
                                                <label  class="adc_label">Phone *</label>
                                                <input type="text" name="phone"  id="phone" readonly="true" class="adc_field " value="<?php echo $result[0]['user_id'];?>"/>

                                            </div>

                                            <div class="adc_group">
                                                <label class="adc_label ">Address</label>
                                                <input type="text" name="address" id="address"  class="adc_field" value="<?php echo $result[0]['user_address'];?>"/>
                                            </div>
                                        </div>
                                        <input type="submit" name="admin_login_submit" id="edit_user_form1" value="Save" class="adc_submit" />
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
