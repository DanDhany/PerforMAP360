<!DOCTYPE html>
<?php
INCLUDE '../config.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PerforMAP360 | Perhitungan Kinerja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once '../load.php';?>

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
            <h1>Perhitungan Kinerja</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Perhitungan Kinerja</li>
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
$sql2 = "update transaksi_penilaian set status='1', totalnilai='$a' where periode='$b' and nik='$c'";
mysqli_query($conn, $sql2);
echo "<script>alert(\"Data penilaian diapprove!\")</script>";
}
else if(isset($_POST['tolak'])){
$a = $_POST['totnilai'];
$b = $_POST['periodepilih'];
$c = $_POST['nikkar'];
$sql2 = "update transaksi_penilaian set status='0', totalnilai='$a' where periode='$b' and nik='$c'";
mysqli_query($conn, $sql2);
echo "<script>alert(\"Data penilaian ditolak!\")</script>";
}

if(isset($_POST['lihatdetail'])){

	$_SESSION['periode2'] = $periode2 = $_POST['periode2'];
	$_SESSION['nikpilih'] = $nikpilih = $_POST['nikpilih'];
	
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
							
							<div class="row">
                             <div class="col-lg-6">
							 <!-- DONUT CHART -->
							<div class="card card-danger">
							  <div class="card-header">
								<h3 class="card-title">Detail Persentase Bobot</h3>

								<div class="card-tools">
								  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								  </button>
								</div>
							  </div>
							  <div class="card-body">
								<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							  </div>
							  <!-- /.card-body -->
							</div>
							</div>
							<!-- /.card --> 
							<div class="col-lg-6">
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
							</div>
							<!-- /.card -->
							<div class="row">
							<div class="col-lg-12">							
							<form role="form" action="" method="POST">

										
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
                                            <label>Periode Penilaian : <?php echo $periode2; ?></label>
                                            <input class="form-control" name="periode" type="hidden" value="<?php echo $periode2; ?>" readonly>
                                        </div>
									
                            </form>
							</div>
							
                            <table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kriteria</th>
                                        <th style="text-align:center">Total Rating</th>
                                        <th style="text-align:center">Rata-Rata Kriteria</th>
										</tr>
                                </thead>
								<tbody>
								<?php
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
							$tahun = substr($periode2,2,5);
							$a = substr($periode2,0,1);
							$b = substr($periode2,1,1);
							if($a=='0'  && $b=='1'){
								$a='0';
								$b='1';
								$periode3 = $a.$b.$tahun;
							}else if($a=='0' && $b!='1'){
								$b-=1;
								$periode3 = $a.$b.$tahun;
							} else if($a=='1' && $b=='0'){
								$b='9';
								$periode3 = $a.$b.$tahun;
							} 
							
							$sqla = "SELECT * FROM `master_penilai`";
							$resulta = mysqli_query($conn, $sqla);
							if (mysqli_num_rows($resulta) > 0) {
							while($row1 = mysqli_fetch_assoc($resulta)) {
							$a = $row1["kdpenilai"];
							$b = $row1["rolepenilai"];
							$c = $row1["ketrole"];
							echo "<tr>";
							echo "<td colspan='3'>";
							echo "<b>".$b." - ".$c."</b>";
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
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td>";
										$kriteria[$x] = $row["kdkri"]; echo " ".$row["namakriteria"]; 
										echo "</td>";
										echo "<td> ";
										echo $nilai[$x] = $row["nilai"];
										echo "</td>";
										$jumsub[$x] = $row['jumsub'];
										$botkri[$x] = $row['bobot'];
										$totalkri[$a][$x] = ($nilai[$x] / $jumsub[$x]) * ($botkri[$x]/100);
										$totalbot[$a][$x] =+ intval($botkri[$x]);
										echo "<td>";  echo $totalkri[$a][$x];
										echo "</td>";
										echo "</form></tr>";
									}
									echo "<tr>";
									echo "<td colspan='2'><b>Sub Total Nilai</b></td>";
										echo "<td><b>";
										echo $_SESSION['nilaikahir'][$x]['total'] = array_sum($totalkri[$a]);
										array_push($totalkriteria,$totalkri);
										$_SESSION['total'] += $_SESSION['nilaikahir'][$x]['total'];
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nilai[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$x]['total'] = array_sum($totalkri[$a]); echo "\">";
										$tot=array_sum($totalkri[$a]);
										array_push($nilaipen,"'".$tot."'");
										$_SESSION['nilaipie'] = implode(",",$nilaipen);
										//echo $_SESSION['nilaipie'];
										//print_r($nilaipen);
										
										echo $_SESSION['nilaikahir'][$x]['jumbobot'] =  array_sum($totalbot[$a]);
										array_push($jumbobot,$botkri);
										$_SESSION['jumbobot'] += $_SESSION['nilaikahir'][$x]['jumbobot'];
										echo "<input type=\"hidden\" class=\"form-control\" name=\"jumbot[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$x]['jumbobot'] =  array_sum($totalbot[$a]); echo "\">";
										$botjum= array_sum($totalbot[$a]);
										//echo $_SESSION['nilaipie'];
										//print_r($botpen);
										
										
										echo "<input type=\"hidden\" class=\"form-control\" name=\"penilaiE[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$x]['penilaiE'] = $b; echo "\">";
										$penilaiPie= $_SESSION['nilaikahir'][$x]['penilaiE'];
										array_push($penilaiE,"'".$penilaiPie." ".$botjum."%"."'");
										$_SESSION['penilaiPie'] = implode(",",$penilaiE);
										//echo $_SESSION['penilaiPie'];
										//print_r($nilaipen);
										
										
										echo "</b></td>";
									echo "</tr>";
								}
								
								
								//$a -= 1;
								$sqlb = "select count(*) as cek from transaksi_penilaian where periode='$periode3' and nik='$nikpilih' and status='1'";
								$resultz= mysqli_query($conn, $sqlb);
								$rowb = mysqli_fetch_assoc($resultz);
								if($rowb['cek'] != '0'){
								$sql1 = "SELECT kdkri, (select namkri from master_kriteria a where a.kdkri=b.kdkri) as namakriteria, sum(nilai) as nilai, 
								(select bobot from master_bobot a where a.kdpenilai=b.kdpenilai and a.kdkri = b.kdkri group by kdkri and kdpenilai) as bobot, 
								(SELECT COUNT(kdsub) from master_subkriteria a WHERE a.kdkri = b.kdkri) as jumsub from detail_nilai b 
								where kdpenilai='$a' and kdnilai in (SELECT kdnilai from transaksi_penilaian WHERE nik='$nikpilih' and periode='$periode3') group by kdkri";
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
										$_SESSION['nilaikahir1'][$x]['total'] = array_sum($totalkri1[$a]);
										$_SESSION['total1'] += $_SESSION['nilaikahir1'][$x]['total'];
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nilai1[$x]\" value=\"";
										echo $_SESSION['nilaikahir1'][$x]['total'] = array_sum($totalkri1[$a]); echo "\">";
										$tot=array_sum($totalkri1[$a]);
										array_push($nilaipen1,"'".$tot."'");
										$_SESSION['nilaipie1'] = implode(",",$nilaipen1);
										
										
										echo "<input type=\"hidden\" class=\"form-control\" name=\"penilaiE1[$x]\" value=\"";
										echo $_SESSION['nilaikahir1'][$x]['penilaiE1'] = $b; echo "\">";
										$penilaiPie1= $_SESSION['nilaikahir1'][$x]['penilaiE1'];
										array_push($penilaiE1,"'".$penilaiPie1."'");
										$_SESSION['penilaiPie1'] = implode(",",$penilaiE1);
										
								}
										
							} }
								$totakhir = $_SESSION['total'];
								array_push($nilaipen,"'".$totakhir."'");
								$_SESSION['nilaichart'] = implode(",",$nilaipen);
								$perbandingantot= 'Total Nilai';
								array_push($penilaiE1,"'".$perbandingantot."'");
								$_SESSION['penilaiBar'] = implode(",",$penilaiE1);
								
								$totakhir1 = $_SESSION['total1'];
								array_push($nilaipen1,"'".$totakhir1."'");
								$_SESSION['nilaichart1'] = implode(",",$nilaipen1);

								echo "<tr><form action=\"\" method=\"POST\">";
									echo "<td colspan='2'><b>Total Akhir</b></td>";
										echo "<td><b>";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"totnilai\" value=\"";
										echo $_SESSION['total'] ; echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"periodepilih\" value=\"";
										echo $_SESSION['periode2'] ; echo "\">";
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nikkar\" value=\"";
										echo $_SESSION['nikpilih'] ; echo "\">";
										echo $_SESSION['total'] ;
										echo "</b></td>";
								echo "</tr>";
								
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
								} else if ($rat = '3'){
									$color='blue';
								} else if ($rat >= '0' && $rat <='2'){
									$color='red';
								} 
								
								?>
								<tr>
									<td colspan='3'><b>Rating Akhir - <span style="color:<?php echo $color;?>"><?php echo $ketrat;?></span></b></td>
								</tr>
								
								
								</form></tbody></table>
								
								
							<div class="card-body">
							
							
							
							</div>
								

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
								  type: 'bar', 
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
	$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, totalnilai AS skor FROM transaksi_penilaian b where periode='$periode' and status='1' GROUP BY nik ORDER by totalnilai asc";
	$result1 = mysqli_query($conn, $sql1);
	if (mysqli_num_rows($result1) > 0) {
	while($row = mysqli_fetch_assoc($result1)) {
		$nik = $row["nik"];
		$nama = $row["nama"];
		$skortop = $row["skor"];
		
		echo "<input type=\"hidden\" class=\"form-control\" name=\"nikkarTOP[$nik]\" value=\"";
		echo $_SESSION['skor'][$nik]['nikkar'] = $nik." - ".$nama; echo "\">";
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
										
										
	}	

?>
                                <!-- BAR CHART -->
								<div class="card card-success">
								  <div class="card-header">
									<h3 class="card-title">Nilai Karyawan Periode <?php echo $periode;?></h3>

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
								
								<table width="100%" class="table table-striped table-bordered table-hover"  style="text-align:center"  id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Karyawan</th>
                                        <th>Total Nilai</th>
                                        <th>Status</th>
										<th>Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, totalnilai, status from transaksi_penilaian a where a.periode='$periode' and status='' or a.periode='$periode' and status='1' group by a.nik order by nik";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"periode2\" value=\"";
										echo $row["periode"]; echo "\">";echo $row["periode"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"nikpilih\" value=\"";
										echo $row["nik"];echo "\">";echo $row["nik"].' '.$row["nama"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"totnilai\" value=\"";
										echo $row["totalnilai"];echo "\">";echo $row["totalnilai"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"status\" value=\"";
										echo $row["status"];echo "\">";if($row["status"]=='1'){echo "<b><span style=\"color:green\">Diterima</span></b>";}
										else if($row["status"]=='0'){echo "<b><span style=\"color:red\">Ditolak</span></b>";}
										else {echo "<b><span style=\"color:blue\">Menunggu Approval</span></b>";}
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
	
	$sqla = "SELECT periode FROM transaksi_penilaian where periode like '%$periodeYear' group by periode";
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
										<!--<th>Penilaian Menunggu Approval</th>-->
										<th>Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT periode from transaksi_penilaian a group by a.periode";
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
									
									/* $sqlc = "select count(*) as jumkar FROM (SELECT nik from transaksi_penilaian WHERE status='' and periode='$period' group by nik) as approve";
									$resultc = mysqli_query($conn, $sqlc);
									$rowc = mysqli_fetch_assoc($resultc); 
									$tunggu = $rowc['jumkar']; */
									
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"periode\" value=\"";
										echo $period; echo "\">";echo "<b>".$period."</b>";
										echo "</td>";
										echo "<td>";
										echo "<b>".$nikbelum."</b>";
										echo "</td>";
										echo "<td>";
										echo "<b>".$niksudah."</b>";
										echo "</td>";
										/* echo "<td>";
										echo "<b>".$tunggu."</b>";
										echo "</td>"; */
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
      "autoWidth": true
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
								  type: 'bar', 
								  data: barChartData0,
								  options: barChartOptions0
								})
	
});
	
</script>

</body>
</html>
