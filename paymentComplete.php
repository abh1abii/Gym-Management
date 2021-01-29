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
    $MemberID=$_GET['memID'];
    $pid=$_GET['pid'];
    $PackID=$_GET['PackID'];
    $PayType=$_GET['PayType'];
    $Amount=0;
    $stax=0;
    $GST=0;
    $firstName="";
    $lastName="";
    $gender="";
    $email="";
    $contact="";
    $Trainer_ID="";
    $packName="";
    date_default_timezone_set("Asia/Kolkata");




    $query="SELECT * FROM `Package` where Package_ID='$PackID';";
                $result=mysqli_query($connectionObj,$query);
                
                while($row=mysqli_fetch_array($result))
                {
                    $Amount=$row['Amount'];
                    $packName=$row['Package_name'];
                    
                }
    $query2="SELECT * FROM `tax` where priority=(SELECT max(priority));";
    $result2=mysqli_query($connectionObj,$query2);
    while($row=mysqli_fetch_array($result2))
                {
                    $stax=$row['serviceTax'];
                    $GST=$row['GST'];
                    
                }
    $query3="SELECT * FROM `Members` where Member_ID='$MemberID';";
    $result3=mysqli_query($connectionObj,$query3);
    while($row=mysqli_fetch_array($result3))
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
        <title>INVOICE</title>
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



            
            <h1><center>INVOICE</center></h1>
            
            <table>
              <tr>
                <td>
                  Payment_ID:
                </td>
                <td>
                  <?php echo "$pid";?>
                </td>
              </tr>
              <tr>
                <td>
                  Member ID:
                </td>
                <td>
                  <?php echo "$MemberID";?>
                </td></tr>
                <tr>
                <td>
                  Trainer ID:
                </td>
                <td>
                  <?php echo "$Trainer_ID";?>
                </td>
              </tr>
              <tr>
                <td>
                  Date and Time:
                </td>
                <td>
                  <?php echo date('Y-m-d H:i:s');?>
                </td>
              </tr>
              <tr></tr><tr></tr>
              <tr>
                <td>
                  Name:
                </td>
                <td>
                  <?php echo "$firstName $lastName";?>
                </td>
              </tr>
              <tr>
                <td>
                  Package ID:
                </td>
                <td>
                  <?php echo "$PackID";?>
                </td>
                <td>Package Name:</td>
                <td><?php echo "$packName";?></td>
              </tr>
              <tr>
                <td>
                  Gender:
                </td>
                <td>
                  <?php echo "$gender";?>
                </td>
              </tr>
              <tr>
                <td>
                  e-mail:
                </td>
                <td>
                  <?php echo "$email";?>
                </td>
                <td>
                  Contact:
                </td>
                <td>
                  <?php echo "$contact";?>
                </td>
              </tr>
              <tr></tr><tr></tr>
              <tr><td>Payment Type:</td><td><?php echo "$PayType";?></td></tr>
              <tr>
                <td>
                  Amount:
                </td>
                <td><?php echo "Rs. $Amount/-";?></td></tr><tr>
                <td>
                  Service Tax: 
                </td> 
                <td><?php 
                $calcstax=$Amount*($stax/100);
                echo "Rs. $calcstax/-";?></td></tr><tr>
                <td>GST:</td><td><?php 
                $calcGtax=$Amount*($GST/100);
                echo "Rs. $calcGtax/-";?></td>
                </tr><tr><td>
                  Total:
                </td>
                
                <td><?php 
                $calctotal=$Amount+$calcGtax+$calcstax;
                echo "Rs. $calctotal/-";?></td>
                
              
              
              </tr>
              
            <tr><td>
              <a href="./payments.php"><button class='activityButton'>Back</button></a>
            </td><td><form method="post"><button class='activityButton' name="create_btn" type="submit">Confirm</button></form></td></tr>
            </table>
                
            
            <?php
                global $connectionObj;
                if(isset($_POST['create_btn']))
                {
                
                    
                    
                       
                  $query="INSERT INTO `Payment`(`Payment_ID`, `DateTime`, `Package_ID`, `Member_ID`, `Payment_type`, `Amount`, `TAX`, `Total`) VALUES ('$pid',null,'$PackID','$MemberID','$PayType',$Amount,$calcGtax+$calcstax,$calctotal);";
                  $res=mysqli_query($connectionObj,$query);
                  
                  if($res)

                  { 
                    
                    
                    $number=$contact;
                    $amount=$Amount;
                    $payID=$pid;  
                    echo "<script>
                    window.location.href = \"./sms.php?phoneNo=$number&amount=$amount&payID=$payID\";
                    </script>";

                  }
                  else{
                    echo "<script>alert('error');</script>";
                  }
                  //echo "<script>window.location.href = \"./payments.php\";</script>";
                            
                            
                        
                        
                    
                }



            ?>
            
        </div>

            
            
    </body>
</html>