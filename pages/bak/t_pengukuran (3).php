<!DOCTYPE html>
<?php

INCLUDE '../config.php';

$nik='A';
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
		placeholder:"Pilih Karyawan"
	})
	$('#penilai').select2({
		placeholder:"Pilih Role Penilai"
	})
	
	$("#bagianlist").DataTable({
      "responsive": true,
      "autoWidth": true
    });
	$('#datetimepicker11').datetimepicker({
                viewMode: 'years',
                format: 'MM-YYYY'
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
if(isset($_POST['mulai'])){
$nikpenilai = $_SESSION['nik'];
$penilai = $_SESSION["penilai"] = $_POST['penilai'];
$karyawan = $_SESSION["karyawan"] = $_POST['karyawan'];
$periode = $_SESSION["periode"] = $_POST['periode'];

	//$sqlb = "select count(kdnilai) as cek from transaksi_penilaian where nik='$karyawan' and periode='$periode' and nikpenilai ='$nikpenilai'";
	$sqlb = "select count(kdnilai) as cek from transaksi_penilaian where 
	nik='$karyawan' and periode='$periode' and kdpenilai='$penilai' and status='' or
	nik='$karyawan' and periode='$periode' and kdpenilai='$penilai' and status='1'";
	$result= mysqli_query($conn, $sqlb);
	$rowb = mysqli_fetch_assoc($result);
	if($rowb['cek'] != '0'){
		echo "<script>alert(\"Data penilaian periode dengan peran penilai yang dipilih sudah diapprove atau sedang menunggu approval! Jika ingin melakukan perubahan, silahkan ubah status penilaian sebelumnya!\")</script>";
		echo '<script>window.location.href = "t_pengukuran.php";</script>';
	} else{
		$sqlb = "select count(kdnilai) as cek from transaksi_penilaian where 
		nik='$karyawan' and periode='$periode' and nikpenilai ='$nikpenilai' and status='' or
		nik='$karyawan' and periode='$periode' and nikpenilai ='$nikpenilai' and status='1'";
		$result= mysqli_query($conn, $sqlb);
		$rowb = mysqli_fetch_assoc($result);
		if($rowb['cek'] != '0'){
			echo "<script>alert(\"Data penilaian periode ini sudah anda input!\")</script>";
			echo '<script>window.location.href = "t_pengukuran.php";</script>';
		} else{
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

								$sql1 = "SELECT kdkri, (SELECT a.namkri from master_kriteria a where a.kdkri=b.kdkri) as namakri, kdsub ,`ketsub` FROM `master_subkriteria` b WHERE kdkri in (SELECT kdkri from master_bobot WHERE kdpenilai='$penilai') and status='1' order by kdkri asc";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										$x = $row["kdsub"];
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkriteria\" value=\"";
										echo $_SESSION["data"][$x]["kdkri"]=$row["kdkri"]; echo "\">";echo $row["namakri"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkdsub\" value=\"";
										echo $_SESSION["data"][$x]["kdsub"]=$row["kdsub"];echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"datketsub\" value=\"";
										echo $row["ketsub"];echo "\">";echo $row["ketsub"];
										echo "</td>";
										echo "<td align=\"center\"><select class=\"form-control\" name=\"rating[$x]\" id=\"rating[$x]\" required>";
										echo "<option value='0'></option>";
											
											$query = "select rating, ketrating from master_rating";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['rating']."'>".$data1['rating']." - ".$data1['ketrating']."</option>";
											}
											echo "</select>";
										/* if (!empty($_POST["rating"])) {
											$_SESSION["data"][$x]["rating"] = $_POST["rating"];
										} else{
											$_SESSION["data"][$x]["rating"] = "0";
										} */
										echo "</td>";
										echo "</tr>";
									}
								} else {
									echo "0 results";
								}
								echo "</tbody></table>";
								mysqli_close($conn);
								echo "<button type=\"submit\" name=\"simpan\" class=\"btn btn-success\">Simpan</button></form>";
	}
	}
}
else if(isset($_POST['simpan'])){
$penilai = $_SESSION["penilai"];
$karyawan = $_SESSION["karyawan"];
$periode = $_SESSION["periode"];
$tgl = date("Y-m-d");
$nikpenilai = $_SESSION['nik'];

$sqla = "select max(kdnilai) as cek from transaksi_penilaian";
$result= mysqli_query($conn, $sqla);
$row = mysqli_fetch_assoc($result);
if ($row['cek'] == ''){
	$kdnilai = $_SESSION["kdpenilai"] = '1';
	$sqld = "INSERT INTO transaksi_penilaian VALUES('$kdnilai','$karyawan','$periode','$penilai','$tgl','$nikpenilai','','0')" ;
	mysqli_query($conn, $sqld);
} else{
	$kdnilai = $_SESSION["kdpenilai"] = $row['cek']+1;
	$sqld = "INSERT INTO transaksi_penilaian VALUES('$kdnilai','$karyawan','$periode','$penilai','$tgl','$nikpenilai','','0')" ;
	mysqli_query($conn, $sqld);
}

foreach($_SESSION["data"] as $y => $y_value)
{
$kdnilai = $_SESSION["kdpenilai"];
$kdkri = $_SESSION["data"][$y]["kdkri"];
$kdsub = $_SESSION["data"][$y]["kdsub"];
$penilai = $_SESSION["penilai"];
$nilai = $_SESSION["data"][$y]["rating"] = $_POST["rating"][$y];
$sqla = "select count(kdsub) as cek from detail_nilai where kdnilai='$kdnilai' and kdsub='$kdsub'";
$result= mysqli_query($conn, $sqla);
$row = mysqli_fetch_assoc($result);
	if ($row['cek'] == '0'){
		$sqld = "INSERT INTO detail_nilai VALUES('$kdnilai','$kdkri','$kdsub','$penilai','$nilai')" ;
		mysqli_query($conn, $sqld);
		
	} else{
	}
}
		unset ($_SESSION['data']);
		unset ($_SESSION["kdpenilai"]);
		unset ($_SESSION['penilai']);
		unset ($_SESSION['karyawan']);
		unset ($_SESSION['periode']);
		//echo "<script>toastr.success(\"Data penilaian berhasil disimpan!\")</script>";
		echo "<script>alert(\"Data sukses diinput\")</script>";
		echo '<script>window.location.href = "t_pengukuran.php";</script>';
		
}
else{	
	
		if ($_SESSION['nik'] == ''){
			$nik = $_SESSION['nik'] = "Customer";
		} else {
			$nik = $_SESSION['nik'];
		}
		$sqla = "select bagian from master_karyawan where NIK='$nik'";
		$result= mysqli_query($conn, $sqla);
		$row = mysqli_fetch_assoc($result);
		$bagian = $_SESSION['bagian'] = $row['bagian'];
		$sqlb = "select nikatasan from master_karyawan where NIK='$nik'";
		$result= mysqli_query($conn, $sqlb);
		$rowa = mysqli_fetch_assoc($result);
		$nikatasan = $_SESSION['atasan'] = $rowa['nikatasan'];
		
?>
                                    <form role="form" action="" method="POST">
										<div class="form-group">
										<label>Pilih Karyawan</label>
											<select class="form-control select2" name="karyawan" id="karyawan" onchange="detailKar(this.value)" required>
											<?php
											$sqla = "select COUNT(nik) as cek from master_karyawan where NIK='$nik'";
											$result= mysqli_query($conn, $sqla);
											$row = mysqli_fetch_assoc($result);
											if ($row['cek'] != '0'){
												$sqla = "select COUNT(nik) as cek from master_karyawan where Jabatan REGEXP 'manajer|direktur'";
												$result= mysqli_query($conn, $sqla);
												$row = mysqli_fetch_assoc($result);
												if ($row['cek'] != '0'){
													$query = "select nik, nama_lengkap, bagian from master_karyawan where nik not like '$nik'";
													$tampil = mysqli_query($conn, $query);
													$muncul = "var detail1 = new Array();\n";
													while($data1 = mysqli_fetch_array($tampil))
													{
													echo "<option value='".$data1['nik']."'>".$data1['nik']." - ".$data1['nama_lengkap']." [".$data1['bagian']."] </option>";
													}
												} else {
													$query = "select nik, nama_lengkap, bagian from master_karyawan where bagian='$bagian' and nik not like '$nik'";
													$tampil = mysqli_query($conn, $query);
													$muncul = "var detail1 = new Array();\n";
													while($data1 = mysqli_fetch_array($tampil))
													{
													echo "<option value='".$data1['nik']."'>".$data1['nik']." - ".$data1['nama_lengkap']." [".$data1['bagian']."] </option>";
													}
												}
											} else {
													$query = "select nik, nama_lengkap, bagian from master_karyawan";
													$tampil = mysqli_query($conn, $query);
													$muncul = "var detail1 = new Array();\n";
													while($data1 = mysqli_fetch_array($tampil))
													{
													echo "<option value='".$data1['nik']."'>".$data1['nik']." - ".$data1['nama_lengkap']." [".$data1['bagian']."] </option>";
													}
											}
											?>
											</select>
											
										</div>
										<div class="form-group">
                                            <label>Pilih Penilai</label>
                                            <select class="form-control select2" name="penilai" id="penilai" onchange="detailKar(this.value)" required>
											
											<?php
											$sqla = "select COUNT(nik) as cek from master_karyawan where Jabatan REGEXP 'manajer|direktur' and NIK='$nik'";
											$result= mysqli_query($conn, $sqla);
											$row = mysqli_fetch_assoc($result);
											if ($row['cek'] != '0'){
												$query = "select * from master_penilai";
												$tampil = mysqli_query($conn, $query);
												$muncul = "var detail1 = new Array();\n";
												while($data1 = mysqli_fetch_array($tampil))
												{
												echo "<option value='".$data1['kdpenilai']."'>".$data1['rolepenilai']." - ".$data1['ketrole'];"</option>";
												}
											} else {
												$query = "select * from master_penilai where ketrole REGEXP 'rekan|atasan|bawahan|eksternal'";
												$tampil = mysqli_query($conn, $query);
												$muncul = "var detail1 = new Array();\n";
												while($data1 = mysqli_fetch_array($tampil))
												{
												echo "<option value='".$data1['kdpenilai']."'>".$data1['rolepenilai']." - ".$data1['ketrole'];"</option>";
												}
											}
											?>
											</select>
                                        </div>
										<div class="form-group">
										<label>Pilih Periode</label>
                                            <div class="input-group date" id="datetimepicker11" data-target-input="nearest">
												<input type="text" name="periode" class="form-control datetimepicker-input" data-target="#datetimepicker11" required/>
												<div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
                                        </div>
										<!--<div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" class="form-control" name="tglmulai" required>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" class="form-control" name="tglselesai" required>
                                        </div>-->
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
