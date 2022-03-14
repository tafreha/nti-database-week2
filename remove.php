<?php

require 'dbConnection.php';
//error_reporting(0);
// Attempt delete query execution

$data=$_GET['id'];
//$sql = "DELETE FROM `data` WHERE id='$id'";
$op=mysqli_query($con,"DELETE FROM data WHERE id='$data'");
if($op)
{
    echo" row deleted";
}
else{
   echo'error'.mysqli_error('$con');
}
 // Close connection
mysqli_close($con);
header("location: display.php");
?>