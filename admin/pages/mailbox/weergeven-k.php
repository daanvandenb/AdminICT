<?php
include('../../session.php');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


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
        <div class="col-md-6">
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
				<label> E-mail: </label>
                  <div class="col-6">
                    <?php echo $rij[$i]['email']; ?>
                  </div>
				  
				  <span class="right"><label> Formulier ingevuld: </label> <?php echo $rij[$i]['formulier']; ?></span>
                </div>
				
				<div class="row">
				<label> Mobiel: </label>
                  <div class="col-6">
                    <?php echo $rij[$i]['mobiel']; ?>
                  </div>
                </div>
				
				<div class="row">
				<label> Telefoon: </label>
                  <div class="col-6">
                    <?php echo $rij[$i]['huistelefoon']; ?>
                  </div>
                </div>
				<div class="row">
				<label> Lid:</label>
                  <div class="col-6">
                   <?php echo $rij[$i]['lid']; ?> 
                  </div>
                </div>
				
			   <div class="row">
			   <label> Adres: </label>
                  <div class="col-6">
                    <?php echo $rij[$i]['adres']; ?> <?php echo $rij[$i]['huisnummer']; ?><?php echo $rij[$i]['toevoeging']; ?> <?php echo $rij[$i]['postcode']; ?> <?php echo $rij[$i]['plaats']; ?>
                  </div>
                </div>
					

				
				<div class="row">
				<label>Geboortedatum:</label>
                  <div class="col-6">
                    <?php 
					$date=date_create($rij[$i]['geboortedatum']);
					echo date_format($date, "d/m/Y"); ?>
                  </div>
                </div>
				
				<div class="row">
				<label>Teamviewer:</label>
                  <div class="col-6">
                    <?php echo $rij[$i]['teamviewer']; ?>
                  </div>
                </div>
				
				<div class="row">
				<label>Opmerkingen:</label>
                  <div class="col-6">
                    <?php echo $rij[$i]['opmerkingen']; ?>
                  </div>
                </div>
				
				
                </div>
				
              

            
                <!-- /.form group -->

             	<div class="form-group">
				
           	
                </div>
                <!-- /.form group -->
				
				</form>
				
				
				
              </div>
			  
			  
              <!-- /.card-body -->
            </div>
			
        </div>
		
		
		<?php
					
                    $result = mysqli_query($db,"SELECT * FROM opdrachten WHERE klantennummer='" . $_POST["users"][$i] . "' AND datumbegin >= CURDATE() ORDER BY datumbegin");
					$i=0;
					while($row = mysqli_fetch_array($result)) {

					if($i%2==0)
					$classname="evenRow";
					else
					$classname="oddRow";
					?>
					
                 <div class="card-body">
				 
				 
				 <tr class="<?php if(isset($classname)) echo $classname;?>">
                 <div class="callout callout-success">
                  <h5><?php 
				  
			
				  setlocale(LC_ALL, 'Dutch_Netherlands', 'Dutch', 'nl_NL', 'nl', 'nl_NL.ISO8859-1', 'nl_NL.UTF-8', 'nld_nld', 'nld', 'nld_NLD', 'NL_nl');
					$date=date_create($row['datumbegin']);
					
					
					
					$henk = strftime('%A %e %B', strtotime($row['datumbegin']));
					echo $henk; ?></h5> 
				 <div class="callout callout-info">
                 
				  <span class="left"><b><?php echo $row["voorletter"]; ?> <?php echo $row["achternaam"]; ?></b></span><span class="right"><?php echo $row["tijdbegin"]; ?></span>​
                  <p><?php echo $row["straat"]; ?> <?php echo $row["huisnr"]; ?> <?php echo $row["huistoev"]; ?> <?php echo $row["postcode"]; ?></p>
                  <p>Omschrijving: </br> <?php echo $row["probleem"]; ?></p>
				
                </div>
                </div>
				 </div>
				</tr>
				<?php
													}
													?>
				<?php
					$i++;
					}
					?>
				
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
