<?php
include('../../session.php');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["userName"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($db,"UPDATE klanten SET achternaam='" .mysqli_real_escape_string($db,$_POST["userName"][$i]) . "', voornaam='" .mysqli_real_escape_string($db,$_POST["firstName"][$i]) . "', voorletter='" .mysqli_real_escape_string($db,$_POST["voorletter"][$i]) . "', tussenvoegsel='" .mysqli_real_escape_string($db,$_POST["tussenvoegsel"][$i]) . "', email='" .mysqli_real_escape_string($db,$_POST["email"][$i]) . "', mobiel='" .mysqli_real_escape_string($db,$_POST["mobiel"][$i]) . "', huistelefoon='" .mysqli_real_escape_string($db,$_POST["huistelefoon"][$i]) . "', huisnummer='" .mysqli_real_escape_string($db,$_POST["huisnummer"][$i]) . "', toevoeging='" .mysqli_real_escape_string($db,$_POST["toevoeging"][$i]) . "', postcode='" .mysqli_real_escape_string($db,$_POST["postcode"][$i]) . "', plaats='" .mysqli_real_escape_string($db,$_POST["plaats"][$i]) . "', lid='" .mysqli_real_escape_string($db,$_POST["lid"][$i]) . "', teamviewer='" .mysqli_real_escape_string($db,$_POST["teamviewer"][$i]) . "', geboortedatum='" .mysqli_real_escape_string($db,$_POST["geboortedatum"][$i]) . "', formulier='" .mysqli_real_escape_string($db,$_POST["formulier"][$i]) . "', opmerkingen='" .mysqli_real_escape_string($db,$_POST["opmerkingen"][$i]) . "', adres='" .mysqli_real_escape_string($db,$_POST["adres"][$i]) . "' WHERE id='" . $_POST["userId"][$i] . "'");
}
header('location: klanten.php');
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
				<?php												
				if(!$rowCount = count($_POST["users"])){
				echo"niks geselecteerd";
				}
				for($i=0;$i<$rowCount;$i++) {
				$result = mysqli_query($db,"SELECT * FROM klanten WHERE id='" . $_POST["users"][$i] . "'");
				$rij[$i]= mysqli_fetch_array($result);
				?>
				
				<style>
				.right{
				float:right;
				}

				.left{
				float:left;
				}
				</style>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><span class="left"><?php echo $rij[$i]['voorletter']; ?> <?php echo $rij[$i]['tussenvoegsel']; ?> <?php echo $rij[$i]['achternaam']; ?> </span><span class="right"><?php echo $rij[$i]['id']; ?></span></h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                

                 <form name="form" method="POST" action=""> 
				 <input type="hidden" name="userId[]" class="txtField" value="<?php echo $rij[$i]['id']; ?>">
				
               
					
				<div class="row">
                  
				  <div class="col-3">
                    <input type="text" name="firstName[]"  placeholder="Voornaam" class="form-control form-control-line" value="<?php echo $rij[$i]['voornaam']; ?>"> 
                  </div>
				  <div class="col-2">
                    <input type="text" name="voorletter[]" placeholder="vlt" required class="form-control form-control-line" value="<?php echo $rij[$i]['voorletter']; ?>"> 
                  </div>
				  <div class="col-3">
                    <input type="text" name="tussenvoegsel[]"  placeholder="Tussenvoegsel" class="form-control form-control-line" value="<?php echo $rij[$i]['tussenvoegsel']; ?>"> 
                  </div>
                  <div class="col-4">
                    <input type="text" name="userName[]"   placeholder="Achternaam" required class="form-control form-control-line" value="<?php echo $rij[$i]['achternaam']; ?>"> 
                  </div>
                
                </div>
                </div>
				<div class="form-group">
				<div class="row">
                  <div class="col-3">
                    <input type="text" name="adres[]"  required placeholder="Straatnaam" class="form-control form-control-line" value="<?php echo $rij[$i]['adres']; ?>"> 
                  </div>
				 <div class="col-2">
                    <input type="number" name="huisnummer[]" placeholder="Huisnummer" required class="form-control form-control-line" value="<?php echo $rij[$i]['huisnummer']; ?>"> 
                  </div>
				 <div class="col-2">
                    <input type="text" name="toevoeging[]" placeholder="Toevoeging"  class="form-control form-control-line" value="<?php echo $rij[$i]['toevoeging']; ?>"> 
                  </div>
                  <div class="col-2">
                    <input type="text" name="postcode[]" placeholder="Postcode"  required class="form-control form-control-line" value="<?php echo $rij[$i]['postcode']; ?>"> 
                  </div>
                   <div class="col-3">
                    <input type="text" name="plaats[]" placeholder="Plaats"  required class="form-control form-control-line" value="<?php echo $rij[$i]['plaats']; ?>"> 
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
                    <input type="text" name="email[]" placeholder="E-mail"  class="form-control form-control-line" value="<?php echo $rij[$i]['email']; ?>"> 
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
                    <input type="text"  name="huistelefoon[]" class="form-control" placeholder="Huistelefoon" value="<?php echo $rij[$i]['huistelefoon']; ?>" >
					<div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text"  name="mobiel[]" class="form-control" placeholder="Mobielnummer" value="<?php echo $rij[$i]['mobiel']; ?>" >
                  </div>
                </div>
                <!-- /.form group -->

             	<div class="form-group">
				<div class="row">
				<label>Lid:</label>
                   <div class="col-1">
                    <input type="text" name="lid[]" placeholder=""  required class="form-control form-control-line" value="<?php echo $rij[$i]['lid']; ?>"> 
                  </div>
				  <label>Teamviewer Code:</label>
				  <div class="col-3">
                    <input type="text" name="teamviewer[]" placeholder="ID Teamviewer"  class="form-control form-control-line" value="<?php echo $rij[$i]['teamviewer']; ?>"> 
                  </div>
                
                </div>
				
				
           
                </div>
				
				<div class="form-group">
				
				
				  <div class="col-7">
				  <label>Geboortedatum</label>
                    <input type="date" name="geboortedatum[]" placeholder="" required class="form-control form-control-line" value="<?php echo $rij[$i]['geboortedatum']; ?>"> 
                  </div>
                  </div>
				  
				  <div class="form-group">
				  <div class="col-2">
				  <label>Klantenformulier ingevuld</label>
                    <input type="text" name="formulier[]" placeholder="" required class="form-control form-control-line" value="<?php echo $rij[$i]['formulier']; ?>"> 
                  </div>
				  </div>
				  
				  <div class="form-group">
				  
				 <div class="col-6">
                <textarea name="opmerkingen[]" style="resize: none" rows="10" placeholder="Bezonderheden/opmerkingen/klant" class="form-control form-control-line"><?php echo $rij[$i]['opmerkingen']; ?></textarea>
				</div>
				  
				  
				
				</div>
				
				
				<div class="col-6"
                <!-- /.form group -->
				<p><input  name="submit" type="submit" class="btn btn-info btn-block mb-3" value="Aanpassen" ></p>
				</div>
				</form>
				<?php
}

?>
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
