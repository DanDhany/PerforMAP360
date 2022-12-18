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
  <title>PerforMAP360 | Laporan Rekapitulasi Penilaian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
	
	$("#bagianlist").DataTable({
      "responsive": true,
      "autoWidth": true,
	  //"order": [[ 2, "desc" ]],
	  //"aoColumnDefs": [
      //  { "bSortable": false, "aTargets": [ 1 ] }
	  //]
    });
	 $('#karyawan').select2({
		placeholder:"Pilih Karyawan"
	})
	$('#Bagian1').select2({
		placeholder:"Pilih Bagian"
	})
	$('#periode1').select2({
		placeholder:"Pilih Periode Mulai"
	})
	$('#periode2').select2({
		placeholder:"Pilih Periode Selesai"
	})
	$('#jumlahdata').select2({
		placeholder:"Pilih Jumlah Data"
	})
	

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
            <h1>Laporan Rekapitulasi Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Laporan Rekapitulasi Penilaian</li>
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
            <div class="card card-primary no-print">
              <div class="card-header">
                <h3 class="card-title">Form Detail Rekap</h3>
			  <div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
             </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
								
                                    <form role="form" action="" method="POST">
                                        <div class="row">
										<div class="col-lg-6">
										<label>Masukkan Detail Rekap</label>
                                        <div class="form-group">
											<label>Filter Karyawan : </label>
											<select class="form-control select2" name="karyawan" id="karyawan" onchange="detailKar(this.value)">
											<option value="ALL">Semua Karyawan</option>
											<?php
											
													$query = "select nik, nama_lengkap, bagian from master_karyawan where nik in (select nik from transaksi_penilaian)";
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
											<label>Filter Bagian : </label>
											<select class="form-control select2" name="bagian" id="Bagian1" onchange="detailBag(this.value)">
											<option value="ALL">Semua Bagian</option>
											<?php
											$query = "select * from master_bagian where nambag in (select bagian from master_karyawan where nik in (select nik from transaksi_penilaian))";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['nambag']."'>".$data1['nambag']."</option>";
											$muncul.= "detail1['" . $data1['nambag'] . "'] = {kdbag:'" . addslashes($data1['kdbag']) .  "', nambag:'" . addslashes($data1['nambag']) .  "'};\n";
											}
											?>
											</select>
                                        </div>
										<div class="form-group">
											<label>Jumlah Data Yang Ditampilkan : </label>
											<select class="form-control select2" name="jumlahdata" id="jumlahdata" required>
											<option value="all">Semua Data</option>
											<option value="5">5</option>
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="50">50</option>
											<option value="100">100</option>
											</select>
                                        
										</div>
                                        </div>
										<div class="col-lg-6">
										<label>Masukkan Detail Periode</label>
										<div class="form-group">
										
                                        
											<label>Periode Mulai : </label>
											<select class="form-control select2" name="periode1" id="periode1" required>
											<option value=""></option>
											<?php
											
													$query = "select distinct periode from transaksi_penilaian where status='1' order by periode asc";
													$tampil = mysqli_query($conn, $query);
													while($data1 = mysqli_fetch_array($tampil))
													{
													echo "<option value='".$data1['periode']."'>".tgl_indo($data1['periode'])."</option>";
													}
											?>
											</select>
										</div>
										<div class="form-group">
											<label>Periode Selesai : </label>
											<select class="form-control select2" name="periode2" id="periode2" required>
											<option value=""></option>
											<?php
											
													$query = "select distinct periode from transaksi_penilaian where status='1' order by periode asc";
													$tampil = mysqli_query($conn, $query);
													while($data1 = mysqli_fetch_array($tampil))
													{
													echo "<option value='".$data1['periode']."'>".tgl_indo($data1['periode'])."</option>";
													}
											?>
											</select>
                                        
										</div>
										
										</div>
										</div>
                                        
                                        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
										<a href="" class="btn btn-primary">Reset</a></br></br>
										<span style="color:red"><b>Untuk Mencetak Laporan Tekan CTRL+P atau gunakan fungsi Print pada Browser anda</span></b>
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
            
			<div class="card">
							
                <?php
				if(isset($_POST['print'])){
				?>
				<script>
				  window.print();
				</script>
				<?php
				}
				if(isset($_POST['simpan'])){
				if($_POST['periode2']<$_POST['periode1']){
					echo "<script>toastr.error(\"Cek Periode Anda!\")</script>";
				} else {
					$mulai =  $_POST['periode1'];
					$selesai = $_POST['periode2'];
					$karyawan = $_POST['karyawan'];
					$bagian =  $_POST['bagian'];
					$jumdata =  $_POST['jumlahdata'];
					$nikaryawan=array();
					$skor=array();
					$rangking=1;
					
					$sqlc = "select count(distinct periode)as jum from transaksi_penilaian where status = '1' and periode between '$mulai' and '$selesai' order by periode desc";
					$resulta= mysqli_query($conn, $sqlc);
					$rowcek = mysqli_fetch_assoc($resulta);
					$jumperiode = $rowcek['jum'];
					
					if ($jumdata!='all'){
						if ($karyawan !='ALL' && $bagian =='ALL'){
						$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, periode, totalnilai AS skor FROM transaksi_penilaian b where nik in (SELECT nik from master_karyawan where nik ='$karyawan') and periode between '$mulai' and '$selesai' and status='1' GROUP BY periode ORDER by periode desc limit $jumdata";
						} else if ($karyawan =='ALL' && $bagian !='ALL'){
						$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, sum(DISTINCT totalnilai) AS skor FROM transaksi_penilaian b where nik in (SELECT nik from master_karyawan where bagian ='$bagian') and periode between '$mulai' and '$selesai' and status='1' GROUP BY nik ORDER by skor desc limit $jumdata";
						} else if ($karyawan =='ALL' && $bagian =='ALL'){
						$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, sum(DISTINCT totalnilai) AS skor FROM transaksi_penilaian b where periode between '$mulai' and '$selesai' and status='1' GROUP BY nik ORDER by skor desc limit $jumdata";
						}
					} else if ($jumdata='all'){
						if ($karyawan !='ALL' && $bagian =='ALL'){
						$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, periode, totalnilai AS skor FROM transaksi_penilaian b where nik in (SELECT nik from master_karyawan where nik ='$karyawan') and periode between '$mulai' and '$selesai' and status='1' GROUP BY periode ORDER by periode desc";
						} else if ($karyawan =='ALL' && $bagian !='ALL'){
						$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, sum(DISTINCT totalnilai) AS skor FROM transaksi_penilaian b where nik in (SELECT nik from master_karyawan where bagian ='$bagian') and periode between '$mulai' and '$selesai' and status='1' GROUP BY nik ORDER by skor desc";
						} else if ($karyawan =='ALL' && $bagian =='ALL'){
						$sql1 = "SELECT nik,(select Nama_Lengkap from master_karyawan a where a.nik=b.nik) as nama, sum(DISTINCT totalnilai) AS skor FROM transaksi_penilaian b where periode between '$mulai' and '$selesai' and status='1' GROUP BY nik ORDER by skor desc";
						}
					} 
					
					 
					$result1 = mysqli_query($conn, $sql1);
					if (mysqli_num_rows($result1) > 0) {
					while($row = mysqli_fetch_assoc($result1)) {
						if ($karyawan !='ALL' && $bagian =='ALL'){
						$nik = '';
						$nama = tgl_indo($row["periode"]);
						$skortop = round($row["skor"],3);
						} else{
						$nik = $row["nik"]." - ";
						$nama = $row["nama"]." - (".($rangking++).")";
						$skortop = round($row["skor"]/$jumperiode,3);
						}
						
						
						echo "<input type=\"hidden\" class=\"form-control\" name=\"nikkarTOP[$nik]\" value=\"";
						echo $_SESSION['skorL'][$nik]['nikkarL'] = $nama; echo "\">";
						$nikarya= $_SESSION['skorL'][$nik]['nikkarL'];
						array_push($nikaryawan,"'".$nikarya."'");
						$_SESSION['nikkartopL'] = implode(",",$nikaryawan);
						//print_r ($nikaryawan);
						
						echo "<input type=\"hidden\" class=\"form-control\" name=\"skorTOP[$nik]\" value=\"";
						echo $_SESSION['skorL'][$nik]['skortopL'] = $skortop; echo "\">";
						$skorBIG= $_SESSION['skorL'][$nik]['skortopL'];
						array_push($skor,"'".$skorBIG."'");
						$_SESSION['skorkarL'] = implode(",",$skor);
						//print_r ($skor);
					}
														
														
					}	else{
						unset ($_SESSION['skorL']);
						unset ($_SESSION['nikkartopL']);
						unset ($_SESSION['skorkarL']);
					}
								if ($jumdata!='all'){
									if ($karyawan !='ALL' && $bagian =='ALL'){
									$sql3 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, totalnilai, (SELECT bagian from master_karyawan b where b.nik=a.nik )  as nambag from transaksi_penilaian a where nik ='$karyawan' and periode between '$mulai' and '$selesai' and status='1' GROUP BY periode order by periode desc limit $jumdata";
									$keterangan = "Periode";
									$grafik = "Kinerja";
									
									} else if ($karyawan =='ALL' && $bagian !='ALL'){
									$sql3 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as totalnilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where  nik in (SELECT nik from master_karyawan where bagian ='$bagian') and periode between '$mulai' and '$selesai' and status='1' group by nik order by totalnilai desc limit $jumdata";
									$keterangan = "Bagian";
									$grafik = "Perangkingan";
									} else if ($karyawan =='ALL' && $bagian =='ALL'){
									$sql3 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as totalnilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where periode between '$mulai' and '$selesai' and status='1' group by nik order by totalnilai desc limit $jumdata";
									$keterangan = "Bagian";
									$grafik = "Perangkingan";
									} 
								} else if ($jumdata='all'){
									if ($karyawan !='ALL' && $bagian =='ALL'){
									$sql3 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, totalnilai, (SELECT bagian from master_karyawan b where b.nik=a.nik )  as nambag from transaksi_penilaian a where nik ='$karyawan' and periode between '$mulai' and '$selesai' and status='1' GROUP BY periode order by periode desc";
									$keterangan = "Periode";
									$grafik = "Kinerja";
									} else if ($karyawan =='ALL' && $bagian !='ALL'){
									$sql3 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as totalnilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where  nik in (SELECT nik from master_karyawan where bagian ='$bagian') and periode between '$mulai' and '$selesai' and status='1' group by nik order by totalnilai desc";
									$keterangan = "Bagian";
									$grafik = "Perangkingan";
									} else if ($karyawan =='ALL' && $bagian =='ALL'){
									$sql3 = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as totalnilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where periode between '$mulai' and '$selesai' and status='1' group by nik order by totalnilai desc";
									$keterangan = "Bagian";
									$grafik = "Perangkingan";
									} 
								}	
				echo "
				<div class=\"card-body\">
                                <div class=\"col-lg-12\">
							</br>
							<h2 style=\"text-align:center\">
								<img width=\"60px\" height=\"60px\" src=\"../../dist/img/newtown.png\"
								alt=\"AdminLTE Logo\"
								class=\"brand-image img-square\">PT SYAHID HUSADA DEWATA
								<h5 style=\"text-align:center\">Laporan Rekap Kinerja
							  </div>
							</div>
				<div class=\"card-header border-0\">
				<table width=\"100%\" class=\"table table-striped table-bordered table-hover\">
                            <thead>
                                    <tr>
										<th style=\"text-align:center\" colspan='3'>Rekapitulasi Kinerja Periode ".tgl_indo($mulai)." s.d. ".tgl_indo($selesai)."</th>
									</tr>
                            </thead>
				</table>
                <div class=\"d-flex justify-content-between\">
				<h3 class=\"card-title\">Grafik ".$grafik."</h3>
				</div>
				
              </div>
              <div class=\"card-body\">
                <div class=\"chart\">
				<canvas id=\"sales-chart1\" style=\"min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;\"></canvas>";
				
				echo "</div>
				<div class=\"d-flex flex-row justify-content-end\">
                  <span class=\"mr-2\">
                    <i class=\"fas fa-square text-primary\"></i> Nilai Karyawan
                  </span>
                </div>";
								
				?>
				</br>
				<h3 class="card-title">Detail Grafik</h3></br></br>
              <table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
										
										<th style="text-align:center" >Rangking Karyawan</th>
										<th style="text-align:center" >Keterangan <?php echo " [".$keterangan."]"?></th>
										<th style="text-align:center" >Rata-Rata Nilai</th>
										</tr>
                                </thead>
								<tbody>
								<?php
								$nilaiminXZ = 5;
								$nilaimaxXZ = 0;
								$_SESSION['nilaimaxXZ'] = '';
								$_SESSION['karNIKMax'] = '';
								$_SESSION['karNamaMax'] = '';
								$_SESSION['nilaiminXZ'] = '';
								$_SESSION['karNIKMin']= '';
								$_SESSION['karNamaMin'] = '';
								
								if ($karyawan !='ALL' && $bagian =='ALL'){
									
									$sqlXZ = "SELECT a.nik as nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, max(totalnilai) as totalnilai from transaksi_penilaian a where a.nik ='$karyawan' and periode between '$mulai' and '$selesai' and status='1'";
									$resultXZ= mysqli_query($conn, $sqlXZ);
									$row = mysqli_fetch_assoc($resultXZ);
										$nik = $row['nik'];
										$namakamu = $row{'nama'};
										$periodeA = $row{'periode'};
										$total = $row{'totalnilai'};
									
									$sqlXY = "SELECT a.nik as nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, min(totalnilai) as totalnilai from transaksi_penilaian a where a.nik ='$karyawan' and periode between '$mulai' and '$selesai' and status='1'";
									$resultXY= mysqli_query($conn, $sqlXY);
									$rowX = mysqli_fetch_assoc($resultXY);
										
										$periodeX = $rowX{'periode'};
										$totalX = $rowX{'totalnilai'};
									$kesimpulan = "Karyawan dengan Nama ".$namakamu." memiliki <span style=\"color:green\">nilai tertingi</span> dengan total nilai <span style=\"color:green\">".$total."</span> dan <span style=\"color:red\">nilai terendah</span> dengan total nilai <span style=\"color:red\">".$totalX."</span>";
									
									} else if ($karyawan =='ALL' && $bagian !='ALL'){
									
									$sqla = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as nilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where  nik in (SELECT nik from master_karyawan where bagian ='$bagian') and periode between '$mulai' and '$selesai' and status='1' group by nik  having (SELECT max(NILAI) FROM (SELECT  sum(DISTINCT totalnilai) as nilai from transaksi_penilaian GROUP by nik)g) order by nilai desc limit 1";
									$resulta= mysqli_query($conn, $sqla);
									$rowX = mysqli_fetch_assoc($resulta);
									$nikX = $rowX['nik'];
									$namakamuX = $rowX{'nama'};
									$totalX= round($rowX["nilai"]/$jumperiode,3);
									$bagianX = $rowX{'nambag'};
									
									$sqlb = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as nilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where  nik in (SELECT nik from master_karyawan where bagian ='$bagian') and periode between '$mulai' and '$selesai' and status='1' group by nik  having (SELECT MIN(NILAI) FROM (SELECT  sum(DISTINCT totalnilai) as nilai from transaksi_penilaian GROUP by nik)g) order by nilai asc limit 1";
									$resultb= mysqli_query($conn, $sqlb);
									$rowY = mysqli_fetch_assoc($resultb);
									$nikY = $rowY['nik'];
									$namakamuY = $rowY{'nama'};
									$totalY= round($rowY["nilai"]/$jumperiode,3);
									$bagianY = $rowY{'nambag'};
									
									$kesimpulan = "Hasil rekapitulasi dari Bagian ".$bagianX.". Menunjukkan bahwa karyawan dengan <span style=\"color:green\">nilai tertinggi</span> diperoleh ".$namakamuX." dengan total nilai <span style=\"color:green\">".$totalX."</span> dan karyawan dengan <span style=\"color:red\">nilai terendah</span> diperoleh ".$namakamuY." dengan total nilai <span style=\"color:red\">".$totalY."</span>";
									
									} else if ($karyawan =='ALL' && $bagian =='ALL'){
									$sqla = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as nilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where periode between '$mulai' and '$selesai' and status='1' group by nik  having (SELECT max(NILAI) FROM (SELECT  sum(DISTINCT totalnilai) as nilai from transaksi_penilaian GROUP by nik)g) order by nilai desc limit 1";
									$resulta= mysqli_query($conn, $sqla);
									$rowX = mysqli_fetch_assoc($resulta);
									$nikX = $rowX['nik'];
									$namakamuX = $rowX{'nama'};
									$totalX= round($rowX["nilai"]/$jumperiode,3);
									$bagianX = $rowX{'nambag'};
									
									$sqlb = "SELECT a.nik, (select Nama_Lengkap from master_karyawan b where b.nik=a.nik group by nik) as nama, periode, sum(DISTINCT totalnilai) as nilai, (SELECT bagian from master_karyawan b where b.nik=a.nik ) as nambag from transaksi_penilaian a where periode between '$mulai' and '$selesai' and status='1' group by nik  having (SELECT MIN(NILAI) FROM (SELECT  sum(DISTINCT totalnilai) as nilai from transaksi_penilaian GROUP by nik)g)order by nilai asc limit 1";
									$resultb= mysqli_query($conn, $sqlb);
									$rowY = mysqli_fetch_assoc($resultb);
									$nikY = $rowY['nik'];
									$namakamuY = $rowY{'nama'};
									$totalY= round($rowY["nilai"]/$jumperiode,3);
									$bagianY = $rowY{'nambag'};
									
									$kesimpulan = "Hasil rekapitulasi menunjukkan bahawa karyawan dengan <span style=\"color:green\">nilai tertinggi</span> diperoleh ".$namakamuX." dari bagian ".$bagianX."dengan total nilai <span style=\"color:green\">".$totalX."</span> dan karyawan dengan <span style=\"color:red\">nilai terendah</span> diperoleh ".$namakamuY." dari bagian ".$bagianY." dengan total nilai <span style=\"color:red\">".$totalY."</span>";
									
									}
								
								$rangkingtab=1;
								$result3 = mysqli_query($conn, $sql3);
								if (mysqli_num_rows($result3) > 0) {
									while($row = mysqli_fetch_assoc($result3)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										
										echo "<td style=\"text-align:left\" > <input type=\"hidden\" class=\"form-control\" name=\"nikpilih\" value=\"";
										echo $row["nik"];echo "\">";echo $rangkingtab++.' - ['.$row["nik"].'] '.$row["nama"];
										echo "</td>";
										echo "<td style=\"text-align:center\"> <input type=\"hidden\" class=\"form-control\" name=\"status\" value=\"";
										echo $row["nambag"];echo "\">";
										if ($karyawan !='ALL' && $bagian =='ALL'){
										echo tgl_indo($row["periode"]);
										} else{
										echo "Bag. ".$row["nambag"];
										}
										echo "</td>";
										echo "<td style=\"text-align:center\"> <input type=\"hidden\" class=\"form-control\" name=\"totnilai\" value=\"";
										echo $row["totalnilai"];echo "\">";
										if ($karyawan !='ALL' && $bagian =='ALL'){
										$totalrekap=round($row["totalnilai"],3);
										} else{
										$totalrekap= round($row["totalnilai"]/$jumperiode,3);
										}
										$ratx = $totalrekap;
										if ($ratx >= '4' && $ratx<= '5'){
											$color='green';
											} else if ($ratx >= '3' && $ratx < '4'){
											$color='blue';
											}else if ($ratx >= '0' && $ratx <'3'){
											$color='red';
											}
										
										?>
										<b><span style="color:<?php echo $color;?>"><?php echo $totalrekap;?></span>
										<?php
										echo "</td>";
										echo "</form></tr>";
									}
								} else {
									echo "0 results";
								}
								echo "</tbody></table>";
								echo "<br>";
								echo "<b>Kesimpulan: ";
								echo "<br>";
								echo $kesimpulan;
								echo "<br>";
								echo "<br>";
								mysqli_close($conn);
			?>		
			
			<?php
					
									
									
			?>
				<table class='no-print' width="100%">
				<tr>
				<td colspan='2'><b>Keterangan:
				<b>
				<br>1. Standar Minimal Kinerja tercapai apabila karyawan memiliki total nilai minimal 3 (tiga), jika karyawan mendapat nilai kurang dari 3 (tiga) maka keryawan yang bersangkutan perlu mengikuti pembinaan lebih lanjut.
				<br>2. Warna <span style="color:green">Hijau</span> pada total nilai menunjukan Standar Minimal Kinerja telah tercapai lebih, Karyawan yang bersangkutan memiliki performa dan kinerja yang sangat baik dengan nilai diatas standar minimal   
				<br>3. Warna <span style="color:blue">Biru</span> pada total nilai menunjukan Standar Minimal Kinerja tercapai, Karyawan yang bersangkutan memiliki performa dan kinerja sesuai dengan stardar minimal
				<br>4. Warna <span style="color:red">Merah</span> pada total nilai menunjukan Standar Minimal Kinerja belum tercapai sepenuhnya, Karyawan yang bersangkutan perlu dibina lebih lanjut karena tidak memenuhi standar minimal kinerja
				</b></td>
				</tr>
				</table>
			<?php
				}	}
			?>
              </div>
            </div>
           
            
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

<script type="text/javascript">
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

var $salesChart = $('#sales-chart1')
  var salesChart  = new Chart($salesChart, {
    type   : 'horizontalBar',
    data   : {
      labels  : [<?php echo $_SESSION['nikkartopL'];?>],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [<?php echo $_SESSION['skorkarL'];?>]
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
            beginAtZero: false,

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
  
})
</script>
</body>
</html>
