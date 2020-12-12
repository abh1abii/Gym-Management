<?php
require("../credentials.php");

$connectionObj=mysqli_connect($serverAddress,$DBMS_Username,$DBMS_password,$DBMS_DatabaseName);
if(mysqli_connect_error())
{
    echo "\nConnection to DataBase Unsuccessful: Error 404";
}
// else
// {
//     echo "\nconnection successful";
// }
?>