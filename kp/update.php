<?php
	include 'koneksi.php';
	
	$id = $_GET['id'];
	$sqlGet = "SELECT * FROM kematianibu WHERE id='$id'";
	$queryGet = mysqli_query($conn, $sqlGet);
	$data = mysqli_fetch_array($queryGet);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset ="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<title>Update Data</title>
</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Data Kematian Ibu</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login2.php">Logout</a></li>
						<li><a class="dropdown-item" href="register.php">Tambah Akun</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
							
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
							<div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link collapsed" href="add.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tambah Data
                            </a>
                            <a class="nav-link collapsed" href="read.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Rekap Data
							</a>
							<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Grafik
								<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="barchartsjs.php">Saat Kematian</a>
                                    <a class="nav-link" href="pie.php">Penyebab Kematian Sementara</a>

                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Data</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="read.php">Rekap Data</a></li>
                            <li class="breadcrumb-item active">Data Kematian Ibu</li>
                        </ol>
							<body>
							<div class ="w-50 mx-auto border p-3 mt-5 mb-5">
								<form action="update.php?id=<?php echo $data['id'];?>" method="post">
									
									<label for="nik">NIK</label>
									<input type="text" id="nik" name="nik" value="<?php echo "$data[nik]";?>" class="form-control" required> 
									
									<label for="nama_ibu">Nama Ibu</label>
									<input type="text" id="nama_ibu" name="nama_ibu" value="<?php echo "$data[nama_ibu]";?>" class="form-control" >
									
									<label for="usia">Usia</label>
									<input type="text" id="usia" name="usia" value="<?php echo "$data[usia]";?>" class="form-control" required>
									
									<label for="desa_kelurahan">Desa/Kelurahan</label>
									<input type="text" id="desa_kelurahan" name="desa_kelurahan" value="<?php echo "$data[desa_kelurahan]";?>" class="form-control" required>
									
									<label for="kecamatan">Kecamatan</label>
									<input type="text" id="kecamatan" name="kecamatan" value="<?php echo "$data[kecamatan]";?>" class="form-control" required>
									
									<label for="kabupaten_kota">Kabupaten/Kota</label>
									<input type="text" id="kabupaten_kota" name="kabupaten_kota" value="<?php echo "$data[kabupaten_kota]";?>" class="form-control" required>
									
									<label for="tempat_kematian">Tempat Kematian</label>
									<select name="tempat_kematian" id="tempat_kematian" class="form-select" required>
										<option><?php echo "$data[tempat_kematian]";?></option>
										<option value="Pukesmas">Pukesmas</option>
										<option value="Rumah Sakit">Rumah Sakit</option>
										<option value="Rumah">Rumah</option>
										<option value="Jalan">Jalan</option>
										<option value="Tempat Lainnya">Tempat Lainnya</option>
									</select>
									
									<label for="tanggal_kematian">Tanggal Kematian</label>
									<input type="date" id="tanggal_kematian" name="tanggal_kematian" value="<?php echo "$data[tanggal_kematian]";?>" class="form-control" required>
									
									<label for="penyebab_kematian_sementara">Penyebab Kematian Sementara</label>
									<select name="penyebab_kematian_sementara" id="penyebab_kematian_sementara" class="form-select" required>
										<option><?php echo "$data[penyebab_kematian_sementara]";?></option>
										<option value="Pendarahan">Pendarahan</option>
										<option value="Gangguan Sistem Pembuluh Darah">Gangguan Sistem Pembuluh Darah</option>
										<option value="Hipertensi">Hipertensi</option>
										<option value="Infeksi">Infeksi</option>
										<option value="Penyakit Lainnya">Penyakit Lainnya</option>
									</select>
									
									<label for="penolong_perslinan">Penolong Persalinan</label>
									<select name="penolong_persalinan" id="penolong_persalinan" class="form-select" required>
										<option><?php echo "$data[penolong_persalinan]";?></option>
										<option value="Dokter Sp.OG">Dokter Sp.OG</option>
										<option value="Dokter Umum">Dokter Umum</option>
										<option value="Bidan">Bidan</option>
										<option value="Dukun Bersalin">Dukun Bersalin</option>
										<option value="Mandiri">Mandiri</option>
									</select>
									
									<label for="saat_kematian">Saat Kematian</label>
									<select name="saat_kematian" id="saat_kematian" class="form-select" required>
										<option><?php echo "$data[saat_kematian]";?></option>
										<option value="Hamil">Hamil</option>
										<option value="Bersalin">Bersalin</option>
										<option value="Nifas">Nifas</option>
										<option value="Lainnya">Lainnya</option>
									</select>
									
									<input class="btn btn-success mt-3" type="submit" name="edit" value="Tambah Data">
								</form>
							</div>
							<?php
							if (isset($_POST['edit'])) {
								$nik = $_POST['nik'];
								$nama_ibu = $_POST['nama_ibu'];
								$usia = $_POST['usia'];
								$desa_kelurahan = $_POST['desa_kelurahan'];
								$kecamatan = $_POST['kecamatan'];
								$kabupaten_kota = $_POST['kabupaten_kota'];
								$tempat_kematian = $_POST['tempat_kematian'];
								$tanggal_kematian = $_POST['tanggal_kematian'];
								$penyebab_kematian_sementara = $_POST['penyebab_kematian_sementara'];
								$penolong_persalinan = $_POST['penolong_persalinan'];
								$saat_kematian = $_POST['saat_kematian'];
								
								 								
								$sqlUpdate = "UPDATE kematianibu SET nik='$nik' ,nama_ibu='$nama_ibu', usia='$usia', desa_kelurahan='$desa_kelurahan', kecamatan='$kecamatan', kabupaten_kota='$kabupaten_kota', tempat_kematian='$tempat_kematian', tanggal_kematian='$tanggal_kematian', penyebab_kematian_sementara='$penyebab_kematian_sementara', penolong_persalinan='$penolong_persalinan', saat_kematian='$saat_kematian' WHERE id='$id'";
								$queryUpdate = mysqli_query($conn, $sqlUpdate);
							
							}	
							
							
							?>
						</body>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dinas Kesehatan Provinsi Jawa Tengah</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
