<?php
$cek = '';
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-olive elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PerforMAP360</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
		  <?php 
		   if(isset($_SESSION['username'])!=''){
			    echo $_SESSION['username'];
			 } else {
				echo 'Silahkan Login';

			 }
		   ?>
        </div>
		
		
      </div>
	 <div>
		<?php
		 if(isset($_SESSION['username'])!=''){
			 echo "<a href=\"../hapus.php\" class=\"dropdown-item dropdown-footer\">Logout</a>";
			 } else{
				
			 }
		
		
		?>
		</div>
          
		<div class="dropdown-divider"></div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../../index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kelola Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../pages/master/m_karyawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/master/m_bagian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/master/m_jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Jabatan</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_kriteria.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Kriteria</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_subkriteria.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Sub Kriteria</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_bobot.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bobot</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../../pages/master/m_penilai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Penilai</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-header">Form Kinerja</li> -->
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Penilaian Kinerja
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../pages/transaksi/t_pengukuran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengukuran Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/transaksi/t_perhitungan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perhitungan Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/transaksi/t_approval.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Penilaian</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-header">Laporan</li> -->
          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan Kinerja
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/laporan/l_penilaian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penilaian Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/laporan/l_perangkingan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perangkingan Karyawan</p>
                </a>
              </li>
            </ul>
          </li>-->
		  <li class="nav-item">
            <a href="../../pages/laporan/l_penilaian.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan Kinerja
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>