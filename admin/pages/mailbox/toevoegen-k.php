<?php
   include('../../session.php');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	if(isset($_POST['new']) && $_POST['new']==1)
{
$voorletter =mysqli_real_escape_string($db,$_POST['voorletter']);
$voornaam = mysqli_real_escape_string($db,$_POST['voornaam']);
$tussenvoegsel = mysqli_real_escape_string($db,$_POST['tussenvoegsel']);
$achternaam = mysqli_real_escape_string($db,$_POST['achternaam']);
$adres = $_POST['adres'];
$huisnummer =mysqli_real_escape_string($db,$_POST['huisnummer']);
$toevoeging = mysqli_real_escape_string($db,$_POST['toevoeging']);
$postcode =mysqli_real_escape_string($db,$_POST['postcode']);
$plaats = mysqli_real_escape_string($db,$_POST['plaats']);
$huistelefoon = mysqli_real_escape_string($db,$_POST['huistelefoon']);
$mobiel = mysqli_real_escape_string($db,$_POST['mobiel']);
$email = $_POST['email'];
$lid = mysqli_real_escape_string($db,$_POST['lid']);
$geboortedatum = mysqli_real_escape_string($db,$_POST['geboortedatum']);
$teamviewer = mysqli_real_escape_string($db,$_POST['teamviewer']);

$opmerkingen = mysqli_real_escape_string($db,$_POST['opmerkingen']);
$formulier = mysqli_real_escape_string($db,$_POST['formulier']);


$submittedby = $_SESSION["login_user"];
$ins_query="INSERT INTO klanten (voorletter,voornaam,tussenvoegsel,achternaam,adres,huisnummer,toevoeging,postcode,plaats,huistelefoon,mobiel,email,lid,lidsinds,geboortedatum,teamviewer,opmerkingen,formulier) values ('$voorletter','$voornaam','$tussenvoegsel','$achternaam','$adres','$huisnummer','$toevoeging','$postcode','$plaats','$huistelefoon','$mobiel','$email','$lid','$lidsinds','$geboortedatum','$teamviewer','$opmerkingen','$formulier')";
mysqli_query($db,$ins_query);
header('location:klanten.php');

exit();
}
   ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ICT Zone | Berichten</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
           <?php
include('../../nav-bar2.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Klant toevoegen</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                

                 <form name="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
				<input type="hidden" name="new" value="1" />
               
					
				<div class="row">
                  <div class="col-3">
                    <input type="text" name="voornaam" class="form-control" placeholder="Voornaam">
                  </div>
				  <div class="col-2">
                    <input type="text" name="voorletter" required class="form-control" placeholder="Voorletter(s)">
                  </div>
				  <div class="col-3">
                    <input type="text" name="tussenvoegsel" class="form-control" placeholder="Tussenvoegsel">
                  </div>
                  <div class="col-4">
                    <input type="text" name="achternaam" required class="form-control" placeholder="Achternaam">
                  </div>
                
                </div>
                </div>
				<div class="form-group">
				<div class="row">
                  <div class="col-3">
                    <input type="text" name="adres" required class="form-control" placeholder="Straat">
                  </div>
				 <div class="col-2">
                    <input type="text" name="huisnummer" required class="form-control" placeholder="Huisnummer">
                  </div>
				 <div class="col-2">
                    <input type="text" name="toevoeging"  class="form-control" placeholder="Toevoeging">
                  </div>
					<div class="col-2">
                    <input type="text" name="postcode" required class="form-control" placeholder="Postcode">
                  </div>
				  <div class="col-3">
                    <input type="text" name="plaats" required class="form-control" placeholder="Plaats">
                  </div>
					
                
                </div>
           
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="text" name="email"  class="form-control" placeholder="E-mail">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text"  name="huistelefoon" class="form-control" placeholder="Huistelefoon" >
					<div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text"  name="mobiel" class="form-control" placeholder="Mobiel" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

             	<div class="form-group">
				<label> Klant is lid</label>
				<div class="row">
				
				<select required name="lid" class="form-control col-3">
                      <option><b>nee</b></option>
                      <option><b>ja</b></option>
                    
                      
                    </select>
					
					<div class="col-3">
                    <input type="text" name="teamviewer" class="form-control" placeholder="Teamviewer">
                  </div>
                  </div>
					
             </div>
				<div class="form-group">
				<label>Geboortedatum</label>
				<div class="row">
			
                  <div class="col-6">
                    <input type="date" required name="geboortedatum" class="form-control" >
                  </div>
				  
            </div>
            </div>
			
			<div class="form-group">
			
			  
                <div class="col-6">
                <textarea name="opmerkingen" style="resize: none" rows="10" placeholder="Bezonderheden/opmerkingen/klant" class="form-control form-control-line"></textarea>
				</div>
			
			
            </div>
			
				<div class="form-group">
				<label>Formulier is ingevuld door klant</label>
				<div class="row">
			
                  <select required name="formulier" class="form-control col-3">
                      <option><b>nee</b></option>
                      <option><b>ja</b></option>
                    
                      
                    </select>
				  
            </div>
            </div>
                </div>
                <!-- /.form group -->
				<div class="col-6">
				<p><input  name="submit" type="submit" class="btn btn-info btn-block mb-3" value="Toevoegen" ></p>
				</form>
				
              </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
  
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
     Voor elk digitaal probleem een oplossing!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="http://ictzone.nl">ICT Zone</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
