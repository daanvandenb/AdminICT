<?php
   include('../../session.php');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
if(isset($_POST['new']) && $_POST['new']==1)
{

$klantennummer =mysqli_real_escape_string($db,$_POST['klantennummer']);
$voorletter=mysqli_real_escape_string($db,$_POST['voorletter']);					
$achternaam= mysqli_real_escape_string($db,$_POST['achternaam']);
$naammedewerker =mysqli_real_escape_string($db,$_POST['naammedewerker']);

$type =mysqli_real_escape_string($db,$_POST['type']);
$statusopdracht =mysqli_real_escape_string($db,$_POST['statusopdracht']);				
$oplosser =mysqli_real_escape_string($db,$_POST['oplosser']);						
$probleem =mysqli_real_escape_string($db,$_POST['probleem']);
$werkzaamheden =mysqli_real_escape_string($db,$_POST['werkzaamheden']);

$straat =mysqli_real_escape_string($db,$_POST['straat']);
$huisnr =mysqli_real_escape_string($db,$_POST['huisnr']);
$huistoev =mysqli_real_escape_string($db,$_POST['huistoev']);
$postcode =mysqli_real_escape_string($db,$_POST['postcode']);
$plaats =mysqli_real_escape_string($db,$_POST['plaats']);
$tijdbegin =mysqli_real_escape_string($db,$_POST['tijdbegin']);
$datumbegin =mysqli_real_escape_string($db,$_POST['datumbegin']);

$datum =mysqli_real_escape_string($db,$_POST['datum']);


$ins_query="INSERT INTO opdrachten (klantennummer,voorletter,achternaam,naammedewerker,type,statusopdracht,oplosser,probleem,werkzaamheden,datum,straat,huisnr,huistoev,postcode,plaats,tijdbegin,datumbegin) values ('$klantennummer','$voorletter','$achternaam','$naammedewerker','$type','$statusopdracht','$oplosser','$probleem','$werkzaamheden','$datum','$straat','$huisnr','$huistoev','$postcode','$plaats','$tijdbegin','$datumbegin')";
if(!mysqli_query($db,$ins_query) ){
	echo("desc". mysqli_error($db));
	exit();
}
header('location:../../pages/tables/opdrachten.php');
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
        <div class="col-md-9">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Opdracht toevoegen</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
				
				
				<?php
				if(!$rowCount = count($_POST["users"]))
				{
					echo"Niks geselecteerd";
					
				}
	

				for($i=0;$i<$rowCount;$i++) {
				$result = mysqli_query($db,"SELECT * FROM klanten WHERE id='" . mysqli_real_escape_string($db,$_POST["users"][$i]) . "'");
				$rij[$i]= mysqli_fetch_array($result);
				?>
                <div class="form-group">
                

                 <form name="form" method="POST" action=""> 
				<input type="hidden" name="new" value="1" />
               <div class="row">
			   <label>Klant: &nbsp;</label>
               <p><input type="hidden" name="klantennummer"value=" <?php echo  $rij[$i]['id'];  ?>"> </p>
                    <p> <input type="hidden" name="voorletter"value=" <?php echo $rij[$i]['voorletter'];  ?>"> <?php echo $rij[$i]['voorletter'];?>
					<input type="hidden" name="achternaam"value="<?php echo $rij[$i]['achternaam'];  ?>"><?php echo $rij[$i]['achternaam'];  ?>
					</p> 
				</div>					
					
				

                </div>
				
				<div class="form-group">
				<div class="row">
                  <div class="col-3">
                    <input type="text" readonly name="straat" required class="form-control" value="<?php echo $rij[$i]['adres'];  ?>">
                  </div>
				 <div class="col-1">
                    <input type="text" readonly name="huisnr" required class="form-control" value="<?php echo $rij[$i]['huisnummer'];  ?>">
                  </div>
				 <div class="col-1">
                    <input type="text" readonly name="huistoev"  class="form-control" value="<?php echo $rij[$i]['toevoeging'];  ?>">
                  </div>
					<div class="col-3">
                    <input type="text" readonly name="postcode" required class="form-control" value="<?php echo $rij[$i]['postcode'];  ?>">
                  </div>
				  <div class="col-3">
                    <input type="text" readonly name="plaats" required class="form-control" value="<?php echo $rij[$i]['plaats'];  ?>">
                  </div>
					
                
                </div>
           
                </div>
				
                <!-- phone mask -->
                <div class="form-group">
                

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date"  name="datumbegin" class="form-control" placeholder="Datum" >
					<div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                    </div>
                    <input type="time"  name="tijdbegin" class="form-control" placeholder="Tijd" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

             	<div class="form-group">
			<div class="row">
				
				<select required name="type" class="form-control col-3">
                      <option><b>--Service--</b></option>
                      <option><b>Hulp aan Huis</b></option>
                      <option><b>Hulp op Afstand</b></option>
                      <option><b>Anders</b></option>
                    
                      
                    </select>
					<select required name="statusopdracht" class="form-control col-3">
                      <option><b>--Status--</b></option>
                      <option><b>Ingepland</b></option>
                      <option><b>Open</b></option>
                      <option><b>Gesloten</b></option>
                    
                      
                    </select>
					
					<select required name="oplosser" class="form-control col-3">
                      <option><b>--Werknemer--</b></option>
                      <option><b>Daan</b></option>
                      <option><b>Anders</b></option>
                   
                    
                      
                    </select>
                  </div>
					
             </div>
			 
			
			
			<div class="form-group">
			<div class="row">
			  
                <div class="col-6">
                <textarea name="probleem" required style="resize: none" rows="10" placeholder="Koste omschrijving van het Probleem" class="form-control form-control-line"></textarea>
				</div>
			
			
           
			
			
			  
                <div class="col-6">
                <textarea name="werkzaamheden" style="resize: none" rows="10" placeholder="Koste omschrijving van werkzaamheden" class="form-control form-control-line"></textarea>
				</div>
			
			
            </div>
            </div>
			
			
			<?php
				}
				$resultaat = mysqli_query($db, "SELECT gebruikersnaam FROM werknemers WHERE gebruikersnaam = '$user_check' ");
				 while ($record = mysqli_fetch_assoc($resultaat))
				{ ?>
				
				<div class="row">
				<label>Aannemer: &nbsp;</label>
				<p><input type="hidden" name="naammedewerker"  value="<?php echo ucfirst($record['gebruikersnaam']);  ?>"> <?php echo ucfirst($record['gebruikersnaam']);  }?> </p>
				<p> <input type="hidden" name="datum"  value="<?php echo date("Y/m/d");?>"></p>
				</div>
			
                </div>
                <!-- /.form group -->
				<p><input  name="submit" type="submit" class="btn btn-info btn-block mb-3" value="Toevoegen" ></p>
				</form>
				
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
