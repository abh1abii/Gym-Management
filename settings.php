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
    if(isset($_POST['delete-btn']))
    {
        $delName=$_POST['delUser'];
        if($delName==$_SESSION['admin_username'])
        {
            echo "<script>alert('User Active! Deletion failed!')</script>";
        }
        else
        {
            $delQuery="DELETE FROM `admin_login` WHERE `admin_name`='$delName';";
            $delResult=mysqli_query($connectionObj,$delQuery);
            if($delResult)
            {
                echo "<script>alert('Deleted!')</script>";
                echo '<script type="text/javascript">location.reload(true);</script>';
                
            }
            
        }

    }
    $query="SELECT * FROM `tax` where `priority`=(Select max(priority)); ";
    $result=mysqli_query($connectionObj,$query);
    $ServiceTax=0;
    $GST=0;            
    while($row=mysqli_fetch_array($result))
    {
        $ServiceTax=$row['serviceTax'];
        $GST=$row['GST'];
        $priority=$row['priority'];
        
    }
    
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="adminPanelStyle.css">
        <title>Setup</title>
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



            <!-- registration section start -->
            <h1><center>SETTINGS</center></h1>
            <h2>Add Admin User Accounts</h2>
            <form action="settings.php" method="post" > 
                <table>
                        <div>
                            <tr>
                                
                                <td>Username</td>
                                <td><input type="text" name="setUsername"></td>
                            </tr>    
                        </div>   

                        <div><tr>
                                
                                <td>Password</td>
                                <td><input type="password" name="setPassword"> </td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>Confirm Password</td>
                                <td><input type="password" name="setPassword2"></td>
                            </tr>  
                        </div>  

                        <tr>
                            <td></td>
                            <td><button type="submit" name="create_btn" class="activityButton">Create</button></td>
                        </tr> 
                </table>
            </form>
                
            <h2>List of Existing Users</h2>
            <?php
                global $connectionObj;
                if(isset($_POST['create_btn']))
                {
                
                    $setUsername= mysqli_real_escape_string($connectionObj,$_POST['setUsername']);
                    $setPassword= mysqli_real_escape_string($connectionObj,$_POST['setPassword']);
                    $setPassword2= mysqli_real_escape_string($connectionObj,$_POST['setPassword2']);
                    if(empty($setUsername))
                        {echo "<script>alert('Empty Username');</script>";}
                    else if(empty($setPassword))
                        {echo "<script>alert('Empty password error!');</script>";}
                    else if(empty($setPassword2))
                        {echo "<script>alert('Empty password error!');</script>";}
                    else if($setPassword != $setPassword2)
                        {echo "<script>alert('Passwords do not match!');</script>";}
                    else 
                    {   $user_exists_query = "SELECT * FROM                 admin_login WHERE admin_name = '$setUsername' LIMIT 1";

                        $user_check = mysqli_query($connectionObj,$user_exists_query);
                        $user=mysqli_fetch_assoc($user_check);
                        if($user)
                        {
                            if($user['admin_name']===$setUsername) 
                            {
                                echo "<script>alert('Username already exists.');</script>";
                            }
                            
                            
                            
                        }
                        else 
                        {
                        // {   $hashPassword=password_hash($setPassword,PASSWORD_DEFAULT);
                            $query="INSERT INTO admin_login VALUES('$setUsername','$setPassword')";
                            mysqli_query($connectionObj,$query);
                            echo '<script type="text/javascript">location.reload(true);</script>';
                        }
                        
                    }
                }



                $query="SELECT * FROM `admin_login`;";
                $result=mysqli_query($connectionObj,$query);
                echo "<table><tr>
                <th>Admin Username</th>
                </tr>  ";
                while($row=mysqli_fetch_array($result))
                {
                    
                    $user_name=$row['admin_name'];
                    $user_password=$row['admin_password'];
                    echo"
                    <tr>
                    <td>$user_name</td>
                    
                    
                        
                    </tr>";

                }
                echo "</table>";
            ?>
            <h2>Delete User</h2>
            <form method="POST">
                Select User to Delete: <select name="delUser">
                    <?php 
                        $query="SELECT * FROM `admin_login`;";
                        $result=mysqli_query($connectionObj,$query);
                        while($row = mysqli_fetch_array($result))
                            {
                                $user_name=$row['admin_name'];
                                echo "<option value=$user_name>$user_name</option>";
                            }
                    ?>

                </select><button type="submit" name="delete-btn" class="activityButton">DELETE</button>
            </form>
            <h2>Update Tax Percentage</h2>
            <form action="./settings.php" method="post">
                <table>
                    <tr>
                        <td>Service Tax:</td>
                        <td><input type="text" name="setServiceTax" value=<?php echo "$ServiceTax"?>></td>
                    </tr>
                    <tr>
                        <td>GST:</td>
                        <td><input type="text" name="setGST" value=<?php echo "$GST"?>></td>
                    </tr>
                    <tr>
                            <td></td>
                            <td><button type="submit" name="taxButton" class="activityButton">Update</button></td>
                        </tr> 
                </table>
        
        
            </form>
            <?php
            if(isset($_POST['taxButton']))
                {
                
                    $setServiceTax= mysqli_real_escape_string($connectionObj,$_POST['setServiceTax']);
                    $setGST= mysqli_real_escape_string($connectionObj,$_POST['setGST']);
                    
                    if(empty($setServiceTax))
                        {echo "<script>alert('Empty Filed');</script>";}
                    else if(empty($setGST))
                        {echo "<script>alert('Empty Field');</script>";}
                    
                    else if(!(is_numeric($setServiceTax+$setGST)) )
                        {echo "<script>alert('Invalid Value!');</script>";}
                    else 
                    {   
                            $queryTax="Update `tax`
                            set `serviceTax`='$setServiceTax',
                             `GST`='$setGST' where `priority`='$priority'";
                            // echo "<script>alert('$setServiceTax, $setGST, $priority');</script>";
                            
                            $resTax=mysqli_query($connectionObj,$queryTax);
                            // echo "<script>alert('$resTax');</script>";
                            
                            if($resTax)
                            {
                                echo "<script>alert('TAX Details Updated!');</script>";

                            }
                            else{
                              echo "<script>alert('error');</script>";
                            }
                            echo "<script>window.location.href = \"./settings.php\";</script>";
                            
                            
                        
                        
                    }
                }



            ?>


            <!-- registration section end -->
        </div>

            
            
    </body>
</html>