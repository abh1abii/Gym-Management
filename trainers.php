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
    {   $query="SELECT * FROM `Trainer`;";
        $result=mysqli_query($connectionObj,$query);
        if(mysqli_num_rows($result)==1)
        {
            echo "<script>alert('Table should contain atleast 1 entry!');</script>";
            echo '<script type="text/javascript">location.reload(true);</script>';
        }
        else{
            $delTrainID=$_POST['delTrainID'];
            $delQuery="DELETE FROM `Trainer` WHERE `Trainer_ID`='$delTrainID';";
                $delResult=mysqli_query($connectionObj,$delQuery);
                if($delResult)
                {
                    echo "<script>alert('Deleted!')</script>";
                    echo '<script type="text/javascript">location.reload(true);</script>';
                    
                }
        }

    }
    $tid = rand(0001,5000);
    $train_list = mysqli_query($connectionObj,"SELECT * FROM Trainer");
    while ($row = mysqli_fetch_array($train_list))
    {
        if ($tid == $row['Trainer_ID'])
        {
            echo '<script type="text/javascript">location.reload(true);</script>';
        }
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
    <title>Trainers</title>
</head>
<body>
    <?php include("./HeaderSidebar.php");?>
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



            <!-- Trainer section start -->
            <h1><center>TRAINER DETAILS</center></h1>
            
                
            <h2>List of Trainers</h2>

            <?php
                 $query="SELECT * FROM `Trainer`;";
                 $result=mysqli_query($connectionObj,$query);
                 echo "<table><tr>
                 <th>Trainer ID</th>
                 <th>Trainer Name</th>
                 <th>Phone Number</th>
                 </tr>  ";
                 while($row=mysqli_fetch_array($result))
                 {
                     
                     $TrainerID=$row['Trainer_ID'];
                     $TrainerName=$row['Name'];
                     $TrainerPhone=$row['Phone'];
                     echo"
                     <tr>
                     <td>$TrainerID</td>
                     <td>$TrainerName</td>
                     <td>$TrainerPhone</td>
                     
                     
                         
                     </tr>";
 
                 }
                 echo "</table>";
            ?>
            
            <h2>Add New Trainers</h2>
            <form action="trainers.php" method="POST" > 
                <table>
                        <div>
                            <tr>
                                
                                <!-- <td>Trainer ID:</td>
                                <td><?php //echo "$tid";?></td> -->
                            </tr>    
                        </div>   

                        <div><tr>
                                
                                <td>Trainer Name:</td>
                                <td><input type="text" name="setTrainerName"> </td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>Trainer Phone Number:</td>
                                <td><input type="text" name="setTrainerPhone"></td>
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
                
                    $setTrainerName= mysqli_real_escape_string($connectionObj,$_POST['setTrainerName']);
                    $setTrainerID= $tid;
                    $setTrainerPhone= mysqli_real_escape_string($connectionObj,$_POST['setTrainerPhone']);
                    if(empty($setTrainerName))
                        {echo "<script>alert('Empty Trainer Name');</script>";}
                    else if(empty($setTrainerID))
                        {echo "<script>alert('Empty Trainer ID!');</script>";}
                    else if(empty($setTrainerPhone))
                        {echo "<script>alert('Empty Phone Number error!');</     script>";}
                    else if(!(is_numeric($setTrainerPhone)) )
                        {echo "<script>alert('Invalid Phone Number error!');</script>";}
                    
                    else 
                    {   $Trainer_exists_query = "SELECT * FROM                 Trainer WHERE Trainer_ID = '$setTrainerID'";

                        $Trainer_check = mysqli_query($connectionObj,$Trainer_exists_query);
                        $Pack=mysqli_fetch_assoc($Trainer_check);
                        if($Pack)
                        {    
                            if($Pack['Trainer_ID']===$setTrainerID) 
                            {
                                echo "<script>alert('Trainer ID already exists.');</script>";
                            }
                            
                            
                            
                        }
                        else 
                        {
                            
                            $query="INSERT INTO `Trainer` VALUES('$setTrainerID','$setTrainerName',$setTrainerPhone);";
                            $res=mysqli_query($connectionObj,$query);
                            if($res)
                            {
                                echo "<script>alert('Trainer Created!');</script>";
                            }   
                            echo '<script type="text/javascript">location.reload(true);</script>';
                        }
                        
                    }
                }



               
            ?>
            <h2>Delete Trainer</h2>
            <form method="POST">
                Select Trainer to Delete: <select name="delTrainID">
                    <?php 
                        $query="SELECT * FROM `Trainer`;";
                        $result=mysqli_query($connectionObj,$query);
                        
                       
                        
                        
                        while($row = mysqli_fetch_array($result))
                            {
                            $Trainer_name=$row['Name'];
                            $TrainerID=$row['Trainer_ID'];
                            echo "<option value=$TrainerID> $TrainerID - <b>$Trainer_name</b> </option>";
                            }
                        
                    ?>

                </select><button type="submit" name="delete-btn" class="activityButton">DELETE</button>
            </form>


            <!-- Trainer section end -->
        </div>


    

</body>
</html>