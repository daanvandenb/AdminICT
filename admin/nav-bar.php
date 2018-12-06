<?php
include('session.php');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

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

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-success">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-success">
      <img src="dist/img/AdminLTELogo.png" alt="ICT Zone Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ICT Zone</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?php echo ucfirst($_SESSION['login_user']);?> </a>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         

		 <li class="nav-item has-treeview menu-open">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Overzicht
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/tables/opdrachten.php" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Opdrachten
                <span class="right badge badge-success"><?php echo $weergeef;?></span>
              </p>
            </a>
          </li>
		  
          <li class="nav-item has-treeview">
            <a href="pages/mailbox/klanten.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Klanten
             
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-check"></i>
              <p>
                Beschikbaarheid
               
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="pages/mailbox/mailbox.php" class="nav-link">
              <i class="nav-icon fa fa-bell"></i>
              <p>
                Berichten
                 <span class="badge badge-info right"><?php echo $berichtje;?></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="pages/mailbox/instellingen.php" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Instellingen
             
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/mailbox/werknemers.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Werknemers
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Uitloggen
               
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>