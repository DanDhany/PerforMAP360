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
  <title>PerforMAP360 | Master Bagian</title>
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
            <h1>Master Bagian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Master Bagian</li>
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
                <h3 class="card-title">Form Detail Bagian</h3>
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
	$a = $_POST['kdbag']; 
	$b = ucwords(strtolower($_POST['nambag']));
$sql = "INSERT INTO master_bagian
VALUES ('$a', '$b' )";
mysqli_query($conn, $sql);
$sqlc = "select count(*)as jum from master_bagian";
$result1= mysqli_query($conn, $sqlc);
$row = mysqli_fetch_assoc($result1);						
echo "<script>toastr.success(\"Input data berhasil!\")</script>";
}

if(isset($_POST['delete'])){
	$a = $_POST['datkdbag'];
	
$sql1 = "Delete from master_bagian where kdbag='$a'";
mysqli_query($conn, $sql1);
$sqlc = "select count(*)as jum from master_bagian";
$result1= mysqli_query($conn, $sqlc);
$row = mysqli_fetch_assoc($result1);	
echo "<script>toastr.success(\"Hapus data berhasil!\")</script>";
}

if(isset($_POST['submitupdate'])){
	$a = $_POST['kdbag'];
	$b = ucwords(strtolower($_POST['nambag']));
	
$sql2 = "update master_bagian
set nambag='$b' where kdbag='$a'";
mysqli_query($conn, $sql2);
$sqlc = "select count(*)as jum from master_bagian";
$result1= mysqli_query($conn, $sqlc);
$row = mysqli_fetch_assoc($result1);	
echo "<script>toastr.success(\"Ubah data berhasil!\")</script>";
}


if(isset($_POST['update'])){
	$a1 = $_POST['datkdbag'];
	$b1 = $_POST['datnambag`'];
	
?>	
									<form role="form" action="" method="POST">

										<div class="form-group">
                                            <label>Kode Bagian</label>
                                            <input class="form-control" name="kdbag" value="<?php echo $a1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Nama Bagian</label>
                                            <input class="form-control" name="nambag" value="<?php echo $b1; ?>" required>
                                        </div>
									
                                        
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <a href="" class="btn btn-primary">Reset</a>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>Kode Bagian</label>
											<?php
											$sqla = "select max(kdbag) as cek from master_bagian";
											$result= mysqli_query($conn, $sqla);
											$row = mysqli_fetch_assoc($result);
											$value=$row['cek']+1;
											?>
                                            <input class="form-control" name="kdbag" placeholder="Masukkan Kode Bagian" value="<?php echo $value; ?>"required>
                                        </div>
										<div class="form-group">
                                            <label>Nama Bagian</label>
                                            <input class="form-control" name="nambag" placeholder="Masukkan Nama Bagian" required>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
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
                <h3 class="card-title">Daftar Bagian</h3>
				<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Kode Bagian</th>
                                        <th style="text-align:center">Nama Bagian</th>
										<th style="text-align:center">Proses</th>
										</tr>
                                </thead>
								<tbody>
								<?php


								$sql1 = "SELECT * from master_bagian";
								$result1 = mysqli_query($conn, $sql1);
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
										echo "<tr><form action=\"\" method=\"POST\">"; 
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datkdbag\" value=\"";
										echo $row["kdbag"]; echo "\">";echo $row["kdbag"];
										echo "</td>";
										echo "<td> <input type=\"hidden\" class=\"form-control\" name=\"datnambag`\" value=\"";
										echo $row["nambag"];echo "\">";echo $row["nambag"];
										echo "</td>";
										echo "<td align=\"center\"><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Ubah\"> ";
										echo "<input class=\"btn btn-danger\"type=\"submit\" name=\"delete\" value=\"Hapus\"></td>";
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
