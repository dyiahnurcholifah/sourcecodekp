    <?php
    include 'koneksi.php';
    $nama_penyebab_kematian_sementara= "";
    $jumlah=null;
    //Query SQL
    $sql="select penyebab_kematian_sementara,COUNT(*) as 'total' from kematianibu GROUP by penyebab_kematian_sementara";
    $hasil=mysqli_query($conn,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        //Mengambil nilai jurusan dari database
        $penyebab_kematian_sementara=$data['penyebab_kematian_sementara'];
        $nama_penyebab_kematian_sementara .= "'$penyebab_kematian_sementara'". ", ";
        //Mengambil nilai total dari database
        $jum=$data['total'];
        $jumlah .= "$jum". ", ";

    }
    ?>

<!DOCTYPE html>
<html lang= "en">
<head>
		<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grafik Tabung</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
		<script src="js/Chart.js"></script>   
</head>
<body class="sb-nav-fixed">>
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
                            <a class="nav-link" href="index2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
							<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Grafik
								<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="barchartsjs2.php">Saat Kematian</a>
                                    <a class="nav-link" href="pie2.php">Penyebab Kematian Sementara</a>

                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Grafik Penyebab Kematian Sementara</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index2.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Grafik Penyebab Kematian Sementara</li>
                        </ol>
						<div style="width: 800px;margin: 30px auto;">
							<canvas id="myChart"></canvas>
						</div>
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
        <script src="assets/demo/chart-pie-demo.js"></script>
		<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var chart = new Chart(ctx, {
				// The type of chart we want to create
				type: 'pie',
				// The data for our dataset
				data: {
					labels: [<?php echo $nama_penyebab_kematian_sementara; ?>],
					datasets: [{
						label:'',
						backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
						borderColor: ['rgb(255, 99, 132)'],
						data: [<?php echo $jumlah; ?>]
					}]
				},

				// Configuration options go here
				options: {
					barValueSpacing: 20,
					scales: {
						yAxes: [{
							ticks: {
								min: 0,
								beginAtZero:true
							}
						}]
					}
				}
				
			});
		</script>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dinas Kesehatan Provinsi Jawa Tengah</div>
                        </div>
                    </div>
                </footer>
</body>
</html>