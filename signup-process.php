<?php
session_start();
include_once("dbConnection.php");
$uid=$_GET["uid"];
$eid=$_GET["eid"];
$pwd=$_GET["pwd"];

$query="insert into users(uid,eid,pwd) values (trim('$uid') ,'$eid', '$pwd')";
mysqli_query($dbConn,$query);
$msg=mysqli_error($dbConn);
if($msg=="")
{
	 $_SESSION["activeuser"]=$uid;
    echo "Signed up Successfully";
   
}
else
    echo $msg;
?>
