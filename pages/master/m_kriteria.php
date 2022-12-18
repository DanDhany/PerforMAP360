<!DOCTYPE html>
<?php
INCLUDE '../config.php';
require_once '../load.php';

$jabatan = $_SESSION['jabatan'];
$sqlc = "select count(*)as jum from master_jabatan where namjab='$jabatan' and akses='Manajer' or namjab='$jabatan' and akses='Administrasi'";
$resulta= mysqli_query($conn, $sqlc);
$rowcek = mysqli_fetch_assoc($resulta);
if ($rowcek['jum']!=0){
	
}else{
	echo "<script>alert(\"Anda Tidak Memiliki Hak Bagian!\")</script>";
	header('Location: ../../index.php');	
} 
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PerforMAP360 | Master Kriteria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
    $('#hak').select2({
		placeholder:"Pilih Bagian"
	})
	
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
      <a href="../../index.php">
      <img width="50px" height="50px" src="../../dist/img/newtown.png"
           alt="AdminLTE Logo"
           class="brand-image img-square elevation-1">
	  </a>
	  <li class="nav-item d-none d-sm-inline-block">
        
		<h5><a href="../../index.php" class="nav-link">PT SYAHID HUSADA DEWATA</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->
<?php require_once '../sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Kriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Master Kriteria</li>
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
              <div class="card-header">
                <h3 class="card-title">Form Kriteria</h3>
			  <div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
             </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
		
								<?php

if(isset($_POST['updatestat'])){
	if($_POST['datstatus'] == '1'){
		$a = $_POST['datkdkri'];
		$sql1 = "update master_kriteria set status='0' where kdkri='$a'";
		mysqli_query($conn, $sql1);
		$sqlc = "select count(*)as cek from master_kriteria";
		$result1= mysqli_query($conn, $sqlc);
		$row = mysqli_fetch_assoc($result1);	
			if ($row['cek'] != '0'){
				echo "<script>toastr.success(\"Ubah status berhasil!\")</script>";
			}else{
				echo "<script>toastr.error(\"Ubah status gagal!\")</script>";
			}
	} else if($_POST['datstatus'] == '0'){
		$sqla = "select sum(botkri) as bobot from master_kriteria where status=1";
		$result= mysqli_query($conn, $sqla);
		$rowa = mysqli_fetch_assoc($result);
			if ($rowa['bobot']+$_POST['datbotkri'] >= 101){
				echo "<script>toastr.error(\"Total Bobot Aktif Melebihi 100%!\")</script>";
			} else {
			if ($_POST['datbotkri'] == '0'){
				echo "<script>toastr.error(\"Kriteria Memiliki Bobot 0%!\")</script>";
			} else{				
			$a = $_POST['datkdkri'];
			$sql1 = "update master_kriteria set status='1' where kdkri='$a'";
			mysqli_query($conn, $sql1);
			$sqlc = "select count(*)as cek from master_kriteria";
			$result1= mysqli_query($conn, $sqlc);
			$row = mysqli_fetch_assoc($result1);	
				if ($row['cek'] != '0'){
					echo "<script>toastr.success(\"Ubah status berhasil!\")</script>";
				}else{
					echo "<script>toastr.error(\"Ubah status gagal!\")</script>";
				}
			}
		}
	}
}
	
if(isset($_POST['submit'])){
if($_POST['status'] == '1'){
$sqla = "select sum(botkri) as bobot from master_kriteria where status=1";
$result= mysqli_query($conn, $sqla);
$rowa = mysqli_fetch_assoc($result);
if ($rowa['bobot']+$_POST['botkri'] >= 101){
	echo "<script>toastr.error(\"Total Bobot Aktif Melebihi 100!\")</script>";
}else{
	$a = $_POST['kdkri']; 
	$b = ucwords(strtolower($_POST['namkri']));
	$c = $_POST['ketkri'];
	$d = $_POST['botkri'];
	$e = $_POST['status'];
$sqlb = "select count(*) as cek from master_kriteria where kdkri='$a'";
$result= mysqli_query($conn, $sqlb);
$row = mysqli_fetch_assoc($result);

if ($row['cek'] == '0'){
	
	$sql = "INSERT INTO master_kriteria
	VALUES ('$a', '$b', '$c', '$d', '$e' )";
	mysqli_query($conn, $sql);
	echo "<script>toastr.success(\"Input data berhasil!\")</script>";
	
}else {
	echo "<script>toastr.error(\"Input data gagal!\")</script>";
}}
}else{
	$a = $_POST['kdkri']; 
	$b = ucwords(strtolower($_POST['namkri']));
	$c = $_POST['ketkri'];
	$d = $_POST['botkri'];
	$e = $_POST['status'];
$sqlb = "select count(*) as cek from master_kriteria where kdkri='$a'";
$result= mysqli_query($conn, $sqlb);
$row = mysqli_fetch_assoc($result);

if ($row['cek'] == '0'){
	
	$sql = "INSERT INTO master_kriteria
	VALUES ('$a', '$b', '$c', '$d', '$e' )";
	mysqli_query($conn, $sql);
	echo "<script>toastr.success(\"Input data berhasil!\")</script>";
	
}else {
	echo "<script>toastr.error(\"Input data gagal!\")</script>";
}
}}						


if(isset($_POST['delete'])){
	$a = $_POST['datkdkri'];
	
$sql1 = "Delete from master_kriteria where kdkri='$a'";
mysqli_query($conn, $sql1);
$sqlc = "select count(*)as cek from master_kriteria";
$result1= mysqli_query($conn, $sqlc);
$row = mysqli_fetch_assoc($result1);	
if ($row['cek'] != '0'){
	echo "<script>toastr.success(\"Hapus data berhasil!\")</script>";
}else{
	echo "<script>toastr.error(\"Hapus data gagal!\")</script>";
}
}

if(isset($_POST['submitupdate'])){
	$a = $_POST['kdkri'];
	$b = ucwords(strtolower($_POST['namkri']));
	$c = $_POST['ketkri'];
	$d = $_POST['botkri'];
	$e = $_POST['status'];
	if ($e=='1'){
		$sqla = "select sum(botkri) as bobot from master_kriteria where status=1";
		$result= mysqli_query($conn, $sqla);
		$rowa = mysqli_fetch_assoc($result);
		if ($rowa['bobot']+$_POST['botkri'] >= 101){
			echo "<script>toastr.error(\"Total Bobot Aktif Melebihi 100!\")</script>";
		}	else{
			$sql2 = "update master_kriteria
			set namkri='$b', ketkri='$c', botkri='$d', status='$e' where kdkri='$a'";
			mysqli_query($conn, $sql2);
			$sqlc = "select count(*)as cek from master_kriteria";
			$result1= mysqli_query($conn, $sqlc);
			$row = mysqli_fetch_assoc($result1);	
			if ($row['cek'] == '0'){
				echo "<script>toastr.error(\"Ubah data gagal!\")</script>";
			}else{
				echo "<script>toastr.success(\"Ubah data berhasil!\")</script>";
			}
		}
	} else{
		$sql2 = "update master_kriteria
			set namkri='$b', ketkri='$c', botkri='$d', status='$e' where kdkri='$a'";
			mysqli_query($conn, $sql2);
			$sqlc = "select count(*)as cek from master_kriteria";
			$result1= mysqli_query($conn, $sqlc);
			$row = mysqli_fetch_assoc($result1);	
			if ($row['cek'] == '0'){
				echo "<script>toastr.error(\"Ubah data gagal!\")</script>";
			}else{
				echo "<script>toastr.success(\"Ubah data berhasil!\")</script>";
			}
	}
}


if(isset($_POST['update'])){
	$a1 = $_POST['datkdkri'];
	$b1 = $_POST['datnamkri'];
	$c1 = $_POST['datketkri'];
	$d1 = $_POST['datbotkri'];
	$e1 = $_POST['datstatus'];
	
?>	
									<form role="form" action="" method="POST">

										<div class="form-group">
                                            <label>Kode Kriteria</label>
                                            <input class="form-control" name="kdkri" value="<?php echo $a1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input class="form-control" name="namkri" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Keterangan Kriteria</label>
                                            <input class="form-control" name="ketkri" value="<?php echo $c1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Bobot Kriteria (%)</label>
                                            <input type="number" class="form-control" name="botkri" value="<?php echo $d1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Status</label>
											<input type="radio" name="status" value="1" <?php if($e1=="1"){echo "checked";}?>> Aktif <input type="radio" name="status" value="0" <?php if($e1=="0"){echo "checked";}?>> Tidak Aktif
                                        </div>
										<div class="form-group">
                                            <label><span style="color:green">Total Bobot Aktif Saat Ini = 
											<?php
											$sql1 = "SELECT sum(botkri) as bobot from master_kriteria where status = 1";
											$result1 = mysqli_query($conn, $sql1);
											while($rows = mysqli_fetch_assoc($result1))
											{
												 echo $rows['bobot']." %";
											}
											?>
											</span></label>
                                        </div>
									
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <a href="" class="btn btn-primary">Reset</a>
										</br></br>
										<label><span style="color:red">Keterangan: Total Bobot Aktif Harus 100 %</span></label>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Kode Kriteria</label>
                                            <input class="form-control" name="kdkri" placeholder="Masukkan Kode Kriteria" required>
                                        </div>
										<div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input class="form-control" name="namkri" placeholder="Masukkan Nama Kriteria" required>
                                        </div>
										<div class="form-group">
                                            <label>Keterangan Kriteria</label>
                                            <input class="form-control" name="ketkri" placeholder="Masukkan Keterangan Kriteria" required>
                                        </div>
										<div class="form-group">
                                            <label>Bobot Kriteria (%)</label>
                                            <input type="number" class="form-control" name="botkri" placeholder="Masukkan Bobot Kriteria" required>
                                        </div>
										<div class="form-group">
                                            <label>Status</label>
											</br><input type="radio" name="status" value="1"> Aktif <input type="radio" name="status" value="0"> Tidak Aktif
                                        </div>
										<div class="form-group">
                                            <label><span style="color:green">Total Bobot Aktif Saat Ini = 
											<?php
											$sql1 = "SELECT sum(botkri) as bobot from master_kriteria where status = 1";
											$result1 = mysqli_query($conn, $sql1);
											while($rows = mysqli_fetch_assoc($result1))
											{
												 echo $rows['bobot']." %";
											}
											?>
											</span></label>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
										</br></br>
										<label><span style="color:red">Keterangan: Total Bobot Aktif Harus 100 %</span></label>
                                    </form>
									<?php
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
            
           
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Daftar Kriteria</h3>
				<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
                <table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kode Kriteria</th>
                                        <th style="text-align:center">Nama Kriteria</th>
                                        <th style="text-align:center">Keterangan</th>
                                        <th style="text-align:center">Bobot(%)</th>
                                        <th style="text-align:center">Status</th>
										<th style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT * from master_kriteria";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkdkri\" value=\"";
										echo $row["kdkri"]; echo "\">";echo $row["kdkri"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datnamkri\" value=\"";
										echo $row["namkri"];echo "\">";echo $row["namkri"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datketkri\" value=\"";
										echo $row["ketkri"];echo "\">";echo $row["ketkri"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datbotkri\" value=\"";
										echo $row["botkri"];echo "\">";echo $row["botkri"];
										echo "</td>";
										echo "<td align=\"center\"><input type=\"hidden\" class=\"form-control\" name=\"datstatus\" value=\"";
										echo $row["status"]; echo "\">"; if ($row["status"] == "1"){echo "Aktif";} else echo "Tidak Aktif";
										echo "</br><input class=\"btn btn-warning\" type=\"submit\" name=\"updatestat\" value=\"Ubah\"> </td>";
										echo "<td align=\"center\"><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Ubah Data\"> ";
										echo "</br><input class=\"btn btn-danger\"type=\"submit\" name=\"delete\" value=\"Hapus Data\"></td>";
										echo "</form></tr>";
									}
								} else {
									echo "0 results";
								}
								echo "</tbody></table>";
								mysqli_close($conn);

								?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
