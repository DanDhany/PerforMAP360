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
  <title>PerforMAP360 | Master Karyawan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


<script type="text/javascript">
$(document).ready(function () {
	
  bsCustomFileInput.init();
});
$(function () {
	//Initialize Select2 Elements
    $('#Bagian1').select2({
		placeholder:"Pilih Bagian"
	})
	$('#Jabatan').select2({
		placeholder:"Pilih Jabatan"
	})
	$('#nikatasan').select2({
		placeholder:"Pilih Atasan"
	})
	
	$("#karyawanlist").DataTable({
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
            <h1>Master Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Master Karyawan</li>
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
                <h3 class="card-title">Form Detail Karyawan</h3>
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
								$bagian = "Karyawan";
								

								if(isset($_POST['submit'])){
								$cekNama = ucwords(strtolower($_POST['Nama_Lengkap']));
								
								$sqlc = "select count(*)as jum from Master_Karyawan where Nama_Lengkap like '%$cekNama%'";
								$resulta= mysqli_query($conn, $sqlc);
								$rowcek = mysqli_fetch_assoc($resulta);
								if ($rowcek['jum']==0){
									
								$bagian = $_POST['Bagian'];
								$sqlc = "select count(*)as jum from Master_Karyawan where Bagian='$bagian'";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								if($row["jum"]==0){
								$jumlahrecord= $_POST['nik'].".1";	
								}
								else {
								$jumlahrecord= $_POST['nik'].".".($row["jum"]+1);
								}
									
									$error = $_FILES['foto']['error']; // Menyimpan jumlah error ke variabel $error
 
									// Validasi error
									if($error == 0){
										$ukuran_file = $_FILES['foto']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
								 
										// Validasi ukuran file
										if($ukuran_file <= 1000000){
											$nama_file = $_FILES['foto']['name']; // Menyimpan nama file ke variabel $nama_file
											$format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
								 
											// Validasi format
											if( ($format == "jpg")){
												$foto = $_FILES['foto']['name'];
												$tmp = $_FILES['foto']['tmp_name'];
												$i = date('dmYHis')."_".$foto;
												$path = "foto/".$i;
												$upload = move_uploaded_file($tmp,$path); // Proses upload. Menghasilkan nilai true jika upload berhasil
								 
												// Validasi upload (hasil true jika upload berhasil)
												
													
												if($upload == true){
													$a = $jumlahrecord;
													$b = ucwords(strtolower($_POST['Nama_Lengkap']));
													$c = $_POST['Password'];
													$d = $_POST['alamat'];
													$e = $_POST['telp'];
													$f = $_POST['Jenis_Kelamin'];
													$g = $_POST['lahir'];
													$h = $_POST['Bagian'];
													$i = $_POST['Jabatan'];
													$j = $_POST['nikatasan'];
													
												$sql = "INSERT INTO Master_Karyawan
												VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$path')";
												$result = mysqli_query($conn, $sql);
												echo "<script>toastr.success(\"Tambah data sukses!\")</script>";
												}else{ // else upload gagal
													echo "<script>toastr.error(\"Tambah data gagal!\")</script>";
												}
								 
											}else{ // else validasi format
												echo "<script>toastr.warning(\"Format harus jpg.\")</script>";
											}
								 
										}else{ // else validasi ukuran file
											echo "<script>toastr.warning(\"Ukuran file kamu ".$ukuran_file.", file tidak boleh lebih dari 1MB\")</script>";
										}
								 
									}else{ // else validasi error
										echo "<script>toastr.error(\"Ada '.$error.' error. Gagal upload. Pastikan Format .JPG dan Ukuran dibawah 1MB\")</script>";
									}
								}	
								else{
									echo "<script>toastr.error(\"Nama karyawan sudah ada!\")</script>";
								}
								}

								if(isset($_POST['delete'])){
									$a = $_POST['nik'];
									
								$sql1 = "Delete from Master_Karyawan where nik='$a'";
								mysqli_query($conn, $sql1);
								$sqlc = "select count(*)as jum from Master_Karyawan";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								echo "<script>toastr.success(\"Hapus data berhasil!\")</script>";
								}

								if(isset($_POST['submitupdate'])){
									$foto = $_FILES['foto']['name'];
									$tmp = $_FILES['foto']['tmp_name'];
									$i = date('dmYHis')."_".$foto;
									$path = "foto/".$i;
									
									if($foto==''){
													$a = $_POST['nik'];
													$b = ucwords(strtolower($_POST['Nama_Lengkap']));
													$c = $_POST['Password'];
													$d = $_POST['alamat'];
													$e = $_POST['telp'];
													$f = $_POST['Jenis_Kelamin'];
													$g = $_POST['lahir'];
													$h = $_POST['Bagian'];
													$i = $_POST['Jabatan'];
													$j = $_POST['nikatasan'];
									
													$sql2 = "update Master_Karyawan
													set Nama_Lengkap='$b', Password='$c', Alamat='$d', Telp='$e', Jenis_Kelamin='$f',  Tgl_Lahir='$g', Bagian='$h', Jabatan='$i', NIKatasan='$j' where NIK='$a'";
													mysqli_query($conn, $sql2);
													$sqlc = "select count(*)as jum from Master_Karyawan";
													$result1= mysqli_query($conn, $sqlc);
													$row = mysqli_fetch_assoc($result1);
													echo "<script>toastr.success(\"Ubah Data Sukses!\")</script>";
									} else{
									
									$error = $_FILES['foto']['error']; // Menyimpan jumlah error ke variabel $error
 
									// Validasi error
									if($error == 0){
										$ukuran_file = $_FILES['foto']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
								 
										// Validasi ukuran file
										if($ukuran_file <= 1000000){
											$nama_file = $_FILES['foto']['name']; // Menyimpan nama file ke variabel $nama_file
											$format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
								 
											// Validasi format
											if( ($format == "jpg")){
												
												$upload = move_uploaded_file($tmp,$path); // Proses upload. Menghasilkan nilai true jika upload berhasil
												
								 
												// Validasi upload (hasil true jika upload berhasil)
												if($upload == true){
													$a = $_POST['nik'];
													$b = ucwords(strtolower($_POST['Nama_Lengkap']));
													$c = $_POST['Password'];
													$d = $_POST['alamat'];
													$e = $_POST['telp'];
													$f = $_POST['Jenis_Kelamin'];
													$g = $_POST['lahir'];
													$h = $_POST['Bagian'];
													$i = $_POST['Jabatan'];
													$j = $_POST['nikatasan'];
													
													
													$sql2 = "update Master_Karyawan
													set Nama_Lengkap='$b', Password='$c', Alamat='$d', Telp='$e', Jenis_Kelamin='$f',  Tgl_Lahir='$g', Bagian='$h', Jabatan='$i', NIKatasan='$j',  foto='$path' where NIK='$a'";
													mysqli_query($conn, $sql2);
													$sqlc = "select count(*)as jum from Master_Karyawan";
													$result1= mysqli_query($conn, $sqlc);
													$row = mysqli_fetch_assoc($result1);
												
													echo "<script>toastr.success(\"Ubah Data Sukses!\")</script>";
												}else{ // else upload gagal
													echo "<script>toastr.error(\"Ubah Data Gagal!\")</script>";
												}
								 
											}else{ // else validasi format
												echo "<script>toastr.warning(\"Format harus jpg.\")</script>";
											}
								 
										}else{ // else validasi ukuran file
											echo "<script>toastr.warning(\"Ukuran file kamu ".$ukuran_file.", file tidak boleh lebih dari 1MB\")</script>";
										}
								 
									}else{ // else validasi error
										echo "<script>toastr.error(\"Ada '.$error.' error. Gagal upload. Pastikan Format .JPG dan Ukuran dibawah 1MB\")</script>";
									}
									
									}
									
								
								}

								if(isset($_POST['update'])){
									$a1 = $_POST['nik'];
									$b1 = $_POST['Nama_Lengkap'];
									$c1 = $_POST['Password'];
									$d1 = $_POST['alamat'];
									$e1 = $_POST['telp'];
									$f1 = $_POST['Jenis_Kelamin'];
									$g1 = $_POST['lahir'];
									$h1 = $_POST['Bagian'];
									$i1 = $_POST['Jabatan'];
									$j1 = $_POST['nikatasan'];
									$k1 = $_POST['Foto'];
								?>
										<form role="form" action="" method="POST" enctype="multipart/form-data">
										<div class="form-group">
                                            <label>Bagian </label>
											<select class="form-control select2" name="Bagian" id="Bagian1" onchange="detailBag(this.value)" required>
											<option value="<?php echo $h1; ?>" selected><?php echo $h1; ?> (Data Saat Ini)</option>
											<?php
											$query = "select * from master_bagian";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['nambag']."'>".$data1['nambag']."</option>";
											$muncul.= "detail1['" . $data1['nambag'] . "'] = {kdbag:'" . addslashes($data1['kdbag']) .  "', nambag:'" . addslashes($data1['nambag']) .  "'};\n";
											}
											?>
												<script type="text/javascript">    
												<?php echo $muncul; ?>  
												function detailBag(Bagian){  
												document.getElementById('nik').value = detail1[Bagian].kdbag;
												};  
												</script>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Jabatan </label>
											<select class="form-control select2" name="Jabatan" id="Jabatan" required>
											<option value="<?php echo $i1; ?>" selected><?php echo $i1; ?> (Data Saat Ini)</option>
											<?php
											$query = "select * from master_jabatan";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['namjab']."'>".$data1['namjab']."</option>";
											}
											?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Atasan (NIK)</label>
											<select class="form-control select2" name="nikatasan" id="nikatasan" required>
											<option value="<?php echo $j1; ?>" selected><?php echo $j1; ?> (Data Saat Ini)</option>
											<?php
											$a = $_POST['Bagian'];
											$query = "SELECT * FROM `master_karyawan` WHERE `Jabatan` REGEXP 'direktur|manajer|kepala'";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['NIK']."'>".$data1['NIK']." ".$data1['Nama_Lengkap']."</option>";
											}
											?>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input class="form-control" name="nik" value="<?php echo $a1; ?>" readonly >
                                        </div>
										<div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" name="Nama_Lengkap" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Password (Alfa Numerik 6 s/d 8 Karakter)</label>
                                            <input type="Password" class="form-control" pattern=".{6,}" title="Password harus 6 s/d 8 Karakter" maxlength="8"  name="Password" value="<?php echo $c1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label><br>
                                            <textarea name="alamat" class="form-control" required><?php echo $d1; ?></textarea>
                                        </div>
										<div class="form-group">
                                            <label>Telp</label>
                                            <input type="text" pattern="[0-9]{10,}" title="Masukkan no. telpon yang valid" class="form-control" name="telp" value="<?php echo $e1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
											<input type="radio" name="Jenis_Kelamin" value="Laki-Laki" <?php if($f1=="Laki-Laki"){echo "checked";}?>> Laki-Laki <input type="radio" name="Jenis_Kelamin" value="Perempuan" <?php if($f1=="Perempuan"){echo "checked";}?>> Perempuan
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="lahir" value="<?php echo $g1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Foto Karyawan <span style="color:red">(FORMAT HARUS *.JPG UKURAN MAX. 1MB)</span></label>
										</div>
										<div class="form-group">
											<?php
											echo "<img class=/'form-control/'  src='$i1' width='100px' />";
											?>
                                            <input type="file" class="custom-file" name="foto" id="foto" value="<?php echo $k1; ?>" placeholder="">
                                        </div>
										
                                        
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <a href="" class="btn btn-primary">Reset</a>
                                    </form>

									<?php
									}
									else{
									?>
									
                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
										<div class="form-group">
										<label>Bagian</label>
											<select class="form-control select2" name="Bagian" id="Bagian1" onchange="detailBag(this.value)" required>
											<option value=""></option>
											<?php
											$query = "select * from master_bagian";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['nambag']."'>".$data1['nambag']."</option>";
											$muncul.= "detail1['" . $data1['nambag'] . "'] = {kdbag:'" . addslashes($data1['kdbag']) .  "', nambag:'" . addslashes($data1['nambag']) .  "'};\n";
											}
											?>
												<script type="text/javascript">    
												<?php echo $muncul; ?>  
												function detailBag(Bagian){  
												document.getElementById('nik').value = detail1[Bagian].kdbag;
												};  
												</script>
											</select>
											
										</div>
										<div class="form-group">
										<label>Jabatan</label>
											<select class="form-control select2" name="Jabatan" id="Jabatan" required>
											<option value=""></option>
											<?php
											$query = "select * from master_jabatan";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['namjab']."'>".$data1['namjab']."</option>";
											}
											?>
											</select>
											
										</div>
										<div class="form-group">
										<label>Atasan(NIK)</label>
											<select class="form-control select2" name="nikatasan" id="nikatasan" required>
											<option value=" "> </option>
											<?php
											$a = $_POST['Bagian'];
											$query = "SELECT * FROM `master_karyawan` WHERE `Jabatan` REGEXP 'direktur|manajer|kepala'";
											$tampil = mysqli_query($conn, $query);
											$muncul = "var detail1 = new Array();\n";
											while($data1 = mysqli_fetch_array($tampil))
											{
											echo "<option value='".$data1['NIK']."'>".$data1['NIK']." ".$data1['Nama_Lengkap']."</option>";
											}
											?>
											</select>
											
										</div>
                                        <div class="form-group" hidden>
                                            <label>Kode Bagian</label>
											<input type="text" class="form-control" name="nik" id="nik" readonly>
											
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" name="Nama_Lengkap" placeholder="Masukkan Nama Lengkap Karyawan" required>
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label><br>
                                            <textarea class="form-control" name="alamat" required></textarea>
                                        </div>
										<div class="form-group">
                                            <label>Telp</label>
                                            <input type="text" pattern="[0-9]{10,}" title="Masukkan no. telpon yang valid" class="form-control" name="telp" placeholder="Masukkan No. Telp" required>
                                        </div>
										<div class="form-group">
                                            <label>Jenis Kelamin</label>
											<input  type="radio" name="Jenis_Kelamin" value="Laki-Laki"> Laki-Laki <input type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan
                                        </div>
										<div class="form-group">
                                            <label>Password <span style="color:red">(Alfa Numerik 6 s/d 8 Karakter)</span></label>
                                            <input type="Password" pattern=".{6,}" title="Password harus 6 s/d 8 Karakter" maxlength="8" class="form-control" name="Password" required>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="lahir" required>
                                        </div>
										<div class="form-group">
                                            <label>Foto Karyawan <span style="color:red">(FORMAT HARUS *.JPG UKURAN MAX. 1MB)</span></label>
											<input type="file" class="custom-file" name="foto" id="foto" placeholder="" required>
                                        </div>
										
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
										
                                    </form>
									<?php
}
?>
									</div>
									<!-- /.card -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                <!-- /.card-body -->
            
           
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Daftar Karyawan</h3>
				<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table width="100%" class="table table-bordered table-striped" id="karyawanlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">NIK</th>
                                        <th style="text-align:center">Nama Lengkap</th>
										<th style="text-align:center">Alamat</th>
										<th style="text-align:center">Telp</th>
										<th style="text-align:center">Jenis Kelamin</th>
										<th style="text-align:center">Password</th>
										<th style="text-align:center">Tanggal Lahir</th>
										<th style="text-align:center">Bagian</th>
										<th  style="text-align:center">Jabatan</th>
										<th  style="text-align:center">NIK Atasan</th>
										<th  style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
                                    <?php


									

											
											$sql1 = "SELECT * from Master_Karyawan";
									$result1 = mysqli_query($conn, $sql1);
									if (mysqli_num_rows($result1) > 0) {
										while($row = mysqli_fetch_assoc($result1)) {
											echo "<tr><form action=\"\" method=\"POST\"> <td> <input type=\"hidden\" class=\"form-control\" name=\"nik\" value=\"";
											echo $row["NIK"]; echo "\">"; echo $row["NIK"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"Nama_Lengkap\" value=\"";
											echo $row["Nama_Lengkap"]; echo "\">"; echo $row["Nama_Lengkap"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"alamat\" value=\"";
											echo $row["Alamat"];echo "\">";echo $row["Alamat"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"telp\" value=\"";
											echo $row["Telp"]; echo "\">"; echo $row["Telp"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"Jenis_Kelamin\" value=\"";
											echo $row["Jenis_Kelamin"]; echo "\">"; echo $row["Jenis_Kelamin"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"Password\" value=\"";
											echo $row["Password"]; echo "\">"; echo "******";
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"lahir\" value=\"";
											echo $row["Tgl_Lahir"]; echo "\">"; echo $row["Tgl_Lahir"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"Bagian\" value=\"";
											echo $row["Bagian"]; echo "\">"; echo $row["Bagian"];
											echo "<input type=\"hidden\" class=\"form-control\" name=\"Foto\" value=\"";
											echo $row["foto"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"Jabatan\" value=\"";
											echo $row["Jabatan"]; echo "\">"; echo $row["Jabatan"];
											echo "</td>";
											echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"nikatasan\" value=\"";
											echo $row["NIKatasan"]; echo "\">"; echo $row["NIKatasan"];
											echo "</td>";
											echo "<td><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Ubah\">";
											echo "<input class=\"btn btn-danger\" type=\"submit\" name=\"delete\" value=\"Hapus\"></td>";
											echo "</form></tr>";
										}
									} else {
										echo "0 results";
									}
									echo "</tbody</table>";
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
