<?php
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
        header("location: admin_login.php");
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
    <title>Admin Panel</title>
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
        <a href="#"><i class="fas fa-desktop"></i> <span>Dashboard</span> </a>
        <a href="#"><i class="fas fa-cogs"></i> <span>Components</span> </a>
        <a href="#"><i class="fas fa-table"></i> <span>Tables</span> </a>
        <a href="#"><i class="fas fa-th"></i> <span>Forms</span> </a>
        <a href="#"><i class="fas fa-info-circle"></i> <span>About</span> </a>
        <a href="#"><i class="fas fa-sliders-h"></i> <span>Settings</span> </a>
    
    
    
    </div>
    <div class="content"></div>
    
    <!-- END OF SIDEBAR AREA-->


    

</body>
</html>