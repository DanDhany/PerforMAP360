<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "PT-SHD";
session_start();

$conn = mysqli_connect($servername, $username, $password, $db);
?>
<table width="100%" class="table table-striped table-bordered table-hover" id="bagianlist">
						
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Nama</th>
										<th style="text-align:center">Bagian</th>
									</tr>
                                </thead>
								<tbody>
								<?php								
								$result1 = mysqli_query($conn, "SELECT * from master_karyawan");
								if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)) {
								?>																			
									<tr>
										<form action="" method="POST">	
										<input type="hidden" class="form-control" name="nik" value= "<?php echo $row["NIK"]?>">					
										<td align="center"> 
											<input type="hidden" class="form-control" name="nama" value= "<?php echo $row["Nama_Lengkap"]?>">
											<?php echo $row["Nama_Lengkap"]; ?> 
										</td>
										<td align="center">
											<select class="form-control" name="bagian" id="bagian" required>
												<option value=""></option>										
													<?php
													$query = "select * from master_bagian";
													$tampil = mysqli_query($conn, $query);
													$muncul = "var detail1 = new Array();\n";
													while($data1 = mysqli_fetch_array($tampil))
													{
														echo "<option value='".$data1['nambag']."'>".$data1['nambag']."</option>";
													}
													?>
											</select>										
										</td>
									</tr>
								<?php
									}
								} else {
									echo "0 results";
								}
								?>
								</tbody>
							</table>														
						<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
										</form>
						
<?php
if(isset($_POST['simpan'])){
	$x=$_POST["nama"];
	$_SESSION["data"][$x]["nama"]=$_POST["nama"];
	$_SESSION["data"][$x]["bagian"]=$_POST["bagian"];
	
	foreach($_SESSION["data"] as $x => $x_value){
		echo $_SESSION["data"][$x]["nama"];
		echo $_SESSION["data"][$x]["bagian"];
		//mysqli_query($conn, "INSERT INTO detail_karbag VALUES('$namalengkap','$bagian')");
	}
?>
		</br>
		<?php
$sqla = "SELECT count(kdkri) as rowCount FROM `master_subkriteria` WHERE kdkri in (SELECT kdkri from master_bobot WHERE kdpenilai='01')";
$result= mysqli_query($conn, $sqla);
$rowCount = mysqli_fetch_assoc($result);
$x=$rowCount['rowCount'];
for ($a = 0; $a <= $x; $a++){
echo $_SESSION["data"][$a]["rating"] = $_POST["bagian"];

}


}
?>
								<?php
								mysqli_close($conn);
								?>
								