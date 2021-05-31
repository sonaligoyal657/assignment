<?php
include_once("dbConnection.php");
session_start();
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];


$query="select * from users where uid='$uid' and pwd='$pwd'";
$table=mysqli_query($dbConn,$query);

if(mysqli_num_rows($table)==0)
    echo"Invalid UserId or Password";
else
{
	 $_SESSION["activeuser"]=$uid;
      echo"Successfull";
}



?>