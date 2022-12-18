<!DOCTYPE html>
<?php
require_once 'pages/config.php';
require_once 'pages/load.php';
$user = $_SESSION['username'];
if($user==''){
	echo "<script type=\"text/javascript\">alert(\"Anda Tidak Memiliki Hak Bagian!\")</script>";
	header('Location: index1.php');
}else{	
	header('index.php');
} 

?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PerforMAP360 | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
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
      <img width="50px" height="50px" src="dist/img/newtown.png"
           alt="AdminLTE Logo"
           class="brand-image img-square elevation-1">
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
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Anda login sebagai</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?php 
		  $user = $_SESSION['username'];
		  if($user==''){
			  echo "Silahkan Login!";
			  } else {
			  echo $user;
			  } ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="pages/hapus.php" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
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
          <a href="#" class="d-block">
		  <?php 
		  $user = $_SESSION['username'];
		  if($user==''){
			  echo "Silahkan Login!";
			  } else {
			  echo $user;
			  } ?></a>
        </div>
      </div>
		<div>
		<?php
		 if($_SESSION['username']==''){
			   
				
			 } else{
				echo "<a href=\"pages/hapus.php\" class=\"dropdown-item dropdown-footer\">Logout</a>";
			 }
		
		
		?>
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
                <a href="pages/transaksi/t_approval.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Penilaian</p>
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<?php
	$sqla = "select sum(bobot) as bobot from master_bobot where bobot !='0'";
	$result= mysqli_query($conn, $sqla);
	$rowa = mysqli_fetch_assoc($result);
	$bobotpen = $rowa['bobot'];
	
	$sqlb = "select sum(botkri) as bobot from master_kriteria where status='1'";
	$resultb= mysqli_query($conn, $sqlb);
	$rowb = mysqli_fetch_assoc($resultb);
	$bobotkri = $rowb['bobot'];
	
	$sqlb = "select count(kdpenilai)as jumpenilai from master_penilai a where a.kdpenilai in (select kdpenilai from master_bobot where kdpenilai=a.kdpenilai)";
	$resultb= mysqli_query($conn, $sqlb);
	$rowb = mysqli_fetch_assoc($resultb);
	$jumpenilai = $rowb['jumpenilai'];
	
	$sqla = "select count(kdsub) as jumsub from master_subkriteria where status ='1'";
	$resulta= mysqli_query($conn, $sqla);
	$rowb = mysqli_fetch_assoc($resulta);
	$jumsub = $rowb['jumsub'];
	
	
	$periode = date("Y")."-".date("m");
	$rangkingkar=1;
	
		  $nikaryawan=array();
			$skor=array();
			//$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, totalnilai AS skor FROM transaksi_penilaian b where periode='$periode' and status='1' GROUP BY nik ORDER by totalnilai asc";
			$sql1 = "SELECT distinct nik as nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, totalnilai AS skor, max(periode) FROM transaksi_penilaian b where status='1' group by nik ORDER by totalnilai desc";
			$result1 = mysqli_query($conn, $sql1);
			if (mysqli_num_rows($result1) > 0) {
			while($row = mysqli_fetch_assoc($result1)) {
				$nik = $row["nik"];
				$nama = $row["nama"];
				$skortop = $row["skor"];
				
				echo "<input type=\"hidden\" class=\"form-control\" name=\"nikkarTOP[$nik]\" value=\"";
				echo $_SESSION['skorx'][$nik]['nikkar'] = $nama." (".$rangkingkar++.")"; echo "\">";
				$nikarya= $_SESSION['skorx'][$nik]['nikkar'];
				array_push($nikaryawan,"'".$nikarya."'");
				$_SESSION['nikkartopx'] = implode(",",$nikaryawan);
				//=print_r ($nikaryawan);
				
				echo "<input type=\"hidden\" class=\"form-control\" name=\"skorTOP[$nik]\" value=\"";
				echo $_SESSION['skorx'][$nik]['skortop'] = $skortop; echo "\">";
				$skorBIG= $_SESSION['skorx'][$nik]['skortop'];
				array_push($skor,"'".$skorBIG."'");
				$_SESSION['skorkarx'] = implode(",",$skor);
				//print_r ($skor);
			}
												
												
			}	else{
				unset ($_SESSION['skorx']);
				unset ($_SESSION['nikkartopx']);
				unset ($_SESSION['skorkarx']);
			}
			
			$sqla = "select max(distinct periode) as periodeMax FROM transaksi_penilaian";
			$resulta= mysqli_query($conn, $sqla);
			$rowb = mysqli_fetch_assoc($resulta);
			$periodeXZ = $rowb['periodeMax'];
			
			$sqla = "select max(distinct totalnilai) as nilaiA FROM transaksi_penilaian where periode='$periodeXZ'";
			$resulta= mysqli_query($conn, $sqla);
			$rowb = mysqli_fetch_assoc($resulta);
			$nilaiA = $rowb['nilaiA'];
			
			$sqla = "select max(distinct totalnilai) as nilaiB FROM transaksi_penilaian where periode != '$periodeXZ'";
			$resulta= mysqli_query($conn, $sqla);
			$rowb = mysqli_fetch_assoc($resulta);
			$nilaiB = $rowb['nilaiB'];
			
			
			
			$periodeYear = date("Y");
			$nikaryawanY=array();
			$skorY=array();
			$nikaryawanX=array();
			$skorX=array();
			$periodeX=array();
			
			$sqla = "SELECT periode FROM transaksi_penilaian where periode like '%$periodeYear%' and status='1' group by periode";
			$resulta = mysqli_query($conn, $sqla);
			if (mysqli_num_rows($resulta) > 0) {
			while($row1 = mysqli_fetch_assoc($resulta)) {
			$b = $row1["periode"];
			
				
				$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, MAX(totalnilai) AS skor FROM transaksi_penilaian b where periode ='$b' and status='1' GROUP BY periode";
				$result1 = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result1) > 0) {
				while($row = mysqli_fetch_assoc($result1)) {
					$nik = $row["nik"];
					$nama = $row["nama"];
					$skortop = $row["skor"];
					
					$_SESSION['nikkartop'] = "'".$nik." - ".$nama."'";
					
					echo "<input type=\"hidden\" class=\"form-control\" name=\"skorTOP[$nik]\" value=\"";
					echo $_SESSION['skorx'][$nik]['skortop'] = $skortop; echo "\">";
					$skorBIG= $_SESSION['skorx'][$nik]['skortop'];
					array_push($skorY,"'".$skorBIG."'");
					$_SESSION['skorkarY'] = implode(",",$skorY);
					//print_r ($skorY);
				}
				}
				
				$sql2 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, MIN(totalnilai) AS skor FROM transaksi_penilaian b where periode ='$b' and status='1' GROUP BY periode";
				$result2 = mysqli_query($conn, $sql2);
				if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					$nik = $row["nik"];
					$nama = $row["nama"];
					$skortop = $row["skor"];
					
					$_SESSION['nikkartop2'] = "'".$nik." - ".$nama."'";
					
					echo "<input type=\"hidden\" class=\"form-control\" name=\"skorTOP[$nik]\" value=\"";
					echo $_SESSION['skorx'][$nik]['skortop'] = $skortop; echo "\">";
					$skorBIG= $_SESSION['skorx'][$nik]['skortop'];
					array_push($skorX,"'".$skorBIG."'");
					$_SESSION['skorkarX'] = implode(",",$skorX);
					//print_r ($skorX);
				}
				
					
				}
					echo "<input type=\"hidden\" class=\"form-control\" name=\"periodetop[$b]\" value=\"";
					echo $_SESSION['skorx'][$b]['periodetop'] = $b; echo "\">";
					$periodeBIG= $_SESSION['skorx'][$b]['periodetop'];
					array_push($periodeX,"'".$periodeBIG."'");
					$_SESSION['periodetop'] = implode(",",$periodeX);
					//echo $_SESSION['periodetop'];
					//print_r($periodeX);
			}
			}
	?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
	  <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-lightblue">
              <div class="inner">
                <h3><?php echo $bobotkri;?><sup style="font-size: 20px">%</sup></h3>

                <p>Bobot Kriteria Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="pages/master/m_kriteria.php" class="small-box-footer">Ubah<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
                <h3><?php echo $bobotpen;?><sup style="font-size: 20px">%</sup></h3>

                <p>Bobot Penilai Saat Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="pages/master/m_bobot.php" class="small-box-footer">Ubah<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $jumpenilai;?></h3>

                <p>Penilai Terbobot</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="pages/master/m_penilai.php" class="small-box-footer">Ubah<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $jumsub;?></h3>

                <p>Sub Kriteria Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="pages/master/m_subkriteria.php" class="small-box-footer">Ubah<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Nilai Tertinggi dan Terendah Tiap Periode</h3>
                  <a href="pages/laporan/l_penilaian.php">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                  </p>
				  <span class="text-muted">Kenaikan/Penurunan</span>
                  <p class="ml-auto d-flex flex-column text-right">
                   <?php 
				   
				   if ($nilaiA>$nilaiB){?>
				   <span class="text-success">
                      <i class="fas fa-arrow-up"></i> <?php 
					  $naikturun = ($nilaiA-$nilaiB);
					  echo $naikturun ;?>
                    </span>
				   <?php 
				   } else{
					?>
					<span class="text-danger">
                      <i class="fas fa-arrow-down"></i> <?php 
					  $naikturun = ($nilaiB-$nilaiA);
					  echo $naikturun ;?>
                    </span>
					<?php
				   }
					?>
                    <span class="text-muted">Sejak Periode Sebelumnya</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Nilai Tertinggi
                  </span>
				  <span>
                    <i class="fas fa-square text-gray"></i> Nilai Terendah
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Rangking Periode Terbaru</h3>
                  <!-- <a href="pages/transaksi/t_perhitungan.php">Cek Perhitungan</a>-->
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    
                  </p>
                   <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="248"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Nilai Karyawan
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'horizontalBar',
    data   : {
      labels  : [<?php echo $_SESSION['nikkartopx'];?>],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [<?php echo $_SESSION['skorkarx'];?>],
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: true
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : [<?php echo $_SESSION['periodetop'];?>],
      datasets: [{
          type                : 'line',
          data                : [<?php echo $_SESSION['skorkarY'];?>],
          backgroundColor     : 'tansparent',
          borderColor         : '#007bff',
		  pointBorderColor    : '#007bff',
		  pointBackgroundColor: '#007bff',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        },{
        type                : 'line',
        data                : [<?php echo $_SESSION['skorkarX'];?>],
        backgroundColor     : 'transparent',
        borderColor         : '#ced4da',
        pointBorderColor    : '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      }
        ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>
</body>
</html>
