<header>
<div class="container">
<div class="wrapper">
	<div class="logo"><a href="./dashboard.php"><img src="images/logo1.png" alt="" /></a></div>
    <div class="menu">
    	<?php include"menu.php"?>
    </div>
    <div class="admin">
	<!--<p class="welcome">Welcome <span><?php session_start();
echo $_SESSION['admin_username'];
error_log($_SESSION['admin_username']); ?></span></p>-->
        <p class="logout"><a href="logout.php">Logout</a></p>
    
    </div>
    </div>
    </div>
</header>