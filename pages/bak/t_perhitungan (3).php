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


if(isset($_POST['lihatdetail'])){

	$_SESSION['periode2'] = $periode2 = $_POST['periode2'];
	$_SESSION['nikpilih'] = $nikpilih = $_POST['nikpilih'];

?>
							<div class="row">
                             <div class="col-lg-6">
							 <!-- DONUT CHART -->
							<div class="card card-danger">
							  <div class="card-header">
								<h3 class="card-title">Grafik Pie</h3>

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
								<h3 class="card-title">Grafik Batang</h3>

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
							$nilaipen=array();
							$penilaiE=array();
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
								$sql1 = "SELECT kdkri, (select namkri from master_kriteria a where a.kdkri=b.kdkri) as namakriteria, sum(nilai) as nilai, 
								(select bobot from master_bobot a where a.kdpenilai=b.kdpenilai and a.kdkri = b.kdkri group by kdkri and kdpenilai) as bobot, 
								(SELECT COUNT(kdsub) from master_subkriteria a WHERE a.kdkri = b.kdkri) as jumsub from detail_nilai b 
								where kdpenilai='$a' and kdnilai in (SELECT kdnilai from transaksi_penilaian WHERE nik='$nikpilih' and periode='$periode2') group by kdkri";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										$x = $row["kdkri"];
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td>";
										$kriteria[$x] = $row["kdkri"]; echo " ".$row["namakriteria"]; 
										echo "</td>";
										echo "<td> ";
										echo $nilai[$x] = $row["nilai"];
										echo "</td>";
										$jumsub[$x] = $row['jumsub'];
										$botkri[$x] = $row['bobot'];
										$totalkri[$x] = ($nilai[$x] / $jumsub[$x]) * ($botkri[$x]/100);
										echo "<td>";  echo $totalkri[$x];
										echo "</td>";
										echo "</form></tr>";
									}
									echo "<tr>";
									echo "<td colspan='2'><b>Sub Total Nilai</b></td>";
										echo "<td><b>";
										echo $_SESSION['nilaikahir'][$x]['total'] = array_sum($totalkri);
										$_SESSION['total'] += $_SESSION['nilaikahir'][$x]['total'];
										echo "<input type=\"hidden\" class=\"form-control\" name=\"nilai[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$x]['total'] = array_sum($totalkri); echo "\">";
										$tot=array_sum($totalkri);
										array_push($nilaipen,"'".$tot."'");
										$_SESSION['nilaipie'] = implode(",",$nilaipen);
										//echo $_SESSION['nilaipie'];
										//print_r($nilaipen);
										
										
										echo "<input type=\"hidden\" class=\"form-control\" name=\"penilaiE[$x]\" value=\"";
										echo $_SESSION['nilaikahir'][$x]['penilaiE'] = $b; echo "\">";
										$penilaiPie= $_SESSION['nilaikahir'][$x]['penilaiE'];
										array_push($penilaiE,"'".$penilaiPie."'");
										$_SESSION['penilaiPie'] = implode(",",$penilaiE);
										//echo $_SESSION['penilaiPie'];
										//print_r($nilaipen);
										
										echo "</b></td>";
									echo "</tr>";
								}
										
							} }
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
									
								
								?>
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
									  echo $_SESSION['penilaiPie'];
								  ?>],
								  datasets: [
									{
									  label               : 'Nilai',
									  backgroundColor     : 'rgba(60,141,188,0.9)',
									  borderColor         : 'rgba(60,141,188,0.8)',
									  pointRadius          : false,
									  pointColor          : '#3b8bba',
									  pointStrokeColor    : 'rgba(60,141,188,1)',
									  pointHighlightFill  : '#fff',
									  pointHighlightStroke: 'rgba(60,141,188,1)',
									  data                : [ <?php
									  echo $_SESSION['nilaipie'];
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
	

?>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Periode</th>
                                        <th style="text-align:center">Karyawan</th>
                                        <th style="text-align:center">Total Nilai</th>
										<th style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, totalnilai, status from transaksi_penilaian a where a.periode='$periode' and a.totalnilai!='0' and a.status='1' group by a.nik";
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
	

?>
                               
								<table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Periode</th>
										<th style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT periode from transaksi_penilaian a group by a.periode";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"periode\" value=\"";
										echo $row["periode"]; echo "\">";echo $row["periode"];
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
	
});
	
</script>
</body>
</html>
