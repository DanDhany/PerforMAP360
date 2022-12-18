<!DOCTYPE html>
<?php
INCLUDE '../config.php';

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PerforMAP360 | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once '../load.php';?>
<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
	
	$("#bagianlist").DataTable({
      "responsive": true,
      "autoWidth": true
    });
  });
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->
  
  <aside class="main-sidebar sidebar-light-olive elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
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
          <img src="../../dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
		 Silahkan Login
		  
        </div>
		
		
      </div>
          
		<div class="dropdown-divider"></div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../../pages/index/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
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
                <a href="../../pages/master/m_karyawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/master/m_bagian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/master/m_jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Jabatan</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_kriteria.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Kriteria</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_subkriteria.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Sub Kriteria</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_bobot.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bobot</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_penilai.php" class="nav-link">
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
                <a href="../../pages/transaksi/t_pengukuran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengukuran Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/transaksi/t_perhitungan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perhitungan Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/transaksi/t_approval.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Penilaian</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-header">Laporan</li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan Kinerja
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../pages/laporan/l_penilaian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penilaian Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/laporan/l_perangkingan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perangkingan Karyawan</p>
                </a>
              </li>
            </ul>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Selamat Datang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Login</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
								<h1 class="panel-header">PerforMAP360</h1>
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
						`		<?php
								
								if(isset($_POST['login'])){
								$username = $_POST['username'];
								$password = $_POST['password'];
								$query = "select * from master_karyawan where NIK='$username' and Password='$password'";
								$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result)==1){
										while($row = mysqli_fetch_array($result)){
										$_SESSION['username']=$row['Nama_Lengkap'];
										//$_SESSION['nik']=$username;
										//$bagian = substr($username,0,2);
										//$_SESSION['Bagian']=$bagian;
										$_SESSION['jabatan'] = $row['Jabatan'];
										}
										echo '<script>window.location.href = "index.php";</script>';
									}else{
										echo "<script>toastr.error(\"Silahkan Login Untuk Mengakses!\")</script>";
										echo '<script>window.location.href = "login.php";</script>';
									}
								}
								
								?>
									
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
  <!--<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
