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

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Vragen & Opmerkingen</h3>
				<!--
              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Zoek bericht">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fa fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
               /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
               
                <div class="btn-group">
				<button href="#" type="button" onClick="setDaanAction();" class="btn btn-default btn-sm">Bekijken</button>
                <button href="#" type="button" onClick="setDeleteAction();" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  
                </div>
               
               <script>
			
			function setDeleteAction() {
			if(confirm("Weet je zeker dat je deze vraag/opmerking wilt verwijderen?")) {
			document.frmUser.action = "delete-f.php";
			document.frmUser.submit();
			}
			}
			
			function setDaanAction() {
			document.frmUser.action = "weergeven-v.php";
			document.frmUser.submit();
			}
			
		
		</script>
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
               
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
				  <form name="frmUser" method="post" action="">
				  <?php
                    $result = mysqli_query($db,"SELECT * FROM feedback");
					$i=0;
					while($row = mysqli_fetch_array($result)) {

					if($i%2==0)
					$classname="evenRow";
					else
					$classname="oddRow";
					?>
					
                  <tr class="<?php if(isset($classname)) echo $classname;?>">
                    <td><input type="radio" name="users[]" value="<?php echo $row["id"]; ?>" ></td>
					
                    
                    <td class="mailbox-name"><b>Naam: </b><?php echo $row["naam"]; ?></td>
                    <td class="mailbox-subject"><b><?php echo $row["optie"]; ?></b>
                    </td>
                    <td class="mailbox-attachment"><?php echo $row["email"]; ?></td>
					
					
					
                    <td class="mailbox-date"><b>Datum: </b>
					<?php 
					$date=date_create($row['datum']);
					echo date_format($date, "d/m/Y H:i ");?></td>
                  </tr>
				  <?php
					$i++;
					}
					?>
				  
                  </tbody>
                </table>
				</form>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
              
            </div>
          </div>
          <!-- /. box -->
        </div>
		
		
		          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Recenties</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Zoek bericht">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fa fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
                <div class="btn-group">
                <button href="#" type="button" onClick="" class="btn btn-default btn-sm">Bekijken</button>
                <button href="#" type="button" onClick="" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
               
                <!-- /.float-right -->
              </div>
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                    <td><input type="radio"></td>
            
                    <td class="mailbox-name"><b>Meneer Havermout</b></a></td>
                    <td class="mailbox-subject">Oude stratenweg 320 6528 KD Nijmegen
                    </td>
                 
                    <td class="mailbox-date">daan_vandenbos@hotmail.com</td>
					   <td class="mailbox-attachment">06-39203923</td>
                  </tr>
              
              
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
              
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
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
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    })

    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').iCheck('uncheck')
        $('.fa', this).removeClass('fa-check-square-o').addClass('fa-square-o')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').iCheck('check')
        $('.fa', this).removeClass('fa-square-o').addClass('fa-check-square-o')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
