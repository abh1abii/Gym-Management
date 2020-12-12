<?php
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
        header("location: Setup.php");
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header("location: admin_login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="adminPanelStyle.css">
    <title>Setup</title>
</head>
<body>
    <input type="checkbox" id="check">

    <!-- HEADER AREA-->
    <header> 
        <label for="check">
            <i class="fas fa-bars" id="sidebar_button"></i>
        </label>
        <div class="left_area">
            <h3>Gym <span>Admin Panel</span></h3>
        </div>
        <!-- <div class="right_area">
            <a href="#" class="logout_button">Logout</a>
        </div>-->
        <div class="right_area"> 
        
            <form method="POST">
               <button name="logout" class="logout_button">Log Out</button>
            </form>
        </div>
    </header>
    <!-- END OF HEADER AREA-->

    <!-- SIDEBAR AREA-->
    <div class="sidebar">
        <center>
            <img src="./Images/avatar.png" alt="Profile Picture Missing!" class="profile_image">
        </center>
        <a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Register Member</span> </a>
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Member Details</span> </a>
        <a href="#"><i class="fas fa-table"></i> <span>Package Details</span> </a>
        <a href="#"><i class="fa fa-credit-card"></i> <span>Payments</span> </a>
        <a href="#"><i class="fa fa-user-md"></i> <span>Trainers</span> </a>
        <a href="./Setup.php"><i class="fas fa-sliders-h"></i> <span>Settings</span> </a>
    
    
    
    </div>
    <div class="content">
        
    </div>
    
    <!-- END OF SIDEBAR AREA-->


    

</body>
</html>