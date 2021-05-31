<?php
include_once("dbConnection.php");

$userid=$_GET["uid"];
$query="select * from users where uid='$userid'";
$table=mysqli_query($dbConn,$query);

if(mysqli_num_rows($table)==0)
    echo"Not Available";
else
      echo"Available";

?>
