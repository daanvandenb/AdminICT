<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include("config.php");
	session_start();
	
   
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
	  $wachtwoord=$_POST['password'];
      $sql = "SELECT gebruikersnaam,wachtwoord FROM werknemers WHERE gebruikersnaam = '$myusername'";
      $result = mysqli_query($db,$sql);	 
      if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_array($result);
		if(password_verify($wachtwoord,$row['wachtwoord'])){
			$_SESSION['login_user'] = $myusername;
                    
			header("location: index.php");
	  exit();
	}
	
	}}
	
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ICT Zone | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>ICT</b>Zone</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Voer je e-mail en je wachtwoord in.</p>

      <form action="" autocomplete="on" method="POST">
        <div class="form-group has-feedback">
          <input id="username" name="username" required="required" type="text" class="form-control" placeholder="Gebruikersnaam">
          
        </div>
        <div class="form-group has-feedback">
          <input id="password" name="password" required="required" type="password" class="form-control" placeholder="Wachtwoord">
          
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Onthoud mij
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" value="Login" class="btn btn-primary btn-block btn-flat">Log in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">Ik weet niks niet meer</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
