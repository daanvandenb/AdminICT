<?php
include('session.php');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if($aantalklanten=mysqli_query($db,"SELECT count(*) as total FROM klanten")){
		$dataklant=mysqli_fetch_assoc($aantalklanten);
        }
        else{
            echo "0";
        }

		if($aantalleden=mysqli_query($db,"SELECT count(*) as total FROM klanten WHERE lid = 'ja'")){
		$datalid=mysqli_fetch_assoc($aantalleden);
        }
        else{
            echo "0";
        }
		
		if($aantalwerknemers=mysqli_query($db,"SELECT count(*) as total FROM werknemers ")){
		$datawerknemer=mysqli_fetch_assoc($aantalwerknemers);
        }
        else{
            echo "0";
        }
		
		if($aantalopdrachten=mysqli_query($db,"SELECT count(*) as total FROM opdrachten WHERE datumbegin < CURDATE()")){
		$dataopdracht=mysqli_fetch_assoc($aantalopdrachten);
        }
        else{
            echo "0";
        }
		
		if($opdrachten=mysqli_query($db,"SELECT count(*) as total FROM opdrachten WHERE datumbegin > CURDATE()")){
		$tellen=mysqli_fetch_assoc($opdrachten);
		if($tellen['total'] == 0)
		{
			$weergeef= "";
		}
		else{
			$weergeef= "Nieuw!";
		}
        }
        else{
            echo "";
        }
		
		if($aantalberichten=mysqli_query($db,"SELECT count(*) as total FROM feedback ")){
		$databerichten=mysqli_fetch_assoc($aantalberichten);
		if($databerichten['total'] == 0)
		{
			$berichtje= "";
		}
		else{
			$berichtje= $databerichten['total'];
			
		}
        }
        else{
            echo "";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ICT Zone | Overzicht</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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

<?php
include('nav-bar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Behandelde opdrachten</span>
                <span class="info-box-number"><?php echo $dataopdracht['total'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-address-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Klanten</span>
                <span class="info-box-number"><?php echo $dataklant['total'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-paper-plane"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Leden</span>
                <span class="info-box-number"><?php echo $datalid['total'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Werknemers</span>
                <span class="info-box-number"><?php echo $datawerknemer['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
		
    
         
		  
		  
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
     Voor elk digitaal probleem een oplossing!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="http://ictzone.nl">ICT Zone</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
