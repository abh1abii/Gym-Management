<?php
    require("connection.php");
    require("../credentials.php");
    session_start();
    $uid = rand(0001,5000);
    $user_list = mysqli_query($connectionObj,"SELECT * FROM Members");
    while ($user = mysqli_fetch_array($user_list))
    {
        if ($uid == $user['Member_ID'])
        {
            echo '<script type="text/javascript">location.reload(true);</script>';
        }
    }

    if(!isset($_SESSION['admin_username']))
    {
        header("location: admin_login.php");
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header("location: admin_login.php");
    }
    // if(isset($_POST['delete-btn']))
    // {
    //     $delName=$_POST['delUser'];
    //     if($delName==$_SESSION['admin_username'])
    //     {
    //         echo "<script>alert('User Active! Deletion failed!')</script>";
    //     }
    //     else
    //     {
    //         $delQuery="DELETE FROM `admin_login` WHERE `admin_name`='$delName';";
    //         $delResult=mysqli_query($connectionObj,$delQuery);
    //         if($delResult)
    //         {
    //             echo "<script>alert('Deleted!')</script>";
    //             echo '<script type="text/javascript">location.reload(true);</script>';
                
    //         }
            
    //     }

    // }
    
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="adminPanelStyle.css">
        <title>Register</title>
    </head>
    <body ><?php include("./HeaderSidebar.php");?>
        <div class="content">
        </div>
        
        <div class="container">



            <!-- registration section start -->
            <h1><center>Member Registration</center></h1>
            
            <form action="adminPanel.php" method="post" > 
                <table>
                <div><tr>
                                
                                <!-- <td>Member ID</td>
                                 <td><input type="text" name="setMemberID"> </td> 
                                <td><?php //echo "$uid";?></td> -->
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>First Name</td>
                                <td><input type="text" name="setFN"></td>
                            </tr>    
                        </div>   

                        <div><tr>
                                
                                <td>Last Name</td>
                                <td><input type="text" name="setLN"> </td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>Gender</td>
                                <td>
                                    <select name="setGender" >
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    </td>
                            </tr>  
                        </div> 
                        <div><tr>
                                
                                <td>e-mail</td>
                                <td><input type="text" name="setEmail"> </td>
                            </tr>    
                        </div> 
                        <div><tr>
                                
                                <td>Contact</td>
                                <td><input type="text" name="setPhone"> </td>
                            </tr>    
                        </div>
                        
                        <div><tr>
                                
                                <td>Trainer</td>
                                <td><select name="setTrainerID">
                                <?php 
                                    $query="SELECT * FROM `Trainer`;";
                                    $result=mysqli_query($connectionObj,$query);
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $trainerName=$row['Name'];
                                            $trainerID=$row['Trainer_ID'];
                                            echo "<option value=$trainerID>$trainerID - $trainerName</option>";
                                        }
                                ?>

                </select> </td>
                            </tr>    
                        </div>

                        <tr>
                            <td></td>
                            <td><button type="submit" name="create_btn" class="activityButton">Create</button></td>
                        </tr> 
                </table>
            </form>
                
            
            <?php
                global $connectionObj;
                if(isset($_POST['create_btn']))
                {
                
                    $setFN= mysqli_real_escape_string($connectionObj,$_POST['setFN']);
                    $setLN= mysqli_real_escape_string($connectionObj,$_POST['setLN']);
                    $setGender= mysqli_real_escape_string($connectionObj,$_POST['setGender']);
                    $setEmail= mysqli_real_escape_string($connectionObj,$_POST['setEmail']);
                    $setPhone= mysqli_real_escape_string($connectionObj,$_POST['setPhone']);
                    $setTrainerID= mysqli_real_escape_string($connectionObj,$_POST['setTrainerID']);
                    if(empty($setFN))
                        {echo "<script>alert('Empty First Name');</script>";}
                    else if(empty($setLN))
                        {echo "<script>alert('Empty Last Name!');</script>";}
                    else if(empty($setGender))
                        {echo "<script>alert('Empty Gender!');</script>";}
                    else if(empty($setEmail))
                        {echo "<script>alert('Empty e-mail!');</script>";}
                    else if(empty($setPhone))
                        {echo "<script>alert('Empty Phone Number!');</script>";}
                    else if(!(is_numeric($setPhone)) )
                        {echo "<script>alert('Invalid Phone Number error!');</script>";}
                    else {
                    // {       echo "<script>alert('$setGender');</script>";
                            $query="INSERT INTO `Members` (`First_name`, `Last_name`, `Gender`, `email`, `contact`, `Member_ID`, `Trainer_ID`) VALUES
                            ('$setFN', '$setLN', '$setGender', '$setEmail', '$setPhone', '$uid', '$setTrainerID');";
                            $res=mysqli_query($connectionObj,$query);
                            if($res)
                            {
                                echo "<script>alert('Member Created!');</script>";
                            }
                            
                            echo '<script type="text/javascript">location.reload(true);</script>';
                        
                        
                    }
                }



            ?>
            


            <!-- registration section end -->
        </div>

            
            
    </body>
</html>