<?php

global $connectionObj;
$setPackageName= mysqli_real_escape_string($connectionObj,$_POST['setPackageName']);
  $setPackageID= mysqli_real_escape_string($connectionObj,$_POST['setPackageID']);
  $setAmount= mysqli_real_escape_string($connectionObj,$_POST['setAmount']);
  if(empty($setPackageName))
      {echo "<script>alert('Empty Package Name');</script>";}
  else if(empty($setPackageID))
      {echo "<script>alert('Empty Package ID!');</script>";}
  else if(empty($setAmount))
      {echo "<script>alert('Empty Amount error!');</     script>";}
  else if(!(is_numeric($setAmount)) )
      {echo "<script>alert('Invalid Amount error!');</script>";}
  else 
  {  
    $query="INSERT INTO `Package` VALUES('$setPackageID','$setPackageName',$setAmount)";
    echo "<script>$query</script>";
    //mysqli_query($connectionObj,$query);
    //echo '<script type="text/javascript">location.reload(true);</script>';
          
        
      
  }

  ?>
