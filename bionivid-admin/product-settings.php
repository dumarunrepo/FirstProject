<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Product Settings</title>
	<?php include 'csslinks.php'; ?>
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
            <h2 class="p5">Product Settings</h2>
            <div class="wrapper">
             <form action="#" method="post" id="product_settings" class="add_user_form">

              
                <div class="adc_group">
              <label class="adc_label">Select Client</label>
                <select class="adc_field" id="clientname" name="clientname" style="width:100%;">
               <option value="">--Select name--</option> 
                <option value="">Client Name1</option>
                <option value="">Client Name2</option>
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
             
            
               
             
               <input type="submit" name="product_submit" id="product_submit" value="Save" class="adc_submit" />
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