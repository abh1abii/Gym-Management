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
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="adminPanelStyle.css">
    <title>Package</title>
</head>
<body>
<?php include("./HeaderSidebar.php");
    ?>


    

</body>
</html>