<!DOCTYPE html>
<?php
INCLUDE '../config.php';
require_once '../load.php';

$jabatan = $_SESSION['jabatan'];
$sqlc = "select count(*)as jum from master_jabatan where namjab='$jabatan' and akses='Manajer'";
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
  <title>PerforMAP360 | Aprroval Penilaian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


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

  <?php require_once '../sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Aprroval Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Aprroval Penilaian</li>
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
                <h3 class="card-title">Detail Perhitungan Kinerja</h3>
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
if(isset($_POST['terima'])){
$a = $_POST['totnilai'];
$b = $_POST['periodepilih'];
$c = $_POST['nikkar'];
$d = $_POST['skorakhir'];
$sqla = "select COUNT(periode) as cek from transaksi_penilaian where periode='$b' and nik='$c' and status='1' group by periode";
$result= mysqli_query($conn, $sqla);
$row = mysqli_fetch_assoc($result);
if ($row['cek'] == ''){
$sql2 = "update transaksi_penilaian set status='1', totalnilai='$a' where periode='$b' and nik='$c'";
mysqli_query($conn, $sql2);
echo "<script>toastr.success(\"Data penilaian diapprove!\")</script>";
} else{
echo "<script>toastr.error(\"Approval gagal, ada data penilaian yang sudah diapprove! Silahkan ubah status pada data lama!\")</script>";	
}
}
else if(isset($_POST['tolak'])){
$a = $_POST['totnilai'];
$b = $_POST['periodepilih'];
$c = $_POST['nikkar'];
$d = $_POST['skorakhir'];
$sql2 = "update transaksi_penilaian set status='0', totalnilai='$a' where periode='$b' and nik='$c'";
mysqli_query($conn, $sql2);
echo "<script>toastr.warning(\"Data penilaian ditolak!\")</script>";
}
else if(isset($_POST['hapus'])){
$a = $_POST['totnilai'];
$b = $_POST['periodepilih'];
$c = $_POST['nikkar'];
$d = $_POST['skorakhir'];
$sql2 = "select kdnilai from transaksi_penilaian where periode='$b' and nik='$c' and status='0'";
$result1 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result1) > 0) {
while($row = mysqli_fetch_assoc($result1)) {
	$kdnilai = $row["kdnilai"];
	$sql1 = "delete from detail_nilai where kdnilai='$kdnilai'";
	mysqli_query($conn, $sql1);
}
}
$sql2 = "delete from transaksi_penilaian where periode='$b' and nik='$c' and status='0'";
mysqli_query($conn, $sql2);

echo "<script>toastr.warning(\"Data penilaian dihapus!\")</script>";
}
else if(isset($_POST['print'])){
?>
<script>
  window.print();
</script>
<?php
}

if(isset($_POST['lihatdetail'])){

	$_SESSION['periode2'] = $periode2 = $_POST['periode2'];
	$_SESSION['nikpilih'] = $nikpilih = $_POST['nikpilih'];
	$rangkingkarx = $_POST['rangkingkarx'];
	
	$sqlkar = "select * from master_karyawan where nik='$nikpilih'";
	$resultkar= mysqli_query($conn, $sqlkar);
	if (mysqli_num_rows($resultkar) > 0) {
		while($row = mysqli_fetch_assoc($resultkar)) {
		$a1 = $row['NIK'];
		$b1 = $row['Nama_Lengkap'];
		$c1 = $row['Bagian'];
		$d1 = $row['Jabatan'];
		$e1 = $row['NIKatasan'];
		}
	}
	$sqlNIK = "select * from master_karyawan where nik='$e1'";
	$resultnik= mysqli_query($conn, $sqlNIK);
	if (mysqli_num_rows($resultnik) > 0) {
		while($row = mysqli_fetch_assoc($resultnik)) {
		$f1 = $row['Nama_Lengkap'];
		}
	}

?>
							
							<div class="col-lg-12">
								<h2 style="text-align:center">
								<img width="60px" height="60px" src="../../dist/img/newtown.png"
								alt="AdminLTE Logo"
								class="brand-image img-square">PT SYAHID HUSADA DEWATA
								<h5 style="text-align:center">Laporan Kinerja Karyawan
							  </div>
							  <div class="card-body">
							 
                              <form role="form" action="" method="POST">
								<table width="100%">
								<tr><td width="45%">		
										<div class="form-group">
                                            <label>Nama Karyawan    : <?php echo $a1." - ".$b1; ?></label>
											<input class="form-control" name="nik" type="hidden" value="<?php echo $a1; ?>" readonly>
                                            <input class="form-control" name="nama" type="hidden" value="<?php echo $b1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Bagian	     	: <?php echo $c1; ?></label>
                                            <input class="form-control" name="bagian" type="hidden" value="<?php echo $c1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Jabatan 	       	: <?php echo $d1; ?></label>
                                            <input class="form-control" name="jabatan" type="hidden" value="<?php echo $d1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Atasan 		     : <?php echo $e1." - ".$f1; ?></label>
                                            <input class="form-control" name="nikatasan" type="hidden" value="<?php echo $e1; ?>" readonly>
                                            <input class="form-control" name="namaatasan" type="hidden" value="<?php echo $f1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Periode Penilaian : <?php echo tgl_indo($periode2); ?></label>
                                            <input class="form-control" name="periode" type="hidden" value="<?php echo $periode2; ?>" readonly>
                                        </div>
									
								</form>
								</div>
								</td>
								<td width="55%">
								
							 <!-- DONUT CHART -->
							<div class="card card-danger">
							  <div class="card-header">
								<h3 class="card-title">Detail Bobot Penilai</h3>

								<div class="card-tools">
								  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								  </button>
								</div>
							  </div>
							  <div class="card-body">
							 
								<div class="chart">
								<canvas id="donutChart" style="min-height: 250px; height: 250px;"></canvas>
								 </div>
								 </div>
								</td></tr>
								</table>
							  
							  <!-- /.card-body -->
							</div>
							<!-- /.card --> 
							<div class="col-lg-12">
							<!-- BAR CHART -->
							<div class="card card-success">
							  <div class="card-header">
								<h3 class="card-title">Grafik Perbandingan</h3>

								<div class="card-tools">
								  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								  </button>
								</div>
							  </div>
							  <div class="card-body">
								<div class="chart">
								  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
								</div>
							  </div>
							  <!-- /.card-body -->
							</div>
							</div>
							<!-- /.card -->
							<div class="row">
							<table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                    <tr>
										<th style="text-align:center" colspan='3'>Detail Penilaian</th>
									</tr>
                                    <!--<tr>
                                        <th style="text-align:center" width="55%">Kriteria</th>
                                        <th style="text-align:center" width="10%">Total Nilai Kriteria</th>
                                        <th style="text-align:center" width="35%">Rata-Rata Kriteria</th>
									</tr>-->
                                </thead>
								
							</table>
							<table width="100%" style="display:none">
						
                                <tbody>
								<?php
							/* $sqlc = "select count(kdpenilai)as jumpenilai from master_penilai";
							$resulta= mysqli_query($conn, $sqlc);
							$rowjum = mysqli_fetch_assoc($resulta);
							$jumpencek = $rowjum['jumpenilai'];	 */
							
							/* $sqld = "select max(periode) as periodeSB from transaksi_penilaian where periode <  '$periode2' order by periode asc";
							$resultd= mysqli_query($conn, $sqld);
							$rowperiode = mysqli_fetch_assoc($resultd);
							$periodSebelum = $rowperiode['periodeSB'];	 */
							
							$_SESSION['total'] = '0';
							$_SESSION['total1'] = '0';
							$_SESSION['jumbobot'] = '0';
							$_SESSION['masaperiode'] = "1";
							$_SESSION['masaperiode1'] = "1";
							$nilaipen=array();
							$botpen=array();
							$penilaiE=array();
							$totalkriteria=array();
							$jumbobot=array();
							$jumkri=array();
							$nilaipen1=array();
							$penilaiE1=array();
							
							
							$sqla = "SELECT * FROM `master_penilai` a where a.kdpenilai in (select kdpenilai from transaksi_penilaian where kdpenilai=a.kdpenilai and periode='$periode2' and nik='$nikpilih') order by kdpenilai asc";
							$resulta = mysqli_query($conn, $sqla);
							if (mysqli_num_rows($resulta) > 0) {
							while($row1 = mysqli_fetch_assoc($resulta)) {
							$a = $row1["kdpenilai"];
							$b = $row1["rolepenilai"];
							$c = $row1["ketrole"];
							echo "<tr>";
							echo "<td colspan='3'>";
							//echo "<b>".$b." - ".$c."</b>";
							"<b>".$b." - ".$c."</b>";
							echo "</td>";
							echo "</tr>";
								
								$sqlc = "SELECT kdkri, (select namkri from master_kriteria a where a.kdkri=b.kdkri) as namakriteria, sum(nilai) as nilai, 
								(select bobot from master_bobot a where a.kdpenilai=b.kdpenilai and a.kdkri = b.kdkri group by kdkri and kdpenilai) as bobot, 
								(SELECT COUNT(kdsub) from master_subkriteria a WHERE a.kdkri = b.kdkri and kdkri in 
								(select kdkri from master_bobot where kdpenilai='$a')) as jumsub from detail_nilai b 
								where kdpenilai='$a' and kdnilai in (SELECT kdnilai from transaksi_penilaian WHERE nik='$nikpilih' and periode='$periode2') and kdkri in 
								(select kdkri from master_bobot where kdpenilai='$a') group by kdkri";
								$_SESSION['masaperiode']="'"."Periode Yang Dipilih"."'";
								$result1 = mysqli_query($conn, $sqlc);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										$x = $row['kdkri'];
										echo "<tr>"; 
										echo "<form action=\"\" method=\"POST\">"; 
										echo "<td width=\"55%\">";
										$kriteria[$x] = $row["kdkri"]; 
										//echo " ".$row["namakriteria"]; 
										$row["namakriteria"]; 
										echo "</td>";
										echo "<td width=\"10%\"> ";
										$_SESSION['nilaikahir'][$x][$a]['totbot'] = $nilai[$a][$x] = $row["nilai"];
										//echo $nilai[$a][$x] = $row["nilai"];
										echo "</td>";
										$jumsub[$a][$x] = $row['jumsub'];
										$botkri[$a][$x] = $row['bobot'];
										$totalkri[$a][$x] = ($nilai[$a][$x] / $jumsub[$a][$x]) * ($botkri[$a][$x]/100);
										$_SESSION['nilaikahir'][$x][$a]['totalkriteria'] = round($totalkri[$a][$x],3); 
										$totalbot[$a][$x] =+ intval($botkri[$a][$x]);
										echo "<td width=\"35%\">";  
										$totalkri[$a][$x];
										//echo $totalkri[$a][$x];
										echo "</td>";
										echo "</form>";
										echo "</tr>";
									}
									//echo "<tr>";
									//echo "<td><b>Sub Total Nilai</b></td>";
										//echo "<td><b>";
										$_SESSION['nilaikahir'][$a]['jumbobot'] =  array_sum($totalbot[$a]);
										array_push($jumbobot,$botkri);
										$_SESSION['jumbobot'] += $_SESSION['nilaikahir'][$a]['jumbobot'];
										echo "<input type=\"hidden\" class=\"form-control\" name=\"jumbot[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$a]['jumbobot'] =  array_sum($totalbot[$a]); echo "\">";
										$botjum= array_sum($totalbot[$a]);
										//echo $_SESSION['nilaipie'];
										//print_r($botpen);
										echo "</td><td><b>";
										
										//echo $_SESSION['nilaikahir'][$a]['total'] = array_sum($totalkri[$a]);
										array_push($totalkriteria,$totalkri);
										$_SESSION['total'] += array_sum($totalkri[$a]);
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nilai[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$a]['total'] = array_sum($totalkri[$a]); echo "\">";
										$tot=round(array_sum($totalkri[$a]),3);
										array_push($nilaipen,"'".$tot."'");
										$_SESSION['nilaipie'] = implode(",",$nilaipen);
										//echo $_SESSION['nilaipie'];
										//print_r($nilaipen);
										
										
										
										echo "<input type=\"hidden\" class=\"form-control\" name=\"penilaiE[$x]\" value=\"";
										$_SESSION['nilaikahir'][$a]['penilaiE'] = $b; echo "\">";
										$penilaiPie= $_SESSION['nilaikahir'][$a]['penilaiE'];
										array_push($penilaiE,"'".$penilaiPie." ".$botjum."%"."'");
										$_SESSION['penilaiPie'] = implode(",",$penilaiE);
										//echo $_SESSION['penilaiPie'];
										//print_r($nilaipen);
										
										
									//echo "</b></td>";
									//echo "</tr>";
								}
								
								
								//$a -= 1;
								
								$sqlb = "select max(periode) as cek from transaksi_penilaian where periode<'$periode2' and nik='$nikpilih' and status='1'";
								$resultz= mysqli_query($conn, $sqlb);
								$rowb = mysqli_fetch_assoc($resultz);
								$periodSebelum = $rowb['cek'];
								//if($rowb['cek'] >= $jumpencek){
								if($rowb['cek'] != ''){
								$sql1 = "SELECT kdkri, (select namkri from master_kriteria a where a.kdkri=b.kdkri) as namakriteria, sum(nilai) as nilai, 
								(select bobot from master_bobot a where a.kdpenilai=b.kdpenilai and a.kdkri = b.kdkri group by kdkri and kdpenilai) as bobot, 
								(SELECT COUNT(kdsub) from master_subkriteria a WHERE a.kdkri = b.kdkri) as jumsub from detail_nilai b 
								where kdpenilai='$a' and kdnilai in (SELECT kdnilai from transaksi_penilaian WHERE nik='$nikpilih' and periode='$periodSebelum' and status='1') group by kdkri";
								$_SESSION['masaperiode1']="'"."Periode Sebelumnya"."'";
								} else {
								$sql1 = "SELECT kdkri, (select namkri from master_kriteria a where a.kdkri=b.kdkri) as namakriteria, sum(nilai) as nilai, 
								(select bobot from master_bobot a where a.kdpenilai=b.kdpenilai and a.kdkri = b.kdkri group by kdkri and kdpenilai) as bobot, 
								(SELECT COUNT(kdsub) from master_subkriteria a WHERE a.kdkri = b.kdkri) as jumsub from detail_nilai b 
								where kdpenilai='$a' and kdnilai in (SELECT kdnilai from transaksi_penilaian WHERE nik='$nikpilih' and periode='$periode2') group by kdkri";
								$_SESSION['masaperiode1']="'"."Tidak Ada Data Periode Sebelumnya"."'";
								}
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										$x = $row["kdkri"];
										$kriteria1[$x] = $row["kdkri"];
										$nilai1[$x] = $row["nilai"];
										$jumsub1[$x] = $row['jumsub'];
										$botkri1[$x] = $row['bobot'];
										$totalkri1[$a][$x] = ($nilai1[$x] / $jumsub1[$x]) * ($botkri1[$x]/100);
										$totalkri1[$a][$x];
									}
										$_SESSION['nilaikahir1'][$a]['total'] = array_sum($totalkri1[$a]);
										$_SESSION['total1'] += array_sum($totalkri1[$a]);
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nilai1[$x]\" value=\"";
										echo $_SESSION['nilaikahir1'][$a]['total'] = array_sum($totalkri1[$a]); echo "\">";
										$tot=round(array_sum($totalkri1[$a]),3);
										array_push($nilaipen1,"'".$tot."'");
										$_SESSION['nilaipie1'] = implode(",",$nilaipen1);
										
										
										echo "<input type=\"hidden\" class=\"form-control\" name=\"penilaiE1[$x]\" value=\"";
										echo $_SESSION['nilaikahir1'][$a]['penilaiE1'] = $b; echo "\">";
										$penilaiPie1= $_SESSION['nilaikahir1'][$a]['penilaiE1'];
										array_push($penilaiE1,"'".$penilaiPie1."'");
										$_SESSION['penilaiPie1'] = implode(",",$penilaiE1);
										
								}
										
							} }
								$totakhir = $_SESSION['total'];
								//array_push($nilaipen,"'".$totakhir."'");
								$_SESSION['nilaichart'] = implode(",",$nilaipen);
								
								$perbandingantot= 'Total Nilai';
								//array_push($penilaiE1,"'".$perbandingantot."'");
								$_SESSION['penilaiBar'] = implode(",",$penilaiE1);
								
								$totakhir1 = $_SESSION['total1'];
								//array_push($nilaipen1,"'".$totakhir1."'");
								$_SESSION['nilaichart1'] = implode(",",$nilaipen1);

								
								
								$rating = $_SESSION['total'];
								$potongrat = substr($rating,2,1);
								if ($potongrat >= '5' && $potongrat <= '9'){
									$final = ceil($rating);
								} else if ($potongrat >= '0' && $potongrat <='4'){
									$final = floor($rating);
								} 
								$sqlnilai = "select * from master_rating where rating like '$final'";
								$resultrat= mysqli_query($conn, $sqlnilai);
								if (mysqli_num_rows($resultrat) > 0) {
									while($row = mysqli_fetch_assoc($resultrat)) {
										$rat = $row['rating'];
										$ketrat = $row['ketrating'];
									}
								}
								if ($rat >= '4' && $rat <= '5'){
								$color='green';
								$catatan='Standar Minimal Kinerja telah tercapai lebih, Karyawan yang bersangkutan memiliki performa dan kinerja yang sangat baik dengan nilai diatas standar pencapaian';
								}  else if ($rat >= '3' && $rat < '4'){
								$color='blue';
								$catatan='Standar Minimal Kinerja tercapai, Karyawan yang bersangkutan memiliki performa dan kinerja sesuai dengan stardar minimal';
								} else if ($rat >= '0' && $rat <'3'){
								$color='red';
								$catatan='Standar Minimal Kinerja belum tercapai sepenuhnya, Karyawan yang bersangkutan perlu dibina lebih lanjut karena tidak memenuhi standar minimal kinerja';
								}
								$sqlh = "select count(kdpenilai)as jumpenilai from master_penilai a where a.kdpenilai in (select kdpenilai from transaksi_penilaian where kdpenilai=a.kdpenilai and periode='$periode2' and nik='$nikpilih')";
								$resulth= mysqli_query($conn, $sqlh);
								$rowjumcol = mysqli_fetch_assoc($resulth);
								$jumpencol = 2 * $rowjumcol['jumpenilai'];	
								?>
								</tbody></table>
								<table width="100%" class="table table-striped table-bordered table-hover">
								<tr><td style="text-align:center;vertical-align: middle;" rowspan='3' width="20%"><b>Kriteria</b></td>
								<?php
								
								echo "<td colspan='$jumpencol' style=\"text-align:center\"><b>Penilai</b></td></tr>
								<tr>";
								$sqla = "SELECT * FROM `master_penilai` a where a.kdpenilai in (select kdpenilai from transaksi_penilaian where kdpenilai=a.kdpenilai and periode='$periode2' and nik='$nikpilih') order by kdpenilai asc";
								$resulta = mysqli_query($conn, $sqla);
								if (mysqli_num_rows($resulta) > 0) {
								while($row1 = mysqli_fetch_assoc($resulta)) {
									$a = $row1["kdpenilai"];
									$b = $row1["rolepenilai"];
									$c = $row1["ketrole"];
									echo "<td colspan='2' style=\"text-align:center\"><b>".$b."</b></td>";
								}
								}
								?>
								</tr>
								<tr>
								<?php
								$sqla = "SELECT * FROM `master_penilai` a where a.kdpenilai in (select kdpenilai from transaksi_penilaian where kdpenilai=a.kdpenilai and periode='$periode2' and nik='$nikpilih') order by kdpenilai asc";
								$resulta = mysqli_query($conn, $sqla);
								if (mysqli_num_rows($resulta) > 0) {
								while($row1 = mysqli_fetch_assoc($resulta)) {
									$a = $row1["kdpenilai"];
									$b = $row1["rolepenilai"];
									$c = $row1["ketrole"];
									echo "<td width=\"5%\" style=\"text-align:center\"><b>Bobot</br>(%)</b></td>";
									echo "<td style=\"text-align:center;vertical-align: middle;\"><b>Rata-Rata</b></td>";
								}
								}
								?>
								</tr>
								
								<?php
								$sqla = "SELECT (select kdkri from master_kriteria a where a.kdkri=b.kdkri) as kdkri,
								(select namkri from master_kriteria a where a.kdkri=b.kdkri)
								as namkri from detail_nilai b where kdkri in 
								(select kdkri from master_bobot) group by kdkri";
								$resulta = mysqli_query($conn, $sqla);
								if (mysqli_num_rows($resulta) > 0) {
								while($row1 = mysqli_fetch_assoc($resulta)) {
								$a = $row1["kdkri"];
								$x = $row1["namkri"];
								echo "<tr><td><b>".$x."</b></td>";
										$sqlb = "SELECT * FROM `master_penilai` a where a.kdpenilai in (select kdpenilai from transaksi_penilaian where kdpenilai=a.kdpenilai and periode='$periode2' and nik='$nikpilih') order by kdpenilai asc";
										$resultb = mysqli_query($conn, $sqlb);
										if (mysqli_num_rows($resultb) > 0) {
										while($rowb = mysqli_fetch_assoc($resultb)) {
											$b = $rowb["kdpenilai"];
											if(isset($_SESSION['nilaikahir'][$a][$b]['totalkriteria'])){
											echo "<td style=\"text-align:center;vertical-align: middle;\"><b>".$_SESSION['nilaikahir'][$a][$b]['totbot']."</b></td>";
											echo "<td style=\"text-align:left;vertical-align: middle;\"><b>".substr($_SESSION['nilaikahir'][$a][$b]['totalkriteria'],0,12)."</b></td>";
											} else{
												echo "<td><b>"."</b></td>";
												echo "<td><b>"."</b></td>";
											}
										}
										}
								echo "</tr>";
									}
								}
								?>
								<tr><td style="text-align:left"><b>Sub Total Penilai</b></td>
								<?php
								$sqla = "SELECT * FROM `master_penilai` a where a.kdpenilai in (select kdpenilai from transaksi_penilaian where kdpenilai=a.kdpenilai and periode='$periode2' and nik='$nikpilih') order by kdpenilai asc";
								$resulta = mysqli_query($conn, $sqla);
								if (mysqli_num_rows($resulta) > 0) {
									while($row1 = mysqli_fetch_assoc($resulta)) {
									$a = $row1["kdpenilai"];
									echo "<td style=\"text-align:center\"><b>";
									echo $_SESSION['nilaikahir'][$a]['jumbobot'];
									echo "</b></td>";
									echo "<td style=\"text-align:left\"><b>";
									echo round($_SESSION['nilaikahir'][$a]['total'],3);
									echo "</b></td>";
									}
								}
								echo "</tr>";
								$totcol = $jumpencol - 1;
								echo "<tr><form action=\"\" method=\"POST\">";
									echo "<td colspan='$jumpencol'>";
									echo "<b>Total Akhir</b>";
									echo "</td>";
										echo "<td colspan ='$totcol' style=\"text-align:right\"><b>";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"totnilai\" value=\"";
										echo round($_SESSION['total'],3) ; echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"periodepilih\" value=\"";
										echo $_SESSION['periode2'] ; echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nikkar\" value=\"";
										echo $_SESSION['nikpilih'] ; echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"skorakhir\" value=\"";
										echo $_SESSION['total'] ; echo "\">";
										echo round($_SESSION['total'],3) ;
										echo "</b></td>";
								echo "</tr>";
								?>
								
								<tr>
									<td colspan='9'><b>Rating Akhir - <span style="color:<?php echo $color;?>"><?php echo $ketrat;?></span><br>
									Kesimpulan: <br><?php echo $catatan?>. Karyawan yang dinilai telah meraih rangking <?php echo $rangkingkarx;?> dalam penilaian periode 
									<?php echo tgl_indo($periode2);?>. Karyawan yang dinilai  
									<?php 
									$nilaiBaru = round($_SESSION['total'],3);
									$nilaiLama = round($_SESSION['total1'],3); 
									if ($nilaiBaru > $nilaiLama){
										$nilaitampil = $nilaiBaru - $nilaiLama;
										echo "juga mengalami <span style=\"color:green\">Peningkatan Nilai Kinerja</span>";
										echo " sebanyak ";
										echo "<span style=\"color:green\">".$nilaitampil."</span> poin nilai";
									} else if ($nilaiBaru < $nilaiLama) {
										$nilaitampil = $nilaiLama - $nilaiBaru;
										echo "juga mengalami <span style=\"color:red\">Penirunan Nilai Kinerja</span>";
										echo " sebanyak ";
										echo "<span style=\"color:red\">".$nilaitampil."</span> poin nilai";
									} else if ($nilaiBaru = $nilaiLama) {
										echo "tidak mengalami <span style=\"color:blue\">Peningkatan atau Penurunan Nilai Kinerja</span>";
										
									}
									?></b></td>
								</tr>
								</table>
								<table class='no-print' width="100%">
								<?php	
								$sqlb = "select status from transaksi_penilaian where periode='$periode2' and nik='$nikpilih'";
								$result= mysqli_query($conn, $sqlb);
								$rowb = mysqli_fetch_assoc($result);
								if($rowb['status'] == '1'){
								?>
									<tr>
									<td colspan='2'><b><label>Laporan Sudah <span style="color:green">Diterima</span>. Apakah anda ingin merubah status?</label></b></td>
										<td style="text-align:center"><b>
										<button type="submit" name="tolak" class="btn btn-success">Iya</button>	
										
										</b></td>
									</tr>
									<tr>
									<td colspan='2'><span style="color:blue"><b>Untuk Mencetak Laporan Tekan CTRL+P atau gunakan fungsi Print pada Browser anda</span></b></td>
									</tr>
									<tr>
									<td colspan='2'><b>Keterangan:
									<span style="color:black"><b>
									Standar Minimal Kinerja tercapai apabila karyawan memiliki total nilai akhir minimal 3 (tiga), jika karyawan mendapat nilai kurang dari 3 (tiga) maka keryawan yang bersangkutan perlu mengikuti pembinaan lebih lanjut.
									</span></b></td>
									</tr>
								<?php
								} else if($rowb['status'] == '0'){
								?>
									<tr>
									<td colspan='2'><b><label>Laporan Sudah <span style="color:red">Ditolak</span>. Apakah anda ingin merubah status?</label></b></td>
										<td style="text-align:center"><b><?php
										
										?>
										<button type="submit" name="terima" class="btn btn-success">Iya</button>	
										<button type="submit" name="hapus" class="btn btn-danger">Tidak (Hapus Data)</button>	
										
										</b></td>
									</tr>
									<tr>
									<td colspan='2'><b><span style="color:blue"><b>Untuk Mencetak Laporan Tekan CTRL+P atau gunakan fungsi Print pada Browser anda</span></b></td>
									</tr>
									<tr>
									<td colspan='2'><b>Keterangan:
									<span style="color:black"><b>
									Standar Minimal Kinerja tercapai apabila karyawan memiliki total nilai akhir minimal 3 (tiga), jika karyawan mendapat nilai kurang dari 3 (tiga) maka keryawan yang bersangkutan perlu mengikuti pembinaan lebih lanjut.
									</span></b></td>
									</tr>
								<?php
								} else{
								?>
									<tr>
									<td colspan='2'><b>Proses Laporan ?</b></td>
										<td style="text-align:center"><b>
										
										<button type="submit" name="terima" class="btn btn-success">Terima</button>	
										<button type="submit" name="tolak" class="btn btn-danger">Tolak</button>
										
										</b></td>
										
									</tr>
									<tr>
									<td colspan='2'><b><span style="color:blue"><b>Untuk Mencetak Laporan Tekan CTRL+P atau gunakan fungsi Print pada Browser anda</span></b></td>
									</tr>
									<tr>
									<td colspan='2'><b>Keterangan:
									<span style="color:black"><b>
									Standar Minimal Kinerja tercapai apabila karyawan memiliki total nilai akhir minimal 3 (tiga), jika karyawan mendapat nilai kurang dari 3 (tiga) maka keryawan yang bersangkutan perlu mengikuti pembinaan lebih lanjut.
									</span></b></td>
									</tr>
								<?php
								}
								
								?>
								
								</form></table>
								
								
						
								

							<script type="text/javascript">
							
							$(function () {
								//Initialize Select2 Elements
								
								
								//-------------
								//- DONUT CHART -
								//-------------
								// Get context with jQuery - using jQuery's .get() method.
								var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
								var donutData        = {
								  labels: [
								  <?php
									  echo $_SESSION['penilaiPie'];
								  ?>
								  ],
								  datasets: [
									{
									  data: [ <?php
									  echo $_SESSION['nilaipie'];
									  ?>
										
									 ],
									  backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
									}
								  ]
								}
								var donutOptions     = {
								  maintainAspectRatio : false,
								  responsive : true,
								}
								//Create pie or douhnut chart
								// You can switch between pie and douhnut using the method below.
								var donutChart = new Chart(donutChartCanvas, {
								  type: 'pie',
								  data: donutData,
								  options: donutOptions      
								})
								
								
								
								//-------------
								//- BAR CHART -
								//-------------
								var barChartCanvas = $('#barChart').get(0).getContext('2d')
								var barChartData = {
								  labels  : [<?php
									  echo $_SESSION['penilaiBar'];
								  ?>],
								  datasets: [
									{
									  label               : <?php echo $_SESSION['masaperiode1'];?>,
									  backgroundColor     : 'rgba(210, 214, 222, 1)',
									  borderColor         : 'rgba(210, 214, 222, 1)',
									  pointRadius         : false,
									  pointColor          : 'rgba(210, 214, 222, 1)',
									  pointStrokeColor    : '#c1c7d1',
									  pointHighlightFill  : '#fff',
									  pointHighlightStroke: 'rgba(220,220,220,1)',
									  data                : [ <?php
									  echo $_SESSION['nilaichart1'];
									  ?>]
									},
									{
									  label               : <?php echo $_SESSION['masaperiode'];?>,
									 
									  backgroundColor     : 'rgba(60,141,188,0.9)',
									  borderColor         : 'rgba(60,141,188,0.8)',
									  pointRadius          : false,
									  pointColor          : '#3b8bba',
									  pointStrokeColor    : 'rgba(60,141,188,1)',
									  pointHighlightFill  : '#fff',
									  pointHighlightStroke: 'rgba(60,141,188,1)',
									  data                : [ <?php
									  echo $_SESSION['nilaichart'];
									  ?>]
									}
									
								  ]
								}
								

								var barChartOptions = {
								  responsive              : true,
								  maintainAspectRatio     : false,
								  datasetFill             : false
								}

								var barChart = new Chart(barChartCanvas, {
								  type: 'horizontalBar', 
								  data: barChartData,
								  options: barChartOptions
								})
								
								
								
								
							});
								
							</script>
							
							
<?php
}
else if(isset($_POST['lihat'])){
	$periode = $_POST['periode'];
	$nikaryawan=array();
	$skor=array();
	$rangkingkar=1;
	//$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, totalnilai AS skor FROM transaksi_penilaian b where periode='$periode' and status='1' GROUP BY nik ORDER by totalnilai asc";
	$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, totalnilai AS skor FROM transaksi_penilaian b where periode='$periode' and status='1' GROUP BY nik ORDER by totalnilai desc";
	$result1 = mysqli_query($conn, $sql1);
	if (mysqli_num_rows($result1) > 0) {
	while($row = mysqli_fetch_assoc($result1)) {
		$nik = $row["nik"];
		$nama = $row["nama"];
		$skortop = $row["skor"];
		
		echo "<input type=\"hidden\" class=\"form-control\" name=\"nikkarTOP[$nik]\" value=\"";
		echo $_SESSION['skor'][$nik]['nikkar'] = $nama." - (".$rangkingkar++.")"; echo "\">";
		$nikarya= $_SESSION['skor'][$nik]['nikkar'];
		array_push($nikaryawan,"'".$nikarya."'");
		$_SESSION['nikkartop'] = implode(",",$nikaryawan);
		//print_r ($nikaryawan);
		
		echo "<input type=\"hidden\" class=\"form-control\" name=\"skorTOP[$nik]\" value=\"";
		echo $_SESSION['skor'][$nik]['skortop'] = $skortop; echo "\">";
		$skorBIG= $_SESSION['skor'][$nik]['skortop'];
		array_push($skor,"'".$skorBIG."'");
		$_SESSION['skorkar'] = implode(",",$skor);
		//print_r ($skor);
	}
										
										
	}else{
		unset ($_SESSION['skor']);
		unset ($_SESSION['nikkartop']);
		unset ($_SESSION['skorkar']);
	}	

?>
                                <!-- BAR CHART -->
								<div class="card card-success">
								  <div class="card-header">
									<h3 class="card-title">Perangkingan Nilai Karyawan Periode <?php echo tgl_indo($periode);?></h3>

									<div class="card-tools">
									  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									  </button>
									</div>
								  </div>
								  <div class="card-body">
									<div class="chart">
									  <canvas id="barChart0" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
									</div>
								  </div>
								  <!-- /.card-body -->
								</div>
								
								<table width="100%" class="table table-striped table-bordered table-hover"  style="text-align:center"  id="bagianlist2">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Periode</th>
                                        <th style="text-align:center">Rangking Karyawan</th>
                                        <th style="text-align:center">Total Nilai</th>
                                        <th style="text-align:center">Status</th>
										<th style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php

								$rangkingkar2=1;
								$sql1 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, totalnilai, status from transaksi_penilaian a where a.periode='$periode' and status!='' group by a.nik order by totalnilai desc";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										$rangkingini = $rangkingkar2++;
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td style=\"text-align:center\"> <input type=\"hidden\" class=\"form-control\" name=\"periode2\" value=\"";
										echo $row["periode"]; echo "\">";
										echo tgl_indo($row["periode"]);
										echo "</td>";
										echo "<td style=\"text-align:left\"> <input type=\"hidden\" class=\"form-control\" name=\"nikpilih\" value=\"";
										echo $row["nik"];echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"rangkingkarx\" value=\"";
										echo $rangkingini;echo "\">";
										echo $rangkingini." - [".$row["nik"]."] ".$row["nama"];
										echo "</td>";
										echo "<td style=\"text-align:center\"> <input type=\"hidden\" class=\"form-control\" name=\"totnilai\" value=\"";
										echo $row["totalnilai"];echo "\">";echo round($row["totalnilai"],3);
										echo "</td>";
										echo "<td style=\"text-align:center\"> <input type=\"hidden\" class=\"form-control\" name=\"status\" value=\"";
										echo $row["status"];echo "\">";if($row["status"]=='1'){echo "<b><span style=\"color:green\">Diterima</span></b>";}
										else if($row["status"]=='0'){echo "<b><span style=\"color:red\">Ditolak</span></b>";}
										else if($row["status"]=='2'){echo "<b><span style=\"color:blue\">Menunggu Aprroval</span></b>";}
										else {echo "<b><span style=\"color:purple\">Belum Selesai</span></b>";}
										echo "</td>";
										echo "<td align=\"center\"><input class=\"btn btn-warning\" type=\"submit\" name=\"lihatdetail\" value=\"Lihat\"> ";
										echo "</td>";
										echo "</form></tr>";
									}
								} else {
									echo "0 results";
								}
								echo "</tbody></table>";
								mysqli_close($conn);

}

else{
	 
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
			echo $_SESSION['skor'][$nik]['skortop'] = $skortop; echo "\">";
			$skorBIG= $_SESSION['skor'][$nik]['skortop'];
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
			echo $_SESSION['skor'][$nik]['skortop'] = $skortop; echo "\">";
			$skorBIG= $_SESSION['skor'][$nik]['skortop'];
			array_push($skorX,"'".$skorBIG."'");
			$_SESSION['skorkarX'] = implode(",",$skorX);
			//print_r ($skorX);
		}
		
			
		}
			echo "<input type=\"hidden\" class=\"form-control\" name=\"periodetop[$b]\" value=\"";
			echo $_SESSION['skor'][$b]['periodetop'] = $b; echo "\">";
			$periodeBIG= $_SESSION['skor'][$b]['periodetop'];
			array_push($periodeX,"'".$periodeBIG."'");
			$_SESSION['periodetop'] = implode(",",$periodeX);
			//echo $_SESSION['periodetop'];
			//print_r($periodeX);
	}
	}

?>
                               
								 <!-- BAR CHART -->
								<div class="card card-success">
								  <div class="card-header">
									<h3 class="card-title">Nilai Terendah dan Tertinggi Periode Tahun Ini</h3>

									<div class="card-tools">
									  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
									  </button>
									</div>
								  </div>
								  <div class="card-body">
									<div class="chart">
									  <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
									</div>
								  </div>
								  <!-- /.card-body -->
								</div>
								<table width="100%" class="table table-striped table-bordered table-hover" style="text-align:center" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th>Periode</th>
										<th>Karyawan Belum Dinilai</th>
										<th>Karyawan Sudah Dinilai</th>
										<th>Penilaian Menunggu Approval</th>
										<th>Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT periode from transaksi_penilaian a where status!='' group by a.periode order by periode desc";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
									$period = $row["periode"];
									$sqla = "SELECT count(nik) as nikbelum from master_karyawan a WHERE nik not in (SELECT nik from transaksi_penilaian where periode='$period' and status='1')";
									$resulta = mysqli_query($conn, $sqla);
									$rowa = mysqli_fetch_assoc($resulta);
									$nikbelum = $rowa['nikbelum'];
									
									$sqlb = "SELECT count(nik) as niksudah from master_karyawan a WHERE nik in (SELECT nik from transaksi_penilaian where periode='$period' and status='1')";
									$resultb = mysqli_query($conn, $sqlb);
									$rowb = mysqli_fetch_assoc($resultb); 
									$niksudah = $rowb['niksudah'];
									
									$sqlc = "select count(*) as jumkar FROM (SELECT nik from transaksi_penilaian WHERE status='2' and periode='$period' group by nik) as approve";
									$resultc = mysqli_query($conn, $sqlc);
									$rowc = mysqli_fetch_assoc($resultc); 
									$tunggu = $rowc['jumkar'];
									
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"periode\" value=\"";
										echo $period; echo "\">";
										echo "<b>".tgl_indo($period)."</b>";
										echo "</td>";
										echo "<td>";
										echo "<b>".$nikbelum."</b>";
										echo "</td>";
										echo "<td>";
										echo "<b>".$niksudah."</b>";
										echo "</td>";
										echo "<td>";
										echo "<b>".$tunggu."</b>";
										echo "</td>";
										echo "<td align=\"center\"><input class=\"btn btn-warning\" type=\"submit\" name=\"lihat\" value=\"Lihat\"> ";
										echo "</td>";
										echo "</form></tr>";
									
								}
								} else {
									echo "0 results";
								}
								echo "</tbody></table>";
								mysqli_close($conn);

}
?>
<script type="text/javascript">

$(function () {
	
								//-------------
								//- BAR CHART -
								//-------------
								var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
								var barChartData2 = {
								  labels  : [<?php echo $_SESSION['periodetop'];?>],
								  datasets: [
									{
									  label               : 'Nilai Terendah',
									  backgroundColor     : 'rgba(210, 214, 222, 1)',
									  borderColor         : 'rgba(210, 214, 222, 1)',
									  pointRadius         : false,
									  pointColor          : 'rgba(210, 214, 222, 1)',
									  pointStrokeColor    : '#c1c7d1',
									  pointHighlightFill  : '#fff',
									  pointHighlightStroke: 'rgba(220,220,220,1)',
									  data                : [<?php echo $_SESSION['skorkarX'];?>]
									},
									{
									  label               : 'Nilai Tertinggi',
									  backgroundColor     : 'rgba(60,141,188,0.9)',
									  borderColor         : 'rgba(60,141,188,0.8)',
									  pointRadius          : false,
									  pointColor          : '#3b8bba',
									  pointStrokeColor    : 'rgba(60,141,188,1)',
									  pointHighlightFill  : '#fff',
									  pointHighlightStroke: 'rgba(60,141,188,1)',
									  data                : [<?php echo $_SESSION['skorkarY'];?>]
									},
									
								  ]
								}
								

								var barChartOptions2 = {
								  responsive              : true,
								  maintainAspectRatio     : false,
								  datasetFill             : false
								}

								var barChart2 = new Chart(barChartCanvas2, {
								  type: 'bar', 
								  data: barChartData2,
								  options: barChartOptions2
								})
	
});
	
</script>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                <!-- /.card-body -->
            
           
            
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
<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
	
	$("#bagianlist").DataTable({
      "responsive": true,
      "autoWidth": true,
	  "order": [[ 4, "asc" ]],
	  "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0,1,2,3,4 ] }
	  ]
    });
	$("#bagianlist2").DataTable({
      "responsive": true,
      "autoWidth": true,
	  "order": [[ 1, "asc" ]],
	  "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0 ] }
	  ]
    });
								
								//-------------
								//- BAR CHART -
								//-------------
								var barChartCanvas0 = $('#barChart0').get(0).getContext('2d')
								var barChartData0 = {
								  labels  : [<?php echo $_SESSION['nikkartop'];?>],
								  datasets: [
									{
									  label               : 'Total Nilai',
									  backgroundColor     : 'rgba(60,141,188,0.9)',
									  borderColor         : 'rgba(60,141,188,0.8)',
									  pointRadius          : false,
									  pointColor          : '#3b8bba',
									  pointStrokeColor    : 'rgba(60,141,188,1)',
									  pointHighlightFill  : '#fff',
									  pointHighlightStroke: 'rgba(60,141,188,1)',
									  data                : [<?php echo $_SESSION['skorkar'];?>]
									}
									
								  ]
								}
								

								var barChartOptions0 = {
								  responsive              : true,
								  maintainAspectRatio     : false,
								  datasetFill             : false
								}

								var barChart0 = new Chart(barChartCanvas0, {
								  type: 'horizontalBar', 
								  data: barChartData0,
								  options: barChartOptions0
								})
	
});
	
</script>

</body>
</html>
