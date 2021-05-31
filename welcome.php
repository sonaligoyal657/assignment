<?php
session_start();
if(isset($_SESSION["activeuser"])==false)
{
    header("location:logout.php");
}
?>
<html>
   
   <head>
      <title>Welcome</title>
   </head>
   
   <body>
      <h1>Welcome</h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>