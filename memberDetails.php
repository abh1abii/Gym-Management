<?php
    require("connection.php");
    require("../credentials.php");
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
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="adminPanelStyle.css">
        <title>Member Details</title>
    </head>
    <body ><?php include("./HeaderSidebar.php");?>
        <div class="content">
        </div>
        <!-- <style>
            #check:checked ~ .container
            {
        
                z-index: 2;
                position: fixed;
                left: 8%; 
                top: 10%;
                background-color: rgba(0, 0, 00, 0.3);
                background-position: center;
                background-size: cover;
                float: center;
                height: 88%;
                width: 90%;
                opacity: 100%;
                border-radius: 20px;
                position: center;
                background-size: cover;  
                transition: 0.5s;  
                margin-left: 30px;
                margin-right: 80px;
                padding: 20px;
                max-width: 80%;
                color: white;
                padding-right: 20px;
                max-height: 80%;
                overflow-y: scroll;
                
            }
            .container
            {
                z-index: 2;
                position: fixed;
                left: 18%; 
                top: 10%;
                background-color: rgba(0, 0, 00, 0.3);
                background-position: center;
                background-size: cover;
                float: center;
                height: 88%;
                width: 90%;
                opacity: 100%;
                border-radius: 20px;
                position: center;
                background-size: cover;  
                transition: 0.5s;  
                margin-left: 150px;
                padding:20px;
                max-width: 58%;
                color: white;
                padding-right: 20px;
                max-height: 80%;
                overflow-y: scroll;
            }
            .activityButton
            {
                padding: 5px;
                background: #ffffff;
                text-decoration: none;
                
                /* margin-top: -30px;
                margin-right: 40px; */
                border-radius: 5px;
                font-size: 15px;
                font-weight: 600;
                color: rgb(224, 125, 67);
                transition: 0.5s;
                margin-left: 20px;
                transition-property: background;
            }
    
            .activityButton:hover
            {
                background: #f78f5f;
                color:rgb(255, 255, 255)
            }
            
  
        </style> -->
        <div class="container">



            
            <h1><center>Member List</center></h1>
            
                
            <h2>List of Existing Users</h2>
            <table>
                <tr>
                    <th>Member ID</th>    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>Trainer ID</th>
                    
                    <th><i class="fas fa-edit"></i></th>
                    
                </tr>
            <?php
                



                $query="SELECT * FROM `Members`;";
                $result=mysqli_query($connectionObj,$query);
                
                while($row=mysqli_fetch_array($result))
                {
                    $firstName=$row['First_name'];
                    $lastName=$row['Last_name'];
                    $gender=$row['Gender'];
                    $email=$row['email'];
                    $contact=$row['contact'];
                    $Member_ID=$row['Member_ID'];
                    $Trainer_ID=$row['Trainer_ID'];
                    echo"
                    <tr>
                    <td>$Member_ID</td>
                    <td>$firstName</td>
                    <td>$lastName</td>
                    <td>$gender</td>
                    <td>$email</td>
                    <td>$contact</td>
                    <td>$Trainer_ID</td>
                    
                    <td><a href=./memberEdit.php?memberID=$Member_ID><button type=\"submit\" name=\"editUser\"><i class=\"fas fa-user-edit\"></button></i></a></td>
                    
                    
                    
                    
                        
                    </tr>";

                }
                echo "</table>";
            ?>
            
        </div>

            
            
    </body>
</html>