<!DOCTYPE html>
<?php
INCLUDE '../config.php';
session_start();

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PerforMAP360 | Pengukuran Kinerja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once '../load.php';?>
<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
    $('#karyawan').select2({
		placeholder:"Pilih Bagian"
	})
	$('#penilai').select2({
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php require_once '../sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengukuran Kinerja</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Pengukuran Kinerja</li>
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
                <h3 class="card-title">Pengukuran Kinerja</h3>
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
if(isset($_POST['simpan'])){
$x=$_SESSION["tgl"];
$_SESSION["data"][$x]["kode"]= $_SESSION["penilai"];
$_SESSION["data"][$x]["nama"]= $_SESSION["karyawan"];
$_SESSION["data"][$x]["nama"]=  $_SESSION["tgl"];
foreach($_SESSION["data"] as $yy => $yy_value)
{
$karIN = $_SESSION["data"][$yy]["karyawan"];
$tglIN = $_SESSION["data"][$yy]["tgl"];
$penilaiIN = $_SESSION["data"][$yy]["penilai"];
$subkrIN = $_SESSION["data"][$yy]["subkri"];
$nilaIN = $_SESSION["data"][$yy]["nilai"];
$sqld = "INSERT INTO detail_nilai ('$karIN','$tglIN','$penilaiIN','$subkrIN','$nilaIN')" ;
mysqli_query($conn, $sqld);
}	
	
}
else if(isset($_POST['mulai'])){
$penilai = $_SESSION["penilai"] = $_POST['penilai'];
$karyawan = $_SESSION["karyawan"] = $_POST['karyawan'];
$tgl = $_SESSION["tgl"] = $_POST['tgl'];

?>
<table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kriteria</th>
                                        <th style="text-align:center width:60%">Sub Kriteria</th>
                                        <th style="text-align:center" colspan=5>Nilai</th>
										</tr>
                                </thead>
								<tbody>
								<?php

						
								$sql1 = "SELECT kdkri, (SELECT a.namkri from master_kriteria a where a.kdkri=b.kdkri) as namakri, kdsub ,`ketsub` FROM `master_subkriteria` b WHERE kdkri in (SELECT kdkri from master_bobot WHERE kdpenilai='$penilai')";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkriteria\" value=\"";
										echo $row["kdkri"]; echo "\">";echo $row["namakri"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkdsub\" value=\"";
										echo $_SESSION["data"]["subkri"] = $row["kdsub"];
										echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"datketsub\" value=\"";
										echo $row["ketsub"];echo "\">";echo $row["ketsub"];
										echo "</td>";
										echo "<td align=\"center\"><input  type=\"radio\" name=\"nilai\" value=\"1\"> 1";echo "</td>";
										echo "<td align=\"center\"><input  type=\"radio\" name=\"nilai\" value=\"2\"> 2";echo "</td>";
										echo "<td align=\"center\"><input  type=\"radio\" name=\"nilai\" value=\"3\"> 3";echo "</td>";
										echo "<td align=\"center\"><input  type=\"radio\" name=\"nilai\" value=\"4\"> 4";echo "</td>";
										echo "<td align=\"center\"><input  type=\"radio\" name=\"nilai\" value=\"5\"> 5";
										echo "</td>";
										echo "</form></tr>";
									}
								} else {
									echo "0 results";
								}
								echo "</tbody></table>";
								mysqli_close($conn);
								echo "<form action=\"\" method=\"POST\"><button type=\"submit\" name=\"simpan\" class=\"btn btn-success\">Simpan</button></form>";


}else{
?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
										<label>Pilih Karyawan</label>
											<select class="form-control select2" name="karyawan" id="karyawan" onchange="detailKar(this.value)" required>
											
											<?php
											$query = "select nik, nama_lengkap, bagian from master_karyawan";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['nik']."'>".$data1['nik']." - ".$data1['nama_lengkap']." [".$data1['bagian']."] </option>";
											}
											?>
											</select>
											
										</div>
										<div class="form-group">
                                            <label>Pilih Penilai</label>
                                            <select class="form-control select2" name="penilai" id="penilai" onchange="detailKar(this.value)" required>
											
											<?php
											$query = "select * from master_penilai";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['kdpenilai']."'>".$data1['rolepenilai']." - ".$data1['ketrole'];"</option>";
											}
											?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Penilaian</label>
                                            <input type="date" class="form-control" name="tgl" required>
                                        </div>
										<button type="submit" name="mulai" class="btn btn-success">Simpan</button>
                                        <a href="" class="btn btn-primary">Reset</a>
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
