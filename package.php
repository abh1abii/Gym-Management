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
    {   $query="SELECT * FROM `Package`;";
        $result=mysqli_query($connectionObj,$query);
        if(mysqli_num_rows($result)==1)
        {
            echo "<script>alert('Table should contain atleast 1 entry!');</script>";
            echo '<script type="text/javascript">location.reload(true);</script>';
        }
        else{
            $delPackID=$_POST['delPackID'];
            $delQuery="DELETE FROM `Package` WHERE `Package_ID`='$delPackID';";
                $delResult=mysqli_query($connectionObj,$delQuery);
                if($delResult)
                {
                    echo "<script>alert('Deleted!')</script>";
                    echo '<script type="text/javascript">location.reload(true);</script>';
                    
                }
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
    <title>Package</title>
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



            <!-- Package section start -->
            <h1><center>PACKAGE DETAILS</center></h1>
            
                
            <h2>List of Packages</h2>

            <?php
                 $query="CALL `query_package`();";
                 $result=mysqli_query($connectionObj,$query);
                 echo "<table><tr>
                 <th>Package_ID</th>
                 <th>Package_name</th>
                 <th>Amount</th>
                 </tr>  ";
                 while($row=mysqli_fetch_array($result))
                 {
                     
                     $packageID=$row['Package_ID'];
                     $packageName=$row['Package_name'];
                     $packageAmount=$row['Amount'];
                     echo"
                     <tr>
                     <td>$packageID</td>
                     <td>$packageName</td>
                     <td>$packageAmount</td>
                     
                     
                         
                     </tr>";
 
                 }
                 echo "</table>";
            ?>
            
            <!-- <h2>Add New Packages</h2>
            <form  method="post" > 
                <table>
                        <div>
                            <tr>
                                
                                <td>Package ID:</td>
                                <td><input type="text" name="setPackageID"></td>
                            </tr>    
                        </div>   

                        <div><tr>
                                
                                <td>Package Name:</td>
                                <td><input type="text" name="setPackageName"> </td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>Package Amount:</td>
                                <td><input type="text" name="setAmount"></td>
                            </tr>  
                        </div>  

                        <tr>
                            <td></td>
                            <td><button type="submit" name="create_btn" class="activityButton">Create</button></td>
                        </tr> 
                </table>
            </form>
            <?php
                // global $connectionObj;
                // if(isset($_POST['create_btn']))
                // {
                
                //     include("packinsert.php");
                // }



               
            ?>
             <h2>Delete Package</h2>
            <!-- <?php include("packDel.php");?> -->

            <!-- registration section end 
        </div> -->


    

</body>
</html>