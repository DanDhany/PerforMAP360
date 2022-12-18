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
  <title>PerforMAP360 | Master Bobot</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
    $('#kriteria').select2()
    $('#penilai').select2()
	
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
            <h1>Master Bobot</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Master Bobot</li>
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
                <h3 class="card-title">Form Pengaturan Bobot</h3>
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

	
if(isset($_POST['submit'])){
$a = $_POST['kdbobot']; 
$b = $_POST['kriteria']; 
$c = $_POST['penilai'];
$d = $_POST['bobot'];
//$e = $_POST['jenisbot'];
$sqla = "select sum(bobot) as bobot from master_bobot";
$result= mysqli_query($conn, $sqla);
$rowa = mysqli_fetch_assoc($result);
	if ($rowa['bobot'] >= 101){
	echo "<script>toastr.error(\"Total Bobot Sudah Mencapai 100%!\")</script>";
	} else {
	$sqla = "select count(*) as cek from master_bobot where kdbobot='$a'";
	$result= mysqli_query($conn, $sqla);
	$row = mysqli_fetch_assoc($result);
		if ($row['cek'] == '0'){
			$sqlb = "select count(*) as cek2 from master_bobot where kdkri='$b' and kdpenilai='$c'";
			$result= mysqli_query($conn, $sqlb);
			$row = mysqli_fetch_assoc($result);
			if ($row['cek2'] == '0'){
				$sql = "INSERT INTO master_bobot
				VALUES ('$a', '$b', '$c', '$d')";
				mysqli_query($conn, $sql);
				echo "<script>toastr.success(\"Input data berhasil!\")</script>";
			}else {
			echo "<script>toastr.error(\"Bobot penilai sudah tersedia!\")</script>";
			}
		}else {
			echo "<script>toastr.error(\"Gunakan kode bobot baru!\")</script>";
		}
	}
}						


if(isset($_POST['delete'])){
	$a = $_POST['datkdbobot'];
		
$sql1 = "Delete from master_bobot where kdbobot='$a'";
mysqli_query($conn, $sql1);
$sqlc = "select count(*)as cek from master_bobot";
$result1= mysqli_query($conn, $sqlc);
$row = mysqli_fetch_assoc($result1);	
if ($row['cek'] != '0'){
	echo "<script>toastr.success(\"Hapus data berhasil!\")</script>";
}else{
	echo "<script>toastr.error(\"Hapus data gagal!\")</script>";
}
}

if(isset($_POST['submitupdate'])){
	$a = $_POST['kdbobot']; 
	$b = $_POST['bobot'];
	//$c = $_POST['jenisbot'];
$sqla = "select sum(bobot) as bobot from master_bobot";
$result= mysqli_query($conn, $sqla);
$rowa = mysqli_fetch_assoc($result);
	if ($rowa['bobot'] + $_POST['bobot']>= 101){
	echo "<script>toastr.error(\"Hasil Total Bobot Melebihi 100%!\")</script>";
	} else{	
	$sql2 = "update master_bobot
	set bobot='$b' where kdbobot='$a'";
	mysqli_query($conn, $sql2);
	$sqlc = "select count(*)as cek from master_bobot";
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
	$a1 = $_POST['datkdbobot'];
	$b1 = $_POST['datkri1'];
	$c1 = $_POST['datrole1'];
	$d1 = $_POST['datbobot'];
	//$e1 = $_POST['datjenisbot'];
	
?>	
									<form role="form" action="" method="POST">
										<div class="form-group">
                                            <label>Kode Bobot</label>
                                            <input class="form-control" name="kdbobot" value="<?php echo $a1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Kriteria</label>
                                            <input class="form-control" name="kdkri" value="<?php echo $b1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Role Penilai</label>
                                            <input class="form-control" name="kdpenilai" value="<?php echo $c1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Bobot Penilai (Dalam Persen)</label>
                                            <input class="form-control" name="bobot" value="<?php echo $d1; ?>" required>
                                        </div>
										<!--<div class="form-group">
                                            <label>Jenis Bobot Penilai</label>
											<input type="radio" name="jenisbot" value="ALL" <?php if($e1=="ALL"){echo "checked";}?>> ALL - Semua 
											<input type="radio" name="jenisbot" value="IN" <?php if($e1=="IN"){echo "checked";}?>> IN - Internal
											<input type="radio" name="jenisbot" value="EX" <?php if($e1=="EX"){echo "checked";}?>> EX - External/Tambahan
                                        </div>-->
										<button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <a href="" class="btn btn-primary">Reset</a>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Kode Bobot</label>
											<?php
											$sqla = "select max(kdbobot) as cek from master_bobot";
											$result= mysqli_query($conn, $sqla);
											$row = mysqli_fetch_assoc($result);
											$value=$row['cek']+1;
											?>
                                            <input class="form-control" name="kdbobot" value="<?php echo $value; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Kriteria</label>
                                            <select class="form-control select2" name="kriteria" id="kriteria" onchange="detailKri(this.value)" required>
											
											<?php
											$query = "select * from master_kriteria where status='1'";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['kdkri']."'>".$data1['kdkri']." ".$data1['namkri']."</option>";
											}
											?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Role Penilai</label>
                                            <select class="form-control select2" name="penilai" id="penilai" onchange="detailPen(this.value)" required>
											
											<?php
											$query = "select * from master_penilai";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['kdpenilai']."'>".$data1['rolepenilai']." - ".$data1['ketrole']."</option>";
											}
											?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Bobot Penilai (Dalam Persen)</label>
                                            <input class="form-control" name="bobot" required>
                                        </div>
										<!--<div class="form-group">
                                            <label>Jenis Bobot Penilai</label>
											<input type="radio" name="jenisbot" value="ALL"> ALL - Semua 
											<input type="radio" name="jenisbot" value="IN"> IN - Internal
											<input type="radio" name="jenisbot" value="EX"> EX - External/Tambahan
                                        </div>-->
										<div class="form-group">
                                            <label><span style="color:green">Total Bobot Penilai Saat Ini = 
											<?php
											$sql1 = "SELECT sum(bobot) as bobot from master_bobot";
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
										<label><span style="color:red">Keterangan: Total Bobot Penilai Harus 100 %</span></label>
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
                <h3 class="card-title">Daftar Bobot Penilai</h3>
				<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
                <table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kode Bobot</th>
                                        <th style="text-align:center">Kriteria</th>
                                        <th style="text-align:center">Role Penilai</th>
                                        <th style="text-align:center">Bobot Penilai</th>
                                        <!--<th style="text-align:center">Jenis Bobot</th>-->
                                        <th style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "select a.kdbobot, a.kdkri, (select b.namkri from master_kriteria b where b.kdkri=a.kdkri) as namkri, a.kdpenilai, 
								(select c.rolepenilai as role from master_penilai c where c.kdpenilai = a.kdpenilai) as role, a.bobot from master_bobot a";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkdbobot\" value=\"";
										echo $row["kdbobot"]; echo "\">";echo $row["kdbobot"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkri\" value=\"";
										echo $row["kdkri"];echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"datkri1\" value=\"";
										echo $row["namkri"];echo "\">";echo $row["kdkri"]." - ".$row["namkri"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datrole\" value=\"";
										echo $row["kdpenilai"];echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"datrole1\" value=\"";
										echo $row["role"];echo "\">";echo $row["role"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datbobot\" value=\"";
										echo $row["bobot"];echo "\">";echo $row["bobot"];
										echo "</td>";
										/* echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datjenisbot\" value=\"";
										echo $row["jenis_bobot"];echo "\">";echo $row["jenis_bobot"];
										echo "</td>"; */
										echo "<td align=\"center\"><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Ubah Data\"> ";
										echo "<input class=\"btn btn-danger\"type=\"submit\" name=\"delete\" value=\"Hapus Data\"></td>";
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
