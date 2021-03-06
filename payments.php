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
    $pid = rand(0001,5000);
    $Pay_list = mysqli_query($connectionObj,"SELECT * FROM payment");
    while ($row = mysqli_fetch_array($Pay_list))
    {
        if ($pid == $row['Payment_ID'])
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
    <title>Payments</title>
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



            <!-- Payments section start -->
            <h1><center>Payment DETAILS</center></h1>
            
                
            <h2>Transactions</h2>

            <?php
                 $query="SELECT * FROM `Payment` order by `DateTime` DESC   ;";
                 $result=mysqli_query($connectionObj,$query);
                 echo "<table><tr>
                 <th>Payment ID</th>
                 <th>Date and Time</th>
                 <th>Package ID</th>
                 <th>Member ID</th>
                 <th>Payment Type</th>
                 <th>Amount</th>
                 <th>Tax</th>
                 <th>Total</th>
                 
                 </tr>  ";
                 while($row=mysqli_fetch_array($result))
                 {
                     
                     $PaymentID=$row['Payment_ID'];
                     $DateTime=$row['DateTime'];
                     $PackageID=$row['Package_ID'];
                     $MemberID=$row['Member_ID'];
                     $PaymentType=$row['Payment_type'];
                     $Amount=$row['Amount'];
                     $Tax=$row['TAX'];
                     $Total=$row['Total'];
                    
                     echo"
                     <tr>
                     <td>$PaymentID</td>
                     <td>$DateTime</td>
                     <td>$PackageID</td>
                     <td>$MemberID</td>
                     <td>$PaymentType</td>
                     <td>$Amount</td>
                     <td>$Tax</td>
                     <td>$Total</td>
                     
                     
                     
                     
                         
                     </tr>";
 
                 }
                 echo "</table>";
            ?>
            
            <h2>Add New Transactions</h2>
            <form action="paymentComplete.php" method="get" > 
                <table>
                        <div>
                            <tr>
                                
                                <td>Payment ID:</td>
                                <td><?php echo "$pid";?>
                                <input type="hidden" name="pid" value="<?php echo "$pid";?>" /></td>
                            </tr>    
                        </div>   

                        <div><tr>
                                
                                <td>Package:</td>
                                <td>
                                    <select name="PackID">
                                <?php 
                                    $query="SELECT * FROM `Package`;";
                                    $result=mysqli_query($connectionObj,$query);
                                    
                                
                                    
                                    
                                    while($row = mysqli_fetch_array($result))
                                        {
                                        $Package_name=$row['Package_name'];
                                        $packageID=$row['Package_ID'];
                                        $packageAmount=$row['Amount'];
                                        echo "<option value=$packageID> $packageID - <b>$Package_name</b> - $packageAmount  </option>";
                                        }
                                    
                                    
                                ?>

                            </select>
                        </td>
                            </tr>    
                        </div>
                        <div>
                            <tr>
                                
                                <td>Member ID:</td>
                                <td><select name="memID">
                    <?php 
                        $query="SELECT * FROM `Members`;";
                        $result=mysqli_query($connectionObj,$query);
                        
                       
                        
                        
                        while($row = mysqli_fetch_array($result))
                            {
                            $Member_ID=$row['Member_ID'];
                            $Member_Name=$row['First_name'];
                            echo "<option value=$Member_ID> $Member_ID - <b>$Member_Name</b> </option>";
                            }
                        
                    ?>

                </select></td>
                            </tr>  
                        </div>  
                        <div>
                            <tr>
                                
                                <td>Payment Type:</td>
                                <td><select name="PayType">
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="cheque">Cheque</option>
                                </select></td>
                            </tr>    
                        </div> 

                        <tr>
                            <td></td>
                            <td><button type="submit" name="create_btn" class="activityButton">Proceed to Payment</button></td>
                        </tr> 
                </table>
            </form>
           
            


            <!-- Payment section end -->
        </div>


    

</body>
</html>