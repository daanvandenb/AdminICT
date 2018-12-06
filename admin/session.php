<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select gebruikersnaam from werknemers where gebruikersnaam = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['gebruikersnaam'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }


                
         $expireAfter =1800; // staat nu op een 30min 1800 sec
//session time out als nodig is 
if(isset($_SESSION['last_action'])){

    $secondsInactive = time() - $_SESSION['last_action'];

    $expireAfterSeconds = $expireAfter;

    if($secondsInactive >= $expireAfterSeconds){
        header('location:../../logout.php');
exit();
    }
}

$_SESSION['last_action'] = time();

?>