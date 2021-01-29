<?php require("connection.php");
    require("../credentials.php");
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
        header("location: admin_login.php");
    }
    ?>
<form method="POST">
                Select Package to Delete: <select name="delPackID">
                    <?php 
                        $queryDel="SELECT * FROM `package`;";
                        $resultDel=mysqli_query($connectionObj,$queryDel);
                        
                        
                       
                        
                        
                        while($row=mysqli_fetch_array($resultDel))
                            {
                            $Package_name=$row['Package_name'];
                            $packageID=$row['Package_ID'];
                            echo "<option value=$packageID> $packageID - <b>$Package_name</b> </option>";
                            }
                        
                    ?>

                </select>
                
                <button type="submit" name="delete-btn" class="activityButton">DELETE</button>
            </form> 
