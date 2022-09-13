<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();
 
$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
if( isset($_POST['submit']) ){
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);
		$level = stripslashes($_POST['level']);
        $level = mysqli_real_escape_string($conn, $level);
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
		if (isset($_POST['tambah'])) {
		$levelSelect = $_POST ['level'];
								if ($levelSelect = 'superadmin'){
									$level = 'Super Admin';
								} if ($levelSelect = 'admin'){
									$level = 'Admin';
								} 
		}			
        if(!empty(trim($username)) && !empty(trim($password)) && !empty(trim($level))){

                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    //insert data ke database
                    $query = "INSERT INTO user (username, password, level ) VALUES ('$username','$password','$level')";
                    $result   = mysqli_query($conn, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        
                        header('Location: login2.php');
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !!';
                    }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 
    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$con){
        $nama = mysqli_real_escape_string($conn, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($conn, $query) ) return mysqli_num_rows($result);
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />>
        <meta name="description" content="" />
        <meta name="author" content="" />
<title>Register</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Akun</h3></div>
                                    <div class="card-body">
									<section class="container-fluid mb-4">
										<!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
										<section class="row justify-content-center">
										<section class="col-5 col-sm-6 col-md-9">
											<form class="form-container" action="register.php" method="POST">
												<?php if($error != ''){ ?>
													<div class="alert alert-danger" role="alert"><?= $error; ?></div>
												<?php } ?>
												
												<div class="form-group">
													<label for="name">Nama</label>
													<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
												</div>
												<div class="form-group">
													<label for="username">Username</label>
													<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
												</div>
												<div class="form-group">
													<label for="InputPassword">Password</label>
													<input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
													<?php if($validate != '') {?>
														<p class="text-danger"><?= $validate; ?></p>
													<?php }?>
												</div>
												<div class="form-group">
													<label for="level">Level</label>
																<select name="level" id="level" class="form-select" required>
																	<option></option>
																	<option value="admin">Admin</option>
																</select>
												</div>
												<button type="submit" name="submit" class="btn btn-success mt-3 btn-block" >Register</button>
												<div class="form-footer mt-2">
													<p> Kembali keberanda? <a href="index.php"> BERANDA</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</main>
					</div>
					<div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dinas Kesehatan Provinsi Jawa Tengah</div>
                        </div>
                    </div>
                </footer>
            </div>
				</div>
                </form>
            </section>
            </section>
        </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>