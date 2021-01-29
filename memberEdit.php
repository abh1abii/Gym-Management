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
    $MemberID=$_GET['memberID'];
    $query="SELECT * FROM `Members` where Member_ID='$MemberID';";
                $result=mysqli_query($connectionObj,$query);
                
                while($row=mysqli_fetch_array($result))
                {
                    $firstName=$row['First_name'];
                    $lastName=$row['Last_name'];
                    $gender=$row['Gender'];
                    $email=$row['email'];
                    $contact=$row['contact'];
                    $Trainer_ID=$row['Trainer_ID'];
                }
    
                
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="adminPanelStyle.css">
        <title>Edit Member</title>
    </head>
    <body ><?php include("./HeaderSidebar.php");?>
        <div class="content">
        </div>
        <!-- <style>
            .disnone{
                opacity:0;
            }
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



            
            <h1><center>Edit Member Details</center></h1>
            
            <form method="post" > 
                <table>
                <div><tr>
                                
                                <td>Member ID</td>
                                <!-- <td><input type="text" name="setMemberID"> </td> -->
                                <td><?php echo "$MemberID";?></td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>First Name</td>
                                <td><input type="text" name="setFN" value=<?php echo "$firstName"?>></td>
                            </tr>    
                        </div>   

                        <div><tr>
                                
                                <td>Last Name</td>
                                <td><input type="text" name="setLN" value=<?php echo "$lastName"?>> </td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>Gender</td>
                                <td>
                                <?php
                                if($gender=="male")
                                { echo "
                                  <select name=\"setGender\" >
                                        <option value=\"male\" selected>Male</option>
                                        <option value=\"female\">Female</option>
                                        <option value=\"other\">Other</option>
                                    </select>";
                                }
                                else if($gender=="female")
                                { echo "
                                  <select name=\"setGender\" >
                                        <option value=\"male\" >Male</option>
                                        <option value=\"female\" selected>Female</option>
                                        <option value=\"other\">Other</option>
                                    </select>";
                                }
                                else
                                {
                                  echo "
                                  <select name=\"setGender\" >
                                        <option value=\"male\" >Male</option>
                                        <option value=\"female\" >Female</option>
                                        <option value=\"other\" selected>Other</option>
                                    </select>";

                                }
                                
                                ?>  
                                
                                
                                
                                </td>
                                    
                            </tr>  
                        </div> 
                        <div><tr>
                                
                                <td>e-mail</td>
                                <td><input type="text" name="setEmail" value=<?php echo "$email"?>> </td>
                            </tr>    
                        </div> 
                        <div><tr>
                                
                                <td>Contact</td>
                                <td><input type="text" name="setPhone" value=<?php echo "$contact"?>> </td>
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
                                            echo "<option value=\"$trainerID\" ";
                                            if($trainerID==$Trainer_ID)
                                            {
                                              echo "selected";
                                            }
                                            echo ">$trainerID - $trainerName</option>";
                                        }
                                ?>

                </select> </td>
                            </tr>    
                        </div>

                        <tr>
                            <td></td>
                            <td><button type="submit" name="create_btn" class="activityButton">Update</button></td>
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
                    else 
                    {   
                            $query="Update `Members`
                            set `First_name`='$setFN',
                             `Last_name`='$setLN',
                             `Gender`='$setGender',
                            `email`='$setEmail',
                             `contact`='$setPhone',
                             `Trainer_ID`='$setTrainerID'
                            where `Members`.`Member_ID`='$MemberID';";
                            $res=mysqli_query($connectionObj,$query);
                            
                            if($res)
                            {
                                echo "<script>alert('Member Details Updated!');</script>";

                            }
                            else{
                              echo "<script>alert('error');</script>";
                            }
                            echo "<script>window.location.href = \"./memberDetails.php\";</script>";
                            
                            
                        
                        
                    }
                }

                if(isset($_POST['delete-btn']))
                {   $query="SELECT * FROM `Members`;";
                    $result=mysqli_query($connectionObj,$query);
                    if(mysqli_num_rows($result)==1)
                    {
                        echo "<script>alert('Table should contain atleast 1 entry!');</script>";
                        echo '<script type="text/javascript">location.reload(true);</script>';
                    }
                    else{
                        $delMemID=$MemberID;
                         
                        $delQuery="DELETE FROM `Members` WHERE `Member_ID`='$delMemID';";
                            $delResult=mysqli_query($connectionObj,$delQuery);
                            if($delResult)
                            {
                                echo "<script>alert('Deleted!')</script>";
                                echo "<script>window.location.href = \"./memberDetails.php\";</script>";
                                
                            }
                            else {
                                echo "<script>alert('Verified User with Purchases Cannot be deleted!')</script>";
                                echo "<script>window.location.href = \"./memberDetails.php\";</script>";
                            }
                    }
            
                }



            ?>
            <!--  -->
            
            <!-- <form method="POST">

            <table ><tr><td class=disnone>................</td><td >
            <button type="submit" name="delete-btn" class="activityButton">DELETE Member</button></td>
            </table>
          </form> -->
            


            <!-- registration section end -->
        </div>

            
            
    </body>
</html>