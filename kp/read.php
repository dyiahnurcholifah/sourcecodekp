<?php
	include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Beranda</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Rekap Data</title>
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
                        <h1 class="mt-4">Rekap Data</h1>
                        <ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Kematian Ibu</li>
                        </ol>
						<body>
					<div class="container">
					<table class ="table table-striped table-hover table-bordered mt-5">
					<thead class="table-dark">
						<th>NIK</th>
						<th>Nama Ibu</th>
						<th>Usia</th>
						<th>Desa/Kelurahan</th>
						<th>Kecamatan</th>
						<th>Kabupaten/Kota</th>
						<th>Tempat Kematian</th>
						<th>Tanggal Kematian</th>
						<th>Penyebab Kematian Sementara</th>
						<th>Penolong Persalinan</th>
						<th>Saat Kematian</th>
						<th>Aksi</th>
					</thead>
					<?php
						$sqlGet = "SELECT * FROM kematianibu";
						$query = mysqli_query($conn, $sqlGet);
						
						while($data = mysqli_fetch_array($query)){
							echo "
								<tbody>
									<tr>
										<td>$data[nik]</td>
										<td>$data[nama_ibu]</td>
										<td>$data[usia]</td>
										<td>$data[desa_kelurahan]</td>
										<td>$data[kecamatan]</td>
										<td>$data[kabupaten_kota]</td>
										<td>$data[tempat_kematian]</td>
										<td>$data[tanggal_kematian]</td>
										<td>$data[penyebab_kematian_sementara]</td>
										<td>$data[penolong_persalinan]</td>
										<td>$data[saat_kematian]</td>
										<td>
											<div class='row'>
												<div class='colomn d-flex justify-content-center'>
													<a href='update.php?id=$data[id]' class='btn btn-sm btn-warning'>Update</a>
												</div>
												<div class='colomn d-flex justify-content-center mt-3'>
													<a href='delete.php?id=$data[id]' class='btn btn-sm btn-danger'>Delete</a>
												</div>
												</div>
										</td>
									</tr>
								</tbody>
							";
						}
					?>
	
					</table>
					</div>
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