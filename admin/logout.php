<?php
   session_start();
include('config.php');
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$sql="UPDATE werknemers WHERE gebruikersnaam='".$_SESSION['login_user']."'";
$query=mysqli_query($db,$sql) ; 
        if(session_destroy()) {
              
      header("location: login.php");
   }
?>