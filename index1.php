<?php
								include 'pages/config.php';
								
								?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PerforMAP360 | Login</title>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
	  <a href="index.php">
	  <img width="50px" height="50px" src="dist/img/newtown.png">
	  </a>
      <li class="nav-item d-none d-sm-inline-block">
        <h5><a href="index.php" class="nav-link">PT SYAHID HUSADA DEWATA</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <!--<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge">*</span>
        </a>
		<form role="form" action="" method="post">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
		  <a class="dropdown-item">
            <span class="dropdown-item dropdown-header">Silahkan login untuk memulai!</span>
          </a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <input class="form-control" placeholder="Masukkan Nomor Induk Karyawan(NIK)" name="username" type="text" autofocus>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <input class="form-control" placeholder="Masukkan Password" name="password" type="password" value="">
          </a>
          <div class="dropdown-divider"></div>
		  <input type="submit" name="login" class="dropdown-item dropdown-footer" value="Login">
        </div>
		<?php
								
								if(isset($_POST['login'])){
								$username = $_POST['username'];
								$password = $_POST['password'];
								$query = "select * from master_karyawan where NIK='$username' and Password='$password'";
								$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result)==1){
										while($row = mysqli_fetch_array($result)){
										$_SESSION['username']=$row['Nama_Lengkap'];
										$_SESSION['nik']=$username;
										//$bagian = substr($username,0,2);
										//$_SESSION['Bagian']=$bagian;
										$_SESSION['jabatan'] = $row['Jabatan'];
										}
										echo "<script>alert(\"NIK atau Password anda Salah!\")</script>";
										header('Location: index.php');
									}else{
										echo "<script>alert(\"Silahkan Login Untuk Mengakses!\")</script>";
										header('Location: index1.php');
									}
								}
								
							?>
		</form>
							
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-olive elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PerforMAP360</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Silahkan Login</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Login
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kelola Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/master/m_karyawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/master/m_bagian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/master/m_jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Jabatan</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="pages/master/m_kriteria.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Kriteria</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="pages/master/m_subkriteria.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Sub Kriteria</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="pages/master/m_bobot.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bobot</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="pages/master/m_penilai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Penilai</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-header">Form Kinerja</li> -->
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Penilaian Kinerja
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/transaksi/t_pengukuran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengukuran Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/transaksi/t_perhitungan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perhitungan Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/transaksi/t_datakinerja.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kinerja</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-header">Laporan</li> -->
          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan Kinerja
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/laporan/l_penilaian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penilaian Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/laporan/l_perangkingan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perangkingan Karyawan</p>
                </a>
              </li>
            </ul>
          </li>-->
		  <li class="nav-item">
            <a href="pages/laporan/l_penilaian.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan Kinerja
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Login</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Login</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                            <div class="row">
                                <div class="col-md-12"  align="center">
								<h4 class="panel-header">PerforMAP360</h1>
								<h1 style="text-align:center">
								<img width="60px" height="60px" src="dist/img/newtown.png"
								alt="AdminLTE Logo"
								class="brand-image img-square">PT SYAHID HUSADA DEWATA
								<h3 class="panel-title">Silahkan Login</h3>
				
                                    <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Masukkan Nomor Induk Karyawan(NIK)" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Masukkan Password" name="password" type="password" value="">
                                </div>
								<!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Login">
                                
                                
                            </fieldset>
                        </form>
								
									
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                <!-- /.card-body -->
            
           
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

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
    <strong>Copyright &copy; 2020 <a href="">Ramadhany Krismaliq Sjamdra</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.7.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


</body>
</html>
